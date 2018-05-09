<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>{{ config('app.name', 'Tamara') }}</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="stylesheet" href="{{ asset('css/vendor/fontawesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="{{ asset('js/jquery-2.0.0.js') }}"></script>
    <script> var BASE_URL = '{{ url('/') }}'</script>
    @yield('header')
</head>
<body class="blank">


<!-- Simple splash screen-->
<div class="splash">
    <div class="color-line"></div>
    <div class="splash-title">
        <h1>{{ config('app.name', 'Tamara') }}</h1>
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
</div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>

 @yield('content')



<!-- Vendor scripts -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/metisMenu.min.js')}}"></script>

<script src="{{ asset('js/parsley.js') }}"></script>

<!-- App scripts -->
<script src="{{ asset('js/homer.js') }}"></script>
@yield('footer')
</body>
</html>

