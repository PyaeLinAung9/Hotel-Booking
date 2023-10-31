@extends('layouts.master')
@section('title', (isset($featureData) ? 'Hotel Booking: Room Feature Edit Page' : 'Hotel Booking: Room Feature Create Page'))
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="title_left">
                <h3>Hotel Room Feature</h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">

                        <div class="x_content">
                            @if (isset($featureData))
                                <form action="{{ route('featureUpdate')}}" method="post" id="create-form" novalidate>
                            @else
                                <form action="{{ route('featureCreate')}}" method="post" id="create-form" novalidate>
                            @endif
                                @csrf
                                <span class="section">Create Feature</span>
                                <div class="field item ">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align " for="feeature-name">Name<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="name" id="feature-name" placeholder="feature..." value="{{ old('name',(isset($featureData)) ? $featureData->name : '') }}" required="required" />
                                        </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide" ><span class="name-text"></span></label>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary " id="sub">Submit</button>
                                            <button type='reset' class="btn btn-success" id="reset">Reset</button>
                                            @if (isset($featureData))
                                                <input type="hidden" name="id" value="{{ $featureData->id }}">
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
