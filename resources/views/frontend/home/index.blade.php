@extends('layouts.frontend.master')
@section('title', (getSiteSetting() !== null ? getSiteSetting()->name : '') .'::Home Page')
@section('content')
<section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-lg-12">
				<form action="{{ url('room/search')}}" class="booking-form aside-stretch" method="GET">
					<div class="row">
						<div class="col-md d-flex py-md-4">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
									<label for="check-in-in-date">Check-in Date</label>
									<input type="text" id="check-in-in-date" class="form-control" name="check-in-date" placeholder="Check-in date" readonly>
								</div>
							</div>
						</div>
						<div class="col-md d-flex py-md-4">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
									<label for="check-out-out-date">Check-out Date</label>
									<input type="text" id="check-out-out-date" class="form-control" name="check-out-date"  placeholder="Check-out date" readonly disabled>
								</div>
							</div>
						</div>
						<div class="col-md d-flex py-md-4">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
									<label for="#">Room</label>
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="ion-ios-arrow-down"></span></div>
											<select name="" id="" class="form-control">
												<option value="">Suite</option>
												<option value="">Family Room</option>
												<option value="">Deluxe Room</option>
												<option value="">Classic Room</option>
												<option value="">Superior Room</option>
												<option value="">	</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md d-flex py-md-4">
							<div class="form-group align-self-stretch d-flex align-items-end">
								<div class="wrap align-self-stretch py-3 px-4">
									<label for="#">Guests</label>
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="ion-ios-arrow-down"></span></div>
											<select name="" id="" class="form-control">
												<option value="">1 Adult</option>
												<option value="">2 Adult</option>
												<option value="">3 Adult</option>
												<option value="">4 Adult</option>
												<option value="">5 Adult</option>
												<option value="">6 Adult</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md d-flex">
							<div class="form-group d-flex align-self-stretch">
								<input type="submit" class="btn btn-primary py-5 py-md-3 px-4 align-self-stretch d-block" value="SEARCH"/>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
{{-- facilities --}}
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Welcome to {{ (getSiteSetting() !== null ? getSiteSetting()->name : '') }}</span>
				<h2 class="mb-4">You'll Never Want To Leave</h2>
			</div>
		</div>
		<div class="row d-flex">
			<div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services py-4 d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-reception-bell"></span>
						</div>
					</div>
					<div class="media-body">
						<h3 class="heading mb-3">Friendly Service</h3>
					</div>
				</div>
			</div>
			<div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services active py-4 d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-serving-dish"></span>
						</div>
					</div>
					<div class="media-body">
						<h3 class="heading mb-3">Get Breakfast</h3>
					</div>
				</div>
			</div>
			<div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
				<div class="media block-6 services py-4 d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-car"></span>
						</div>
					</div>
					<div class="media-body">
						<h3 class="heading mb-3">Transfer Services</h3>
					</div>
				</div>
			</div>
			<div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services py-4 d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-spa"></span>
						</div>
					</div>
					<div class="media-body">
						<h3 class="heading mb-3">Suits &amp; SPA</h3>
					</div>
				</div>
			</div>
			<div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services py-4 d-block text-center">
					<div class="d-flex justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="ion-ios-bed"></span>
						</div>
					</div>
					<div class="media-body">
						<h3 class="heading mb-3">Cozy Rooms</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
{{-- reserve --}}
<section class="ftco-section ftco-wrap-about ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-7 order-md-last d-flex">
				<div class="img img-1 mr-md-2 ftco-animate" style="background-image: url({{ URL::asset('assets/frontend/images/about-1.jpg')}});"></div>
				<div class="img img-2 ml-md-2 ftco-animate" style="background-image: url({{ URL::asset('assets/frontend/images/about-2.jpg')}});"></div>
			</div>
			<div class="col-md-5 wrap-about pb-md-3 ftco-animate pr-md-5 pb-md-5 pt-md-4">
				<div class="heading-section mb-4 my-5 my-md-0">
					<span class="subheading">About Harbor Lights Hotel</span>
					<h2 class="mb-4">Harbor Lights Hotel the Most Recommended Hotel All Over the World</h2>
				</div>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				<p><a href="{{ URL::to('rooms')}}" class="btn btn-secondary rounded">Reserve Your Room Now</a></p>
			</div>
		</div>
	</div>
</section>

<!--master room  -->
<section class="ftco-section ftco-no-pb ftco-room">
	<div class="container-fluid px-0">
		<div class="row no-gutters justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Harbor Lights Rooms</span>
				<h2 class="mb-4">Hotel Master's Rooms</h2>
			</div>
		</div>
		<div class="row no-gutters">

            @if (count($roomRandom) >= 1)
                @php $count = 0; $line = 1; @endphp
                @foreach ($roomRandom as $room)
                    @php $count++; @endphp
					@php
						$class = ($line % 2 == 0) ? 'order-md-last' : '';
						$class2 = ($line % 2 == 0) ? 'right-arrow' : 'left-arrow';
					@endphp
					@if ($count % 2 == 0)
						@php $line++; @endphp
                    @else

					@endif
					@php
						$room_id    	= $room->id;
						$price_per_day 	= $room->price_per_day;
						$name 			= $room->name;
						$detail 		= $room->detail;
						$thumb_image 	= $room->thumbnail_image;
						$thumb_url 		= asset("assets/upload/".$room_id."/thumb/".$thumb_image);
					@endphp
                    <div class="col-lg-6">
                        <div class="room-wrap d-md-flex ftco-animate">
                            <a href="detail.php" class="img {{ $class }}" style="background-image: url({{ $thumb_url }});"></a>
                            <div class="half {{ $class2 }} d-flex align-items-center">
                                <div class="text p-4 text-center">
                                    <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                    <p class="mb-0"><span class="price mr-1">{{ $price_per_day }}</span> <span class="per">per night</span></p>
                                    <h3 class="mb-3"><a href="{{ URL::to('room/detail')}}">{{ $name }}</a></h3>
                                    <p class="pt-1"><a href="{{ URL::to('room/detail')."/".  $room_id }}" class="btn-custom px-3 py-2 rounded">detail info <span class="icon-long-arrow-right"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                No results found.
            @endif

        </div>
</section>
{{-- instagram --}}
@include('layouts.frontend.template.instagram')

@endsection
