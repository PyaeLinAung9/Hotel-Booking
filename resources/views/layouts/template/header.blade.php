

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('assets/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('assets/css/nprogress/nprogress.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ URL::asset('assets/css/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="{{ URL::asset('assets/css/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Datatables -->
    <link href="{{ URL::asset('assets/css/datatables.net-bs/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/datatables.net-fixedheader-bsss/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/datatables.net-responsive-bs/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/datatables.net-scroller-bs/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('assets/css/custom/custom.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/backend.css?v=20230728')}}" rel="stylesheet">

    <!-- PNotify -->
    <link href="{{ URL::asset('assets/css/pnotify/pnotify.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/pnotify/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/pnotify/pnotify.nonblock.css')}}" rel="stylesheet">

  </head>

  <body class="nav-md">
  <div class="container body">
      <div class="main_container">
        @include('layouts.template.sidebar')
        @include('layouts.template.topnav')
