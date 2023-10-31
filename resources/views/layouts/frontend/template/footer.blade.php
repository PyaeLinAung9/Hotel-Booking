<footer class="ftco-footer ftco-section img" style="background-image: url({{ URL::asset('assets/frontend/images/bg_4.jpg')}});">
	<div class="overlay"></div>
	<div class="container">
		<div class="row mb-5">
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2"></h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
						<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4 ml-md-5">
					<h2 class="ftco-heading-2">Useful Links</h2>
					<ul class="list-unstyled">
						{{-- <li><a href="#" class="py-2 d-block">Blog</a></li> --}}
						<li><a href="{{ URL::to('/balh/rooms.php')}}" class="py-2 d-block">Rooms</a></li>
						{{-- <li><a href="#" class="py-2 d-block">Amenities</a></li>
						<li><a href="#" class="py-2 d-block">Gift Card</a></li> --}}
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Privacy</h2>
					<ul class="list-unstyled">
						{{-- <li><a href="#" class="py-2 d-block">Career</a></li> --}}
						<li><a href="{{ URL::to('about.php')}}" class="py-2 d-block">About Us</a></li>
						<li><a href="{{ URL::to('contact.php')}}" class="py-2 d-block">Contact Us</a></li>
						{{-- <li><a href="#" class="py-2 d-block">Services</a></li> --}}
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Have a Questions?</h2>
					<div class="block-23 mb-3">
						<ul>
							<li><span class="icon icon-map-marker"></span><span class="text"> {{ getSiteSetting() !== null ? getSiteSetting()->address : ''}}</span></li>
							<li><a href="#"><span class="icon icon-phone"></span><span class="text"> {{ getSiteSetting() !== null ? getSiteSetting()->online_number : ''}}</span></a></li>
							<li><a href="contact.php"><span class="icon icon-envelope"></span><span class="text"> {{ getSiteSetting() !== null ? getSiteSetting()->email : ''}}</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">

				<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
		</div>
	</div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
</svg></div>


<script src="{{ URL::asset('assets/frontend/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/popper.min.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/jquery.easing.1.3.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/jquery.stellar.min.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/aos.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/scrollax.min.js')}}"></script>

<script src="{{ URL::asset('assets/frontend/js/google-map.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/main.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/jquery_ui.js')}}"></script>

<!-- PNotify -->
<script src="{{ URL::asset('assets/js/pnotify/pnotify.js')}}"></script>
<script src="{{ URL::asset('assets/js/pnotify/pnotify.buttons.js')}}"></script>
<script src="{{ URL::asset('assets/js/pnotify/pnotify.nonblock.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/image_jquery.js')}}"></script>

@if ($errors->has('check_in_date'))
    <script>
        new PNotify({
                    title: 'Error!',
                    text: '{{ $errors->first("check_in_date") }}',
                    type: 'error',
                    styling: 'bootstrap3'
                    })
    </script>
@elseif ($errors->has('check_out_date'))
    <script>
        new PNotify({
                    title: 'Error!',
                    text: '{{ $errors->first("check_out_date") }}',
                    type: 'error',
                    styling: 'bootstrap3'
                    })
    </script>
@elseif ($errors->has('cus-name'))
    <script>
        new PNotify({
                    title: 'Error!',
                    text: '{{ $errors->first("cus-name") }}',
                    type: 'error',
                    styling: 'bootstrap3'
                    })
    </script>
@endif
@if ( session('successMsg') )
    <script>
        new PNotify({
                    title: 'success!',
                    text: '{{ session('successMsg') }}',
                    type: 'success',
                    styling: 'bootstrap3'
                    })
    </script>
@endif
@if ( session('errorMsg') )
    <script>
        new PNotify({
                    title: 'error!',
                    text: '{{ session('errorMsg') }}',
                    type: 'error',
                    styling: 'bootstrap3'
                    })
    </script>
@endif
@if ( session('deleteMsg') )
    <script>
        new PNotify({
                    title: 'error!',
                    text: '{{ session('deleteMsg') }}',
                    type: 'error',
                    styling: 'bootstrap3'
                    })
    </script>
@endif

@if (isset($roomReserve))
<script>
    $(function() {
		updateTotalPrice();

		if($("#check-in-date").val() != '') {
			$("#check-out-date").prop("disabled", false);
		}

		$("#extra-bed").change(function() {
			updateTotalPrice();
		});

		$("#check-in-date").datepicker({
            minDate: 0,
            onSelect: function(selectedDate) {
                var date = new Date(selectedDate);
                date.setDate(date.getDate() + 1); // Add one day to selected date
				$("#check-out-date").val('');
                $("#check-out-date").datepicker("option", "minDate", date);
                $("#check-out-date").prop("disabled", false);
				updateTotalPrice();
            }
        });
		$("#check-out-date").datepicker({
        onSelect: function(selectedDate) {
            updateTotalPrice(); // Call the function immediately when check-out date is selected
        }
    	});

        function updateTotalPrice() {
			var is_extra_date = false;
			if ($("#extra-bed").is(":checked")) {
				$("#extra_bed_price").show();
				is_extra_date = true;
			} else {
				$("#extra_bed_price").hide();
				is_extra_date = false;
			}
            var pricePerDay = parseFloat({{ $roomReserve->price_per_day }});
            var extraBedPrice = parseFloat({{ $roomReserve->extra_bed_price }});

			var diffInDays   = 1;
			var checkInDate  = $("#check-in-date").datepicker("getDate");
            var checkOutDate = $("#check-out-date").datepicker("getDate");
            if (checkInDate && checkOutDate ){
                var diffInTime = checkOutDate.getTime() - checkInDate.getTime();
                var diffInDays = Math.ceil(diffInTime / (1000 * 3600 * 24));
            }
			var totalPrice;

			if(is_extra_date == true) {
				totalPrice = (pricePerDay + extraBedPrice) * diffInDays;
			}else{
				totalPrice = pricePerDay * diffInDays;
			}

            $("#total-price").text(totalPrice.toFixed(2));
			$("#booking-day").text(diffInDays);
        }

		updateTotalPrice();
    });
</script>
@endif
<script>
		// $("#check-in-in-date","#check-out-out-date").datepicker({
		// 	'format' : 'yyyy-mm-dd',
		// 	'autoclose': true,
		// });
		$("#check-in-in-date").datepicker({
            minDate: 0,
            onSelect: function(selectedDate) {
                var date = new Date(selectedDate);
                date.setDate(date.getDate() + 1); // Add one day to selected date
                $("#check-out-out-date").datepicker("option", "minDate", date);
				$("#check-out-out-date").prop("disabled", false);
            }
        });
		$("#check-out-out-date").datepicker({
			minDate: 0,
		});

</script>
</body>

</html>
