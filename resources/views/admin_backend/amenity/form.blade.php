@extends('layouts.master')
@section('title', (isset($amenityData) ? 'Hotel Booking: Room Amenity Edit Page' : 'Hotel Booking: Room Amenity Create Page'))
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="title_left">
                <h3>Hotel Room Amenity</h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">

                        <div class="x_content">
                            @if (isset($amenityData))
                                <form action="{{ route('amenityUpdate')}}" method="post" id="create-form" novalidate>
                            @else
                                <form action="{{ route('amenityCreate')}}" method="post" id="create-form" novalidate>
                            @endif
                                @csrf
                                <span class="section">Create Amenity</span>
                                <div class="field item ">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align ">Name<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="name" id="amenity-name" placeholder="eg. .... amenity" value="{{ old('name',(isset($amenityData)) ? $amenityData->name : '') }}" required="required" />
                                        </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide" ><span class="name-text"></span></label>
                                </div>
                                <br>
                                <div class="field item form-group ">
                                    <label class="control-label col-md-3 col-sm-3 label-align">Select*</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" name="type">
                                            <option value="" >Choose Amenity</option>
                                            <option value="0" @if(old('type',isset($amenityData) && $amenityData->type) == '0') selected @endif >General</option>
                                            <option value="1" @if(old('type',isset($amenityData) && $amenityData->type) == '1') selected @endif >Bath Room</option>
                                            <option value="2" @if(old('type',isset($amenityData) && $amenityData->type) == '2') selected @endif >Other</option>
                                        </select>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error select-error-hide" ><span class="name-select"></span></label>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary " id="sub">Submit</button>
                                            <button type='reset' class="btn btn-success" id="reset">Reset</button>
                                            @if (isset($amenityData))
                                                <input type="hidden" name="id" value="{{ $amenityData->id }}">
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
