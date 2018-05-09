<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="csrf-token" content="<?php echo csrf_token() ?>">
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600,700' rel='stylesheet' type='text/css' ">
    <!-- Latest compiled and minified CSS -->

    <link rel="shortcut icon" href="{{ url("favicon.ico") }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ url("css/DataTable.min.css") }}" media="screen">
    <link rel="stylesheet" href="{{ url("css/bootstrap-datetimepicker.min.css") }}"/>
    <link rel="stylesheet" href="{{ url("css/sweet-alert.css") }}"/>
    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ url('vendor/fontawesome/css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ url('vendor/metisMenu/dist/metisMenu.css') }}"/>
    <link rel="stylesheet" href="{{ url('vendor/bootstrap/dist/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ url('css/summernote.css') }}"/>
    <!-- App styles -->
<!--        <link rel="stylesheet" href="{{ url('icon-fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" />-->
    <link rel="stylesheet" href="{{ url('css/style.css') }}"/>
    <script type="text/javascript" rel="dns-prefetch"
            src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script rel="dns-prefetch" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    @yield('header')
</head>
<body class="admin-layout">
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
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a
        href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
                <span>
                    {{ config('app.name', 'Tamara') }}
                </span>
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
@include('admin/admin-sidenav')
<!--END SIDENAV -->

<!-- Main Wrapper -->
<div id="wrapper">
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="server-message">
                    @if(Session::get('alert_msg'))
                        <span class="server-alert-msg">{!! Session::get('alert_msg') !!}</span>
                    @endif
                    @if(Session::get('success_msg'))
                        <span class="server-success-msg">{!! Session::get('success_msg') !!}</span>
                    @endif
                    @if(Session::get('error_msg'))
                        <span class="server-error-msg">{!! Session::get('error_msg') !!}</span>
                    @endif
                </div>

                @yield('content')

            </div>
            <footer class="footer">
                        <span class="pull-right">
                        </span>
                {{ config('app.name', 'Tamara') }}
            </footer>
        </div>


        <div class="modal iframe-modal-wrapper" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title m-t-0">VIEW</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true"><i class="pe-7s-close" aria-hidden="true"></i></span></button>
                    </div>
                    <div class="bodymodal">
                        <iframe src="" class="iframe bg-white" frameborder="0" name="info" seamless height="100%"
                                width="100%"></iframe>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Vendor scripts -->
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/metisMenu.min.js')}}"></script>
        <script src="{{ asset('js/parsley.js')}}"></script>
        <script src="{{ asset('js/homer.js')}}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
@yield('footer')

</body>
</html>
