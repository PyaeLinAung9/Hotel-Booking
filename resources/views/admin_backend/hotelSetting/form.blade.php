@extends('layouts.master')
@section('title', 'Hotel Booking: Setting Form Page')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="title_left">
                <h3>Hotel Setting </h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">

                        <div class="x_content">
                            <form action="{{ route('getSetting')}}" method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                <span class="section">Hotel Setting</span>
                                {{-- {{ isset($getData) ? dd($getData) : ''}} --}}
                                <!-- hotel name -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3b label-align " for="name">Name<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" name="name" id="name" value="{{isset($getData) ? $getData->name : ''}}" placeholder="eg. ...."  />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide"><span class="name-text">*</span></label>
                                </div>
                                <!-- email -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align " for="email">Email<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="email" name="email" id="email" value="{{ $getData->name}}" required="required" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide"><span class="name-text">*</span></label>
                                </div>
                                <!-- online_ph -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align " for="online-phone">Online Phone<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="email" name="online-phone" id="online-phone" value="{{ $getData->name}}" required="required" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide"><span class="name-text">*</span></label>
                                </div>
                                <!-- outline_ph -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align " for="outline-phone">Outline Phone<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="email" name="outline-phone" id="outline-phone" value="{{ $getData->name}}" required="required" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide"><span class="name-text">*</span></label>
                                </div>
                                <!-- checkInTime -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align " for="check-in">CheckInTime<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class='input-group date' id='check-in'>
                                            <input type='text' class="form-control" name="check-in" value="{{ $getData->name}}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide"><span class="name-text">*</span></label>
                                </div>
                                <!-- checkOutTime -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align " for="check-out">CheckOutTime<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class='input-group date' id='check-out'>
                                            <input type='text' class="form-control" name="check-out" value="{{ $getData->name}}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide"><span class="name-text">*</span></label>
                                </div>
                                <!-- address -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align " for="address">Address<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="address" id="address" cols="20" rows="3">{{ $getData->name}}</textarea>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide"><span class="name-text">*</span></label>
                                </div>
                                <!-- occupation -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align " for="occupation">Occupation<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" name="occupation" id="occupation" value="{{ $getData->name}}" required="required" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide"><span class="name-text">*</span></label>
                                </div>
                                <!-- size -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align " for="size">Size<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" name="size" id="size" value="{{ $getData->name}}" required="required" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide"><span class="name-text">*</span></label>
                                </div>
                                <!-- price -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align " for="price">Price<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" name="price" id="price" value="{{ $getData->name}}" required="required" />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide"><span class="name-text">*</span></label>
                                </div>
                                <!-- logo -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3b label-align ">Upload Logo<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div id="preview-wrapper">
                                            <div class="vertical-center" style="">
                                                <label class="choose-file-button" onclick="chooseFile()">Choose File</label>
                                            </div>
                                            <div class="button-center" style="">
                                                <label class="change-file-button" onclick="changeImage()">Change File</label>
                                            </div>
                                            <input type="file" id="thumb-file" name="logo-name" onchange="uploadImage()" style="display:none;">
                                            <div name="image-name" style="">
                                                <img src="" id="thumb-image" alt="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- button -->
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary " id="room-sub">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>
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
