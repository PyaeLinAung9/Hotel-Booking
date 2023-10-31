@extends('layouts.frontend.master')
@section('title', (getSiteSetting() !== null ? getSiteSetting()->name : '') .'::Room Detail Page')
@section('content')

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                        @if ($roomDetail->getImageFromGallery() != null)
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                @foreach ($roomDetail->getImageFromGallery as $gallery)
                                    <div class="item">
                                        <div class="room-img" style="background-image: url({{ URL::asset('assets/upload/'.$gallery->room_id."/".$gallery->image)}});"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                        <h2 class="mb-4"> {{ $roomDetail->name}} <span>- ({{ $roomDetail->occupation . "  " .(getSiteSetting() !== null ? getSiteSetting()->occupancy : '')}})</span></h2>
                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of
                            her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line
                            Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                        <div class="d-md-flex mt-5 mb-5">
                            <ul class="list">
                                <li><span>Max: {{ $roomDetail->occupation}} {{ getSiteSetting() !== null ? getSiteSetting()->occupancy : '' }}</span></li>
                                <li><span>Size: {{ $roomDetail->size }} {{ getSiteSetting() !== null ? getSiteSetting()->size_unit : '' }} </span></li>
                            </ul>
                            <ul class="list ml-md-5">
                                <li><span>View: {{ $roomDetail->view}} </span></li>
                                <li><span>Bed: {{ $roomDetail->bed}} </span></li>
                            </ul>
                            <ul class="list ml-md-5">
                                <li><span>Price Per Day: {{ $roomDetail->price_per_day}} {{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }} </span></li>
                                <li><span>Extra Price Per Day: {{ $roomDetail->extra_bed_price}} {{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }} </span></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex">
                            <a href="{{ URL::to('room/reserve/'. $roomDetail->id)}}" type="submit" class="btn btn-primary py-3 px-5"> Reserve </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate pl-md-5">
                <div class="sidebar-box">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon ion-ios-search"></span>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Amenities</h3>
                        @if (count($roomAmenity) > 0 )
                            @foreach ($roomAmenity as $amenity)
                                <li><a href="#"> {{ $amenity->name}} <span>(
                                    @if ($amenity->type == '0')
                                        General
                                    @elseif($amenity->type == '1')
                                        Bathroom
                                    @else
                                        Other
                                    @endif
                                    )</span></a></li>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Special Feature</h3>
                        @if (count($roomFeature) > 0 )
                            @foreach ($roomFeature as $feature)
                                <li><a href="#"> {{ $feature->name }}</a></li>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
