@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Update City</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <form action="{{ route('admin.editCityFormSubmit', $city->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="item form-group">
                                {{-- name --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="name">City Name * </label>
                                    <input type="text" id="name" name="name" value="{{ $city->name }}"
                                        class="form-control" oninput="removeError('nameErr')">
                                    @error('name')
                                        <span class="text-danger" id="nameErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Canton --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="canton">Canton *</label>
                                    <select class="form-control" id="canton" name="canton_id"
                                        oninput="removeError('cantonErr')">
                                        @foreach ($allcanton as $canton)
                                            <option value="{{ $canton->id }}"
                                                {{ $canton->id == $city->canton->id ? 'selected' : '' }}>
                                                {{ $canton->name }}({{ $canton->short_name }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('canton_id')
                                        <span class="text-danger" id="cantonErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- description --}}
                                <div class="col-md-4 col-sm-4">
                                    <label for="description">Description(optional)</label>
                                    <textarea class="form-control" id="description" name="description">{{ $city->description }}</textarea>
                                </div>

                            </div>

                            {{-- submit --}}
                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 offset-md-4 mt-3">
                                    <a href="{{ route('admin.getAllCity') }}"> <button class="btn btn-primary"
                                            type="button">Cancel</button></a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- /page content -->
@endsection
