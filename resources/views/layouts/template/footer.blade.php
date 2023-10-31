<!-- footer content -->
<footer>
    <div class="pull-right">
        Softguide: Intern & OJT training by <a href="">Colorlib</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ URL::asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- NProgress -->
<script src="{{ URL::asset('assets/js/nprogress/nprogress.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>

<!-- DateJS -->
<script src="{{ URL::asset('assets/js/DateJS/date.js') }}"></script>

<!-- bootstrap-daterangepicker -->
<script src="{{ URL::asset('assets/js/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ URL::asset('assets/js/custom/custom.js') }}"></script>

<!-- validator-->
<script src="{{ URL::asset('assets/js/validator/multifield.js') }}"></script>
<script src="{{ URL::asset('assets/js/validator/validator.js') }}"></script>

<!-- FastClick -->
<script src="{{ URL::asset('assets/js/fastclick/fastclick.js') }}"></script>

<!-- Datatables -->
<script src="{{ URL::asset('assets/js/datatables.net/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatables.net-bs/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatables.net-fixedheader/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatables.net-keytable/dataTables.keyTable.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatables.net-responsive/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatables.net-responsive-bs/responsive.bootstrap.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatables.net-scroller/dataTables.scroller.min.js') }}"></script>

<!-- PNotify -->
<script src="{{ URL::asset('assets/js/pnotify/pnotify.js') }}"></script>
<script src="{{ URL::asset('assets/js/pnotify/pnotify.buttons.js') }}"></script>
<script src="{{ URL::asset('assets/js/pnotify/pnotify.nonblock.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/image_jquery.js') }}"></script>

@if ($errors->has('name'))
    <script>
        new PNotify({
                    title: 'Error!',
                    text: '{{ $errors->first("name") }}',
                    type: 'error',
                    styling: 'bootstrap3'
                    })
    </script>
@elseif ($errors->has('occupation'))
    <script>
        new PNotify({
                    title: 'Error!',
                    text: '{{ $errors->first("occupation") }}',
                    type: 'error',
                    styling: 'bootstrap3'
                    })
    </script>
@elseif ($errors->has('bed'))
<script>
    new PNotify({
                title: 'Error!',
                text: '{{ $errors->first("bed") }}',
                type: 'error',
                styling: 'bootstrap3'
                })
</script>
@elseif ($errors->has('size'))
<script>
    new PNotify({
                title: 'Error!',
                text: '{{ $errors->first("size") }}',
                type: 'error',
                styling: 'bootstrap3'
                })
</script>
@elseif ($errors->has('view'))
<script>
    new PNotify({
                title: 'Error!',
                text: '{{ $errors->first("view") }}',
                type: 'error',
                styling: 'bootstrap3'
                })
</script>
@elseif ($errors->has('price_per_day'))
<script>
    new PNotify({
                title: 'Error!',
                text: '{{ $errors->first("price_per_day") }}',
                type: 'error',
                styling: 'bootstrap3'
                })
</script>
@elseif ($errors->has('extra_bed_price'))
<script>
    new PNotify({
                title: 'Error!',
                text: '{{ $errors->first("extra_bed_price") }}',
                type: 'error',
                styling: 'bootstrap3'
                })
</script>
@elseif ($errors->has('description'))
<script>
    new PNotify({
                title: 'Error!',
                text: '{{ $errors->first("description") }}',
                type: 'error',
                styling: 'bootstrap3'
                })
</script>
@elseif ($errors->has('detail'))
<script>
    new PNotify({
                title: 'Error!',
                text: '{{ $errors->first("detail") }}',
                type: 'error',
                styling: 'bootstrap3'
                })
</script>
@elseif ($errors->has('amenity'))
<script>
    new PNotify({
                title: 'Error!',
                text: '{{ $errors->first("amenity") }}',
                type: 'error',
                styling: 'bootstrap3'
                })
</script>
@elseif ($errors->has('feature'))
<script>
    new PNotify({
                title: 'Error!',
                text: '{{ $errors->first("feature") }}',
                type: 'error',
                styling: 'bootstrap3'
                })
</script>
@elseif ($errors->has('image-name'))
<script>
    new PNotify({
                title: 'Error!',
                text: '{{ $errors->first("image-name") }}',
                type: 'error',
                styling: 'bootstrap3'
                })
</script>
@endif

@if ($errors->has('type'))
    <script>
        new PNotify({
                    title: 'Error!',
                    text: '{{ $errors->first("type") }}',
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
<script>
    $('#check-in').datetimepicker({
        format: 'hh:mm A'
    });
    $('#check-out').datetimepicker({
        format: 'hh:mm A'
    });
</script>
<script>
$(document).ready(function() {
    // view bed feature page
    $('#sub').click(function() {
        let error               = false;
        var view_error          = $("#view-name").val();
        var view_error_length   = view_error.length;

        if (view_error == "") {
            error = true;
            $(".error-hide").show();
            $(".name-text").text("Please fill name");
        }
        if (view_error != "" && view_error_length < 3) {
            error = true;
            $(".error-hide").show();
            $(".name-text").text("The name you enter is less than three words! ");
        }
        if (view_error != "" && view_error_length > 40) {
            error = true;
            $(".error-hide").show();
            $(".name-text").text("The name you enter is greater than fourty words! ");
        }
        if (error == false) {
            $("#create-form").submit();
        }

    })
    $('#reset').click(function() {

        $(".error-hide").hide();
    })

    // amenity page
    $('#amenity-sub').click(function() {
        let error               = false;
        var view_error          = $("#amenity-name").val();
        var view_error_length   = view_error.length;

        if (view_error == "") {
            error = true;
            $(".error-hide").show();
            $(".name-text").text("Please fill name");
        }
        if (view_error != "" && view_error_length < 3) {
            error = true;
            $(".error-hide").show();
            $(".name-text").text("The name you enter is less than three words! ");
        }
        if (view_error != "" && view_error_length > 20) {
            error = true;
            $(".error-hide").show();
            $(".name-text").text("The name you enter is greater than twenty words! ");
        }
        var select_error        = $("#select-name").val();
        var select_error_length = select_error.length;

        if (select_error == "") {
            error = true;
            $(".select-error-hide").show();
            $(".name-select").text("Please select something");
        }
        if (error == false) {
            $("#create-amenity-form").submit();
        }

    })
    $('#amenity-reset').click(function() {

        $(".error-hide").hide();
        // $("#create-form").clear();
        // $(".name-text").text("");
    })

    // room-page
    $('#room-sub').click(function() {
        let error = false;
        var room_error = $("#room-name").val();
        var room_error_length = room_error.length;

        if (room_error == "") {
            error = true;
            $(".error-hide").show();
            $(".name-text").text("Please fill the room name");
        }
        if (room_error != "" && room_error_length < 3) {
            error = true;
            $(".error-hide").show();
            $(".name-text").text("The name you enter is less than three words! ");
        }
        if (room_error != "" && room_error_length > 20) {
            error = true;
            $(".error-hide").show();
            $(".name-text").text("The name you enter is greater than twenty words! ");
        }
        var occupation_error = $("#occupation").val();
        var occupation_error_length = occupation_error.length;

        if (occupation_error == "") {
            error = true;
            $(".occupation-error").show();
            $(".occupation-text").text("Please fill the occupation ");
        }
        var bed_select_error        = $("#select-bed").val();
        var bed_select_error_length = bed_select_error.length;

        if (bed_select_error == "") {
            error = true;
            $(".bed-select-error-hide").show();
            $(".bed-select").text("Please select bed something");
        }
        var size_error = $("#size").val();
        var size_error_length = size_error.length;

        if (size_error == "") {
            error = true;
            $(".size-error").show();
            $(".size-text").text("Please fill the size ");
        }

        var view_select_error        = $("#select-view").val();
        var view_select_error_length = view_select_error.length;

        if (view_select_error == "") {
            error = true;
            $(".view-select-error-hide").show();
            $(".view-select").text("Please select something");
        }

        var price_per_day_error = $("#price-per-day").val();
        var price_per_day_error_length = price_per_day_error.length;

        if (price_per_day_error == "") {
            error = true;
            $(".price-per-day-error").show();
            $(".price-per-day-text").text("Please fill price per day ");
        }

        var extra_bed_error = $("#extra-bed").val();
        var extra_bed_error_length = extra_bed_error.length;

        if (extra_bed_error == "") {
            error = true;
            $(".extra-bed-error").show();
            $(".extra-bed-text").text("Please fill the extra bed price");
        }

        var description_error = $("#description").val();
        var description_error_length = description_error.length;

        if (description_error == "") {
            error = true;
            $(".description-error").show();
            $(".description-text").text("Please fill description");
        }

        var detail_error = $("#detail").val();
        var detail_error_length = detail_error.length;

        if (detail_error == "") {
            error = true;
            $(".detail-error").show();
            $(".detail-text").text("Please fill detail");
        }

        var amenity_error = $("#amenity").val();
        var amenity_error_length = amenity_error.length;

        if (amenity_error == []) {
            error = true;
            $(".amenity-error").show();
            $(".amenity-text").text("Please select amenity");
        }

        var feature_error = $("#feature").val();
        var feature_error_length = feature_error.length;

        if (feature_error == []) {
            error = true;
            $(".feature-error").show();
            $(".feature-text").text("Please select feature");
        }

        if (error == false) {
            $("#create-form").submit();
        }

    })
    $('#room-reset').click(function() {

        $(".error-hide").hide();
        // $("#create-form").clear();
        // $(".name-text").text("");
    })
})


</script>

</body>

</html>
