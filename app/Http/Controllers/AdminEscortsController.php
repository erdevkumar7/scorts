<?php

namespace App\Http\Controllers;

use App\Models\Escort;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminEscortsController extends Controller
{
    public function allescorts()
    {
        $allescorts = DB::table("escorts")
            ->orderBy("created_at", "desc")
            ->get();
        return view("escorts.all-escorts", compact('allescorts',));

        // $allescorts = Escort::select(['id', 'nickname', 'phone_number', 'email', 'city', 'origin', 'type']);
        //  return DataTables::of($allescorts)->make(true);
    }


    public function addescorts()
    {

        return view("escorts.add-escorts");
    }

    public function postescorts(Request $request)
    {
        $validatedData = $request->validate([
            'nickname' => 'required|unique:escorts,nickname',
            'pictures' => 'required|array|min:1',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
            'phone_number' => 'required',
            'email' => 'required|email|unique:escorts',
            'password' => 'required|string|min:8|confirmed',
            'age' => 'required',
            'canton' => 'required',
            'city' => 'required',
            'services' => 'required|array|min:1',
            'origin' => 'required',
            'type' => 'required',
            'text_description' => 'required|min:30',
            'videos' => 'nullable|array',
            'videos.*' => 'file|mimes:mp4,mov,mkv,flv,3gp,avi,mwv,ogg,qt|max:20000',
            'hair_color' => 'nullable',
            'hair_length' => 'nullable',
            'breast_size' => 'nullable',
            'height' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'build' => 'nullable',
            'is_certified' => 'boolean',
            'is_caution' => 'boolean',
            'is_premium' => 'boolean',
            'smoker' => 'boolean',
            'language_spoken' => 'nullable|array',
            'address' => 'nullable',
            'outcall' => 'boolean',
            'incall' => 'boolean',
            'whatsapp_number' => 'nullable',
            'availability' => 'nullable|array',
            'parking' => 'boolean',
            'disabled' => 'boolean',
            'accepts_couples' => 'boolean',
            'elderly' => 'boolean',
            'air_conditioned' => 'boolean',
            'rates_in_chf' => 'nullable|numeric',
            'currencies_accepted' => 'nullable|array',
            'payment_method' => 'nullable|array',
            'image_type' => 'nullable|string',
            'video_type' => 'nullable|string',
        ]);

        $validatedData['original_password'] = $validatedData['password'];
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['services'] = json_encode($validatedData['services']);
        $validatedData['language_spoken'] = isset($validatedData['language_spoken']) ? json_encode($validatedData['language_spoken']) : null;
        $validatedData['availability'] = isset($validatedData['availability']) ? json_encode($validatedData['availability']) : null;
        $validatedData['currencies_accepted'] = isset($validatedData['currencies_accepted']) ? json_encode($validatedData['currencies_accepted']) : null;
        $validatedData['payment_method'] = isset($validatedData['payment_method']) ? json_encode($validatedData['payment_method']) : null;

        $escort =  Escort::create($validatedData);

        $escort_id = $escort->id;
        if ($escort_id) {
            // Pictures upload in media table
            if (is_array($request->file('pictures'))) {
                // Handle multiple files           

                foreach ($request->file('pictures') as $image) {
                    $originalImageName = $image->getClientOriginalName();
                    $imageName = time() . '_' . $originalImageName;
                    $image->move(public_path('images/escorts_img'), $imageName);
                    Media::create([
                        'name' => $imageName,
                        'type' => $request->image_type,
                        'escort_id' => $escort_id,
                    ]);
                }
            }


            // Videos upload in media table
            if (is_array($request->file('videos'))) {
                // Handle multiple files
                foreach ($request->file('videos') as $vdo) {
                    $originalVdoName = $vdo->getClientOriginalName();
                    $vdoName = time() . '_' . $originalVdoName;
                    $vdo->move(public_path('videos'), $vdoName);
                    Media::create([
                        'name' => $vdoName,
                        'type' => $request->video_type,
                        'escort_id' => $escort_id,
                    ]);
                }
            }
        }

        return redirect()->route('admin.escorts')->with('success', 'Escort added successfully!');
    }
    //todo: Escorts form
    public function edit_escorts_form($id)
    {
        $escort = Escort::find($id);
        // Check if escort was found
        if (!$escort) {
            return redirect()->back()->with('error', 'Escort not found.');
        }
        $pictures = Media::where('escort_id', $id)->where('type', 'image')->get();
        $videos = Media::where('escort_id', $id)->where('type', 'video')->get();

        $language_spoken = json_decode($escort->language_spoken, true);
        $services = json_decode($escort->services, true);
        $availability = json_decode($escort->availability, true);
        $currencies_accepted = json_decode($escort->currencies_accepted, true);
        $payment_method = json_decode($escort->payment_method, true);

        return view('escorts.escorts-edit', compact('escort', 'pictures', 'videos', 'services', 'language_spoken', 'availability', 'currencies_accepted', 'payment_method'));
    }
    //todo: update Escorts
    public function edit_escorts(Request $request, $id)
    {
        $escort = Escort::findOrFail($id);
        if (!$escort) {
            return redirect()->back()->with('error', 'Escort not found.');
        }

        $validatedData = $request->validate([
            'nickname' => 'required|unique:escorts,nickname,' . $escort->id,
            'email' => 'required|unique:escorts,email,' . $escort->id,
            'password' => 'nullable|min:8|confirmed', // Password is optional during updates
            'pictures' => 'nullable|array|min:1',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
            'phone_number' => 'required',
            'age' => 'required',
            'canton' => 'required',
            'city' => 'required',
            'services' => 'required|array|min:1',
            'origin' => 'required',
            'type' => 'required',
            'text_description' => 'required|min:30',
            'videos' => 'nullable|array',
            'videos.*' => 'file|mimes:mp4,mov,mkv,flv,3gp,avi,mwv,ogg,qt|max:20000',
            'hair_color' => 'nullable',
            'hair_length' => 'nullable',
            'breast_size' => 'nullable',
            'height' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'build' => 'nullable',
            'is_certified' => 'boolean',
            'is_caution' => 'boolean',
            'is_premium' => 'boolean',
            'smoker' => 'boolean',
            'language_spoken' => 'nullable|array',
            'address' => 'nullable',
            'outcall' => 'boolean',
            'incall' => 'boolean',
            'whatsapp_number' => 'nullable',
            'availability' => 'nullable|array',
            'parking' => 'boolean',
            'disabled' => 'boolean',
            'accepts_couples' => 'boolean',
            'elderly' => 'boolean',
            'air_conditioned' => 'boolean',
            'rates_in_chf' => 'nullable|numeric',
            'currencies_accepted' => 'nullable|array',
            'payment_method' => 'nullable|array',
            'image_type' => 'nullable|string',
            'video_type' => 'nullable|string',
        ]);

        // Check if password field is filled, if yes, hash it
        if ($request->filled('password')) {
            //original_password
            $validatedData['original_password'] = $validatedData['password'];
            $validatedData['password'] = Hash::make($request->password);
        } else {
            // If password is not filled, remove it from the validated data so it won't be updated
            unset($validatedData['password']);
        }
        $validatedData['services'] = json_encode($validatedData['services']);
        $validatedData['language_spoken'] = isset($validatedData['language_spoken']) ? json_encode($validatedData['language_spoken']) : null;
        $validatedData['availability'] = isset($validatedData['availability']) ? json_encode($validatedData['availability']) : null;
        $validatedData['currencies_accepted'] = isset($validatedData['currencies_accepted']) ? json_encode($validatedData['currencies_accepted']) : null;
        $validatedData['payment_method'] = isset($validatedData['payment_method']) ? json_encode($validatedData['payment_method']) : null;
        // $validatedData['is_certified'] = $request->has('is_certified') ? 1 : 0;
        // $validatedData['is_caution'] = $request->has('is_caution') ? 1 : 0;
        // $validatedData['is_premium'] = $request->has('is_premium') ? 1 : 0;
        // Pictures upload in media table
        if (is_array($request->file('pictures'))) {
            // Handle multiple files
            foreach ($request->file('pictures') as $image) {
                $originalImageName = $image->getClientOriginalName();
                $imageName = time() . '_' . $originalImageName;
                $image->move(public_path('images/escorts_img'), $imageName);
                Media::create([
                    'name' => $imageName,
                    'type' => $request->image_type,
                    'escort_id' => $id,
                ]);
            }
        }


        // Videos upload in media table
        if (is_array($request->file('videos'))) {
            // Handle multiple files
            foreach ($request->file('videos') as $vdo) {
                $originalVdoName = $vdo->getClientOriginalName();
                $vdoName = time() . '_' . $originalVdoName;
                $vdo->move(public_path('videos'), $vdoName);
                Media::create([
                    'name' => $vdoName,
                    'type' => $request->video_type,
                    'escort_id' => $id,
                ]);
            }
        }

        $escort->update($validatedData);

        return redirect()->route('admin.escorts')->with('success', 'Escort updated successfully!');
    }

    //todo: get escorts to show by it's ID
    public function escorts_by_id($id)
    {
        $escorts = Escort::find($id);
        if (!$escorts) {
            return redirect()->back()->with('error', 'Escort not found.');
        }

        $pictures = Media::where('escort_id', $id)->where('type', 'image')->get();
        $videos = Media::where('escort_id', $id)->where('type', 'video')->get();

        $services = json_decode($escorts->services, true);
        $language_spoken = json_decode($escorts->language_spoken, true);
        $availability = json_decode($escorts->availability, true);
        $currencies_accepted = json_decode($escorts->currencies_accepted, true);
        $payment_method = json_decode($escorts->payment_method, true);
        return view('escorts.escorts-by-id', compact('escorts', 'language_spoken', 'pictures', 'videos', 'availability', 'currencies_accepted', 'payment_method', 'services'));
    }

    public function getAdminEscortsPictures($escort_id)
    {
        $escort = Escort::find($escort_id);
        if (!$escort) {
            return redirect()->back()->with('error', 'Escort not found.');
        }
        $pictures = Media::where('type', 'image')
            ->where('escort_id', $escort_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('escorts.escort-pictures', compact('pictures', 'escort'));
    }

    public function getAdminEscortsVideos($escort_id)
    {
        $escort = Escort::find($escort_id);
        if (!$escort) {
            return redirect()->back()->with('error', 'Escort not found.');
        }
        $videos = Media::where('type', 'video')
            ->where('escort_id', $escort_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('escorts.escort-videos', compact('videos', 'escort'));
    }

    //todo: updateEscortStatus
    public function updateEscortStatus(Request $request)
    {
        $escort = Escort::find($request->id);       
        if ($escort) {
            $escort->status = $request->status;
            $escort->save();
            return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Escort not found.'], 404);
    }


    //todo: Delete Escorts
    public function deleteEscorts($id)
    {
        $escort = Escort::find($id);

        if (!$escort) {
            return redirect()->back()->with('error', 'Escort not found.');
        }

        // Find and delete all media records related to the escort        
        $pictures = Media::where('escort_id', $id)->where('type', 'image')->get();
        $videos = Media::where('escort_id', $id)->where('type', 'video')->get();
        //delete escorts pics
        if ($pictures) {
            foreach ($pictures as $picture) {
                $imagePath = public_path('images/escorts_img') . '/' . $picture->name;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                $picture->delete();
            }
        }

        //Delete Escorts videos
        if ($videos) {
            foreach ($videos as $video) {
                $vdoPath = public_path('videos') . '/' . $video->name;
                if (file_exists($vdoPath)) {
                    unlink($vdoPath);
                }

                // thumbnail delete   
                if ($video->thumb_nail !== null) {
                    $thumbNailPath = public_path('images/thumb_nails') . '/' . $video->thumb_nail;
                    if (file_exists($thumbNailPath)) {
                        unlink($thumbNailPath);
                    }
                }

                $video->delete();
            }
        }


        $escort->delete();
        return redirect()->back()->with('success', 'Escorts deleted successfully');
    }
}
