@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>New Agency</h3>
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
                            <form action="{{ route('admin.addagency_form_submit') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- Mandatory Fields -->
                                {{-- Agency name --}}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Agency name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="name" name="name" class="form-control " oninput="removeError('nameErr')">
                                    </div>
                                    @error('name')
                                        <span class="text-danger" id="nameErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Email --}}
                                <div class="item form-group">
                                    <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">email</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="email" name="email" oninput="removeError('emailErr')">
                                    </div>
                                    @error('email')
                                        <span class="text-danger" id="emailErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- phone number --}}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone_number">Phone
                                        Number<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" oninput="removeError('phoneErr')">
                                    </div>
                                    @error('phone_number')
                                        <span class="text-danger" id="phoneErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Address --}}
                                <div class="item form-group">
                                    <label for="address"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                </div>
                                {{-- counter --}}
                                <div class="item form-group">
                                    <label for="counter"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Counter</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" class="form-control" id="counter" name="counter">
                                    </div>
                                </div>
                                {{-- Submit button --}}
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <a href="{{ route('admin.allagencies') }}"><button class="btn btn-primary"
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