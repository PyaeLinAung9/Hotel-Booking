@extends('layouts.master')
@section('title', 'Hotel Booking: Room Gallery Page')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="title_left">
                <h3>Hotel Room </h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                            @if (isset($roomGallery) ? count($roomGallery) > 0 : '' )
                                <div class="row">
                                    @foreach ($roomGallery as $gallery)
                                        <div class="col-md-2" >
                                            <div class="image-wapper" >
                                                <img src="{{ URL::asset('assets/upload')}}/{{$id}}/{{$gallery->image}}" style="width: 100%;" alt="">
                                            </div>
                                            <div class="button-style">
                                                <a href="{{ route('editGallery',$gallery->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                <a href="{{ route('deleteGallery',$gallery->id)}}" onclick="return confirm('Are you sure want to delete this?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @endif
                        <div class="x_content">
                            @if (isset($roomGalleryData))
                                <form action="{{ route('galleryUpdate',$roomGalleryData->id)}}" method="post" enctype="multipart/form-data" novalidate>
                                    <span class="section">Edit Room Gallery Photo</span>
                            @else
                                <form action="{{ route('galleryCreate')}}" method="post" enctype="multipart/form-data" novalidate>
                                    <span class="section">Create Room Gallery Photo</span>
                            @endif
                                @csrf

                                <!-- image -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3b label-align ">Upload Thumbnail Image<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div id="preview-wrapper">
                                            <div class="vertical-center">
                                                <label class="choose-file-button" onclick="chooseFile()">Choose File</label>
                                            </div>
                                            <div class="button-center" style="display: none;">
                                                <label class="change-file-button" onclick="changeImage()">Change File</label>
                                            </div>
                                            <input type="file" id="thumb-file" name="image-name" onchange="uploadImage()" style="display:none;">
                                            @if (isset($roomGalleryData))
                                                <img src="{{ URL::asset('assets/upload')}}/{{$roomGalleryData->room_id}}/{{$roomGalleryData->image}}"  id="thumb-image" alt="">
                                            @else
                                                <div class="image-name">
                                                    <img src="" style="display:none" id="thumb-image" alt="">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide"><span class="name-text">*</span></label>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary " id="sub">Upload</button>
                                            <button type='reset' class="btn btn-success">Reset</button>

                                            @if (isset($roomGalleryData))
                                                <input type="hidden" name="id" value="{{ $roomGalleryData->id }}">
                                                <input type="hidden" name="room_id" value="{{ $roomGalleryData->room_id }}">
                                            @else
                                                <input type="hidden" name="room_id" value="{{ $id }}">
                                            @endif

                                        </div>
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
