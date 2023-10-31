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
					@if ($count == 2 || $count == 4)
						@php $line++; @endphp
					@endif
					@php
						$room_id    	= $room->id;
						$price_per_day 	= $room->price_per_day;
						$name 			= $room->name;
						$detail 		= $room->detail;
						$thumb_image 	= $room->thumbnail_image;
						$thumb_url 		= asset("assets/upload/{$room_id}/thumb/{$thumb_image}");
					@endphp
                    <div class="col-lg-6">
                        <div class="room-wrap d-md-flex ftco-animate">
                            <a href="room_detail.php" class="img {{ $class }}" style="background-image: url({{ $thumb_url }});"></a>
                            <div class="half {{ $class2 }} d-flex align-items-center">
                                <div class="text p-4 text-center">
                                    <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                    <p class="mb-0"><span class="price mr-1">{{ $price_per_day }}</span> <span class="per">per night</span></p>
                                    <h3 class="mb-3"><a href="rooms.html">{{ $name }}</a></h3>
                                    <p class="pt-1"><a href="room/detail/{{ $room_id }}" class="btn-custom px-3 py-2 rounded">detail info <span class="icon-long-arrow-right"></span></a></p>
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
