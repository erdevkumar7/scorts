@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Escort Pictures</h3>
                <!-- Add Image Form-->
                <form class="adminAdd-picture-form" action="{{ route('admin.add_escortPictures', $escort->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col-lg-3 menu-item adminAdd-add-more-pic">
                        <span onclick="document.getElementById('addImageInput').click();">
                            <p class="add-photo-admin">Add Photo <i class="fa fa-upload" aria-hidden="true"></i></p>
                        </span>
                        <input type="hidden" name="media_type_image" value="image">
                        <input type="file" id="addImageInput" accept="image/*" name="pictures[]" multiple
                            style="display: none;" onchange="this.form.submit()">
                    </div>
                </form>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row adminPic-content">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row admin-escort-pics">
                            @if ($pictures->isEmpty())
                                <div class="col-lg-3 menu-item no-pic-available">
                                    <h4>No Photos available</h4>
                                </div>
                            @else
                                @foreach ($pictures as $picture)
                                    <div class="col-lg-3 menu-item inener-pic-data">
                                        <form
                                            action="{{ route('admin.escorts.deleteMedia', ['escort_id' => $escort->id, 'media_id' => $picture->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="name" value="{{ $picture->name }}">
                                            <input type="hidden" name="type" value="image">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-times" aria-hidden="true"></i></button>

                                            <img src="{{ asset('/public/images/escorts_img') . '/' . $picture->name }}"
                                                alt="" width="200px" height="200px" />
                                        </form>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
