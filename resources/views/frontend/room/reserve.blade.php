@extends('layouts.frontend.master')
@section('title', (getSiteSetting() !== null ? getSiteSetting()->name : '') .'::Room Detail Page')
@section('content')

<section class="ftco-section contact-section bg-light">
    <div class="container">
        <h1 style="text-align:center;margin-bottom:30px;"> Room name example </h1>
        <div class="row block-9">
            <div class="col-md-6 order-md-last d-flex">
                    <form action="{{ route('reservation')}}" method="POST" class="bg-white p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            {{-- {{dd($room)}} --}}
                            <p >Price Per Day : <span id="price_per_day" name="price-per-day"> {{ $roomReserve->price_per_day}} </span> </p>

                            <p id="extra_bed_price" style="display: none;">Extra Bed Price : <span> {{ $roomReserve->extra_bed_price }}  </span> </p>

                            <p >Total Price :<span id="total-price"></span></p>
                            <p >Total Days : <span id="booking-day"></span> </p>
                        </div>
                        <div class="form-group">
                            <input type="text" id="check-in-date" name="check_in_date" class="form-control" value="{{ old('check_in_date')}}" placeholder="Check In Date" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" id="check-out-date" name="check_out_date" class="form-control" value="{{ old('check_out_date')}}" placeholder="Check Out Date" readonly disabled>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cus-name" value="{{ old('cus-name')}}" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="cus-email" value="{{ old('cus-email')}}" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cus-phone" value="{{ old('cus-phone')}}" placeholder="Your Phone">
                        </div>
                        <label for="extra-bed">
                            Extra bed &nbsp; &nbsp; &nbsp;<input type="checkbox" value="1" name="extra-bed" id="extra-bed" />
                        </label>
                        <div class="form-group">
                            <input type="submit" value="Send Message" name="form-sub" class="btn btn-primary py-3 px-5">
                            <input type="hidden" value="{{ $roomReserve->id}}" name="room-id" >
                            <input type="hidden" value="{{ $roomReserve->price_per_day}}" name="price_per_day">
                            <input type="hidden" value="{{ $roomReserve->extra_bed_price}}" name="extra_bed_price">
                        </div>
                    </form>
            </div>
            <div class="col-md-6 d-flex">
                <div class="col-md-12 ftco-animate">
                    <div class="single-slider owl-carousel">
                        @foreach ($roomReserve->getImageFromGallery as $gallery)
                            <div class="item">
                                <div class="room-img" style="background-image: url({{ URL::asset('assets/upload/'.$gallery->room_id."/".$gallery->image)}});"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
