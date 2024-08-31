<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEscortMail;
use App\Models\Escort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class EscortsAuthController extends Controller
{
    //todo: Register Escort
    public function escort_register_form()
    {
        return view("user-escort.register");
    }
    public function escort_register_form_submit(Request $request)
    {
        $validated = $request->validate([
            'nickname' => 'required|unique:escorts',
            'email' => 'required|email|unique:escorts',
            'phone_number' => 'required',
            'type' => 'required',
            'address' => 'required',
            'city' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $escort = new Escort();
        $escort->nickname = $validated['nickname'];
        $escort->email = $validated['email'];
        $escort->password = Hash::make($validated['password']);
        $escort->phone_number = $validated['phone_number'];
        $escort->type = $validated['type'];
        $escort->address = $validated['address'];
        $escort->city = $validated['city'];
        $escort->save();

        // Send welcome email
        Mail::to($escort->email)->send(new WelcomeEscortMail($escort));
        if ($escort) {
            return redirect()->route('login')->with('success', 'Register successfully!');
        }
    }

    public function escort_login_form(Request $request)
    {
        return view('user-escort.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $credential = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::guard('escort')->attempt($credential)) {
            if ($remember) {
                setcookie('email', $request->email, time() + 3600 * 24 * 3);
                setcookie('password', $request->password, time() + 3600 * 24 * 3);
            }
            $escort = Escort::find(Auth::guard('escort')->user()->id);
            return redirect()->route('escorts.profile', $escort->id)->with('success', 'Login successfully!');;
        }
        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('escorts')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ?  redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::broker('escorts')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($escort, $password) {
                $escort->password = Hash::make($password);
                $escort->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
