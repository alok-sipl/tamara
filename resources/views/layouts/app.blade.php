<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tamara') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/vendor/fontawesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/DataTable.min.css") }}" media="screen">
    <script src="{{ asset('js/jquery-2.0.0.js') }}"></script>
    <script> var BASE_URL = '{{ url('/') }}'</script>
</head>
<body class="admin-layout">
<!-- Simple splash screen-->
<div class="splash">
    <div class="color-line"></div>
    <div class="splash-title">
        <h1>Homer - Responsive Admin Theme</h1>
        <p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p>
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>

    </div>
</div>
<div class="splash">
    <div class="color-line"></div>
    <div class="splash-title"><h1>{{ config('app.name', 'Tamara') }}</h1>
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
</div>
<div class="splash">
    <div class="color-line"></div>
    <div class="splash-title"><h1>{{ config('app.name', 'Tamara') }}</h1>
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
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a
        href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
                <span>{{ config('app.name', 'Tamara') }}</span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">{{ config('app.name', 'Tamara') }}</span>
        </div>
        <form role="search" class="navbar-form-custom" method="post" action="#">
            <div class="form-group">
                <input type="text" placeholder="Search something special" class="form-control" name="search">
            </div>
        </form>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li>
                    <a href="{{ url('admin/logout') }}">
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!--SIDENAV -->
@include('layouts/admin-sidenav')
<!--END SIDENAV -->
<!-- Main Wrapper -->
<div id="wrapper">
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="server-message">
                    @if(Session::get('alert_msg'))
                        <div class="flash-message alert alert-warning">{!! Session::get('alert_msg') !!}</div>
                    @endif
                    @if(Session::get('success_msg'))
                        <div class="flash-message alert alert-success">{!! Session::get('success_msg') !!}</div>
                    @endif
                    @if(Session::get('error_msg'))
                        <div class="flash-message alert alert-danger">
                        {!! Session::get('error_msg') !!}</div>
                    @endif
                </div>
                @yield('content')
            </div>
            <footer class="footer">
                <span class="pull-right"></span>
                {{ config('app.name', 'Tamara') }}
            </footer>
        </div>

        <div class="modal iframe-modal-wrapper" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h3 class="modal-title m-t-0">VIEW</h3>
                            </div>
                            <div class="col-md-2 text-right">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <iframe src="" class="iframe bg-white" frameborder="0" name="info" seamless height="100%"
                                width="100%"></iframe>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Vendor scripts -->
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/metisMenu.min.js')}}"></script>
        <script src="{{ asset('js/DataTable.min.js') }}"></script>
        <script src="{{ asset('js/parsley.js')}}"></script>
        <script src="{{ asset('js/homer.js')}}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
@yield('footer')
</body>
</html>
