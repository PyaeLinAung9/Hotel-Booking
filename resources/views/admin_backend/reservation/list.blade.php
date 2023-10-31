@extends('layouts.master')
@section('title', 'Hotel Booking: Bed List Page')
@section('content')
    <!-- page content -->

    <div class="right_col" role="main">
        <div class="title_left">
            <h3>Hotel Room Reservation List</h3>
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
                                <table id="" class="table table-striped table-bordered dt-responsive nowrap " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Room Name</th>
                                            <th>Extra Bed</th>
                                            <th>Check In Date</th>
                                            <th>Check Out Date</th>
                                            <th>Total Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roomReserve as $reserve)
                                            <tr>
                                                <td> {{ $reserve->id}} </td>
                                                <td>
                                                    @if ($reserve->getCustomerInfo() !== null)
                                                        {{ $reserve->getCustomerInfo->name }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($reserve->getCustomerInfo() !== null)
                                                        {{ $reserve->getCustomerInfo->email }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($reserve->getCustomerInfo() !== null)
                                                        {{ $reserve->getCustomerInfo->phone }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($reserve->getReserveRooms() != null)
                                                        {{ $reserve->getReserveRooms->name }}
                                                    @endif
                                                </td>
                                                <td> @if($reserve->extra_bed == 0) {{ 'No' }} @else {{ 'Yes' }} @endif</td>
                                                <td>{{ $reserve->check_in}}</td>
                                                <td>{{ $reserve->check_out}}</td>
                                                <td>{{ $reserve->total_price}}</td>
                                                <td style="text-align:center;">
                                                    @if ($reserve->status == 0)
                                                        <p style="color: rgb(187, 100, 73); font-size: 15px; font-weight: bold;">Waiting For Responsed</p>
                                                    @endif
                                                    @if ($reserve->status == 2)
                                                        <a href="{{ URL::to('admin/reservation/decline/'.$reserve->id) }}"onclick="return confirm('Are you sure want to delete this?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" ></i> Delete </a>
                                                    @else
                                                        <a href="{{ URL::to('admin/reservation/accept/'.$reserve->id) }}"onclick="return confirm('Are you sure want to Accept this request?')" class="btn btn-primary btn-xs @if ($reserve->status == 1) {{ 'disabled'}} @endif"><i class="fa fa-folder"></i> Accept </a>
                                                        <a href="{{ URL::to('admin/reservation/decline/'.$reserve->id) }}"onclick="return confirm('Are you sure want to Decline this request?')" class="btn btn-warning btn-xs"><i class="fa fa-trash-o"></i> Decline </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    {{-- {{ $roomReserve->appends(request()->query())->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
