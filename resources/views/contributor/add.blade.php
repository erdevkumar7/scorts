@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Add New Contributor</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            @if (session('success'))
                                <div>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('admin.addContributorFormSubmit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="item form-group">
                                    {{-- name --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="name">Contributor Name * </label>
                                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                                            class="form-control" oninput="removeError('nameErr')">
                                        @error('name')
                                            <span class="text-danger" id="nameErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- phone_number --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="phone_number">Phone Number * </label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ old('phone_number') }}" oninput="removeError('phoneErr')">
                                        @error('phone_number')
                                            <span class="text-danger" id="phoneErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- address --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="address">Address </label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ old('address') }}">
                                    </div>

                                </div>

                                <div class="item form-group">
                                    {{-- email --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}" oninput="removeError('emailErr')">
                                        @error('email')
                                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- password --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="password">Password * </label>
                                        <input type="Password" name="password" class="form-control" id="pass"
                                            oninput="removeError('PasswordErr')">
                                        @error('password')
                                            <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- password_confirmation --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="password_confirmation">Confirm Password * </label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" oninput="removeError('C_PasswordErr')">
                                        @error('password_confirmation')
                                            <span class="text-danger" id="C_PasswordErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- role --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="role">Role *</label>
                                        <select class="form-control" id="role" name="role"
                                            oninput="removeError('roleErr')">
                                            <option value="">Select Role</option>
                                            <option value="Developer" {{ old('role') == 'Developer' ? 'selected' : '' }}>
                                                Developer
                                            </option>
                                            <option value="SEO" {{ old('role') == 'SEO' ? 'selected' : '' }}>SEO
                                            </option>
                                            <option value="Content-writer"
                                                {{ old('role') == 'content-writer' ? 'selected' : '' }}>Content-writer
                                            </option>
                                        </select>
                                        @error('role')
                                            <span class="text-danger" id="roleErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- description --}}
                                    <div class="col-md-8 col-sm-8">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" id="description" name="description" oninput="removeError('descriptionErr')">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger" id="descriptionErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- submit --}}
                                <div class="item form-group">
                                    <div class="col-md-4 col-sm-4 offset-md-4 mt-3">
                                        <a href="{{ route('admin.getAllContributors') }}"> <button class="btn btn-primary"
                                                type="button">Cancel</button></a>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection