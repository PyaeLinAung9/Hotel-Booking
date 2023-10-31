@extends('layouts.master')
@section('title', 'Hotel Booking: Room Detail Page')
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
                        <div class="x_content">
                                <form action="{{ route('roomCreate')}}" method="post" id="create-form" enctype="multipart/form-Detail">
                                    <span class="section">Room Detail</span>
                                @csrf
                                <!-- image -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3b label-align ">Upload Thumbnail Image<span class="">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div id="preview-wrapper">
                                            @if (isset($roomDetail))
                                                <img src="{{ URL::asset('assets/upload')}}/{{$roomDetail->id}}/thumb/{{$roomDetail->thumbnail_image}}"  id="thumb-image" alt=".">
                                            @else
                                                <img src="" id="thumb-image" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- room-name -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3b label-align " for="room-name">Name<span class="">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" name="name" id="room-name" placeholder="eg. .... room" value="{{ old('name',isset($roomDetail) ? $roomDetail->name : '' )}}" disabled />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide"><span class="name-text">*</span></label>
                                </div>
                                <!-- occupation -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align " for="occupation">Occupation<span class="">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="occupation" id="occupation" value="{{ old('occupation',isset($roomDetail) ? $roomDetail->occupation : '')}}" disabled />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error occupation-error"><span class="occupation-text"></span></label>
                                </div>
                                <!-- room bed -->
                                <div class="field item form-group">
                                    <label class="control-label col-md-3 col-sm-3 label-align">Bed<span
                                            class="">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" name="bed" id="select-bed">
                                            <option value="">Choose Bed Type</option>
                                                @foreach ($bedDetail as $bed)
                                                    <option value="{{ $bed->id }}" {{ old('bed') == $bed->id || (isset($roomDetail) ? $roomDetail->bed == $bed->id : '') ? 'selected' : '' }} disabled>{{ $bed->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error bed-select-error-hide"><span class="bed-select"></span></label>
                                </div>
                                <!-- room size -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align " for="size">Room Size<span class=""></span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="size" id="size"  value="{{ old('size',isset($roomDetail) ? $roomDetail->size : '')}}"  disabled/>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error size-error-hide"><span class="size-text"></span></label>
                                </div>
                                <!-- room view -->
                                <div class="form-group field item ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">View<span
                                            class="">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" name="view" id="select-view">
                                            <option value="">Choose View Type</option>
                                                @foreach ($viewDetail as $view)
                                                    <option value="{{ $view->id }}" {{ old('view') == $view->id || (isset($roomDetail) ? $roomDetail->view == $view->id : '') ? 'selected' : '' }} disabled>{{ $view->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error view-select-error-hide"><span
                                            class="view-select"></span></label>
                                </div>
                                <!-- room price -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align " for="price-per-day">Room Price Per Day<span class="">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="price_per_day" id="price-per-day" value="{{ old('price_per_day',isset($roomDetail) ? $roomDetail->price_per_day : '')}}"  />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error price-per-day-error"><span class="price-per-day-text"></span></label>
                                </div>
                                <!-- extra bed -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align " for="extra-bed">Extra Bed Prize Per Day<span class="">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="extra_bed_price" id="extra-bed" value="{{ old('extra_bed_price',isset($roomDetail) ? $roomDetail->extra_bed_price : '')}}"  />
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error extra-bed-error"><span class="extra-bed-text"></span></label>
                                </div>
                                <!-- description -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align " for="description">Description<span class="">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="description" id="description" cols="10" rows="2">{{ old('description',isset($roomDetail) ? $roomDetail->description : '')}}</textarea>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error description-error"><span class="description-text"></span></label>
                                </div>
                                <!-- detail -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align " for="detail">Detail<span class="">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="detail" id="detail" cols="30" rows="2">{{ old('detail',isset($roomDetail) ? $roomDetail->detail : '')}}</textarea>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error detail-error"><span class="detail-text"></span></label>
                                </div>
                                <br>
                                <!-- amenity -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align ">Amernity<span class="">*</span></label>
                                    <div class="col-md-6">
                                        <div class="row">
                                            @foreach ($amenityDetail as $amenity)
                                                <div class="col-md-4">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" id="amenity" name="amenity[]" value="{{ $amenity->id}}"
                                                                {{ isset($amenityByRoomId) && in_array($amenity->id, $amenityByRoomId) ? 'checked' : '' }}
                                                                {{ in_array($amenity->id, old('amenity', [])) ? 'checked' : '' }}>
                                                            {{ $amenity->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error amenity-error"><span class="amenity-text"></span></label>
                                </div>
                                <br>
                                <!-- special feature -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align ">Special feature<span
                                            class="">*</span></label>
                                    <div class="col-md-4">
                                        <div class="row">
                                                @foreach ($featureDetail as $feature)
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" id="feature" name="feature[]" value="{{ $feature->id }}"
                                                                    {{ isset($featureByRoomId) && in_array($feature->id, $featureByRoomId) ? 'checked' : '' }}
                                                                    {{ in_array($feature->id, old('feature', [])) ? 'checked' : '' }}>
                                                                    {{ $feature->name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                        </div>
                                    </div>
                                    <label class="col-form-label offset-2 col-md-3 col-sm-3 label-error feature-error"><span class="feature-text"></span></label>
                                </div>

                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary " >Submit</button>
                                            <button type='reset' class="btn btn-success" id="room-reset">Reset</button>
                                            @if (isset($roomDetail))
                                                <input type="hidden" name="id" value="{{ $roomDetail->id}}">
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
