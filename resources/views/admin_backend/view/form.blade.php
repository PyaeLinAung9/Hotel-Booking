@extends('layouts.master')
@section('title', 'Hotel Booking: View Create Page')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="title_left">
                <h3>Hotel Room View</h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">

                        <div class="x_content">
                            @if (isset($viewData))
                                <form action="{{ route('viewUpdate')}}" method="post" id="create-form" novalidate>
                            @else
                                <form action="{{ route('viewCreate')}}" method="post" id="create-form" novalidate>
                            @endif
                                @csrf
                                <span class="section">Create View</span>
                                <div class="field item ">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align ">Name<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="name" id="view-name" placeholder="eg. .... view" value="{{ old('name',(isset($viewData)) ? $viewData->name : '') }}" required="required" />
                                        </div>
                                    <label class="col-form-label col-md-3 col-sm-3 label-error error-hide" ><span class="name-text"></span></label>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='button' class="btn btn-primary " id="sub">Submit</button>
                                            <button type='reset' class="btn btn-success" id="reset">Reset</button>
                                            @if (isset($viewData))
                                                <input type="hidden" name="id" value="{{ $viewData->id }}">
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
