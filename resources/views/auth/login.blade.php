<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('assets/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ URL::asset('assets/animate/css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('assets/css/custom/custom.min.css') }}" rel="stylesheet">

    <!-- PNotify -->
    <link href="{{ URL::asset('assets/css/pnotify/pnotify.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/pnotify/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/pnotify/pnotify.nonblock.css') }}" rel="stylesheet">

</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                                placeholder="Email or Username " />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-secondary" fdprocessedid="bzcu0h">Login </button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1>
                                    <i class="fa-paw fa-paw"></i>{{ getSiteSetting() !== null ? getSiteSetting()->name : '' }}
                                </h1>
                                <p>©2016 All Rights Reserved.
                                    {{ getSiteSetting() !== null ? getSiteSetting()->name : '' }} is a Bootstrap 4
                                    template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
<!-- jQuery -->
<script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>

<!-- PNotify -->
<script src="{{ URL::asset('assets/js/pnotify/pnotify.js') }}"></script>
<script src="{{ URL::asset('assets/js/pnotify/pnotify.buttons.js') }}"></script>
<script src="{{ URL::asset('assets/js/pnotify/pnotify.nonblock.js') }}"></script>
@if ($errors->has('username'))
    {{-- <p style="color:red;">{{ $errors->first('name')}}</p> --}}
    <script>
        new PNotify({
            title: 'Error!',
            text: '{{ $errors->first('username') }}',
            type: 'error',
            styling: 'bootstrap3'
        })
    </script>
@elseif($errors->has('password'))
    <script>
        new PNotify({
            title: 'Error!',
            text: '{{ $errors->first('password') }}',
            type: 'error',
            styling: 'bootstrap3'
        })
    </script>
@endif
@if (session('loginError'))
    <script>
        new PNotify({
            title: 'Error!',
            text: '{{ session('loginError') }}',
            type: 'error',
            styling: 'bootstrap3'
        })
    </script>
@endif


</html>
