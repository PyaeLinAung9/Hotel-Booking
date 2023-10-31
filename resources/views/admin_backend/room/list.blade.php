@extends('layouts.master')
@section('title', 'Hotel Booking: Room List Page')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="title_left">
            <h3>Hotel Room List</h3>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Responsive example<small>Users</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table  id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Occupation</th>
                                            <th>Bed Type</th>
                                            <th>View</th>
                                            <th>Room Size</th>
                                            <th>Price Per Day</th>
                                            <th>Extra Bed Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($RoomData as $room)
                                            <tr>
                                                <td>{{$room->id}}</td>
                                                <td>{{$room->name}}</td>
                                                <td>{{$room->occupation}} {{ (getSiteSetting() !== null) ? getSiteSetting()->occupancy : ''}}</td>
                                                <td>{{$room->bed_name}}</td>
                                                <td>
                                                    {{getViewNameByRoom($room)}}
                                                </td>
                                                <td>{{$room->size}} {{ (getSiteSetting() !== null) ? getSiteSetting()->size_unit : ''}}</td>
                                                <td>{{$room->price_per_day}} {{ (getSiteSetting() !== null) ? getSiteSetting()->price_unit : ''}}</td>
                                                <td>{{$room->extra_bed_price}} {{ (getSiteSetting() !== null) ? getSiteSetting()->price_unit : ''}}</td>
                                                <td style="text-align:center;">
                                                    <a href="{{ URL::to('admin/room/detail')}}/{{ $room->id}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Detail </a>
                                                    <a href="{{ URL::to('admin/room/edit')}}/{{ $room->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                    <a href="{{ URL::to('admin/room/gallery')}}/{{ $room->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Photo Update </a>
                                                    <a href="{{ URL::to('admin/room/delete')}}/{{ $room->id}}" onclick="return confirm('Are you sure want to delete this?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
