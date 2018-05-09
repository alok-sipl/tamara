<!doctype html>
<html class="main-modal-html">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
        <meta name="csrf-token" content="<?php echo csrf_token() ?>">
        <title>{{ $title }}</title>
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600,700' rel='stylesheet' type='text/css' ">
        <!-- Latest compiled and minified CSS -->

        <link rel="shortcut icon" href="{{ url("favicon.ico") }}" type="image/x-icon" />
        <link rel="stylesheet" href="{{ url("css/DataTable.min.css") }}" media="screen">
        @yield('header')
        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ url('vendor/fontawesome/css/font-awesome.css') }}" />
        <link rel="stylesheet" href="{{ url('vendor/metisMenu/dist/metisMenu.css') }}" />
        <link rel="stylesheet" href="{{ url('vendor/bootstrap/dist/css/bootstrap.css') }}" />
        <!-- App styles -->
        <link rel="stylesheet" href="{{ url('icon-fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" />
        <link rel="stylesheet" href="{{ url('css/style.css') }}" />
        <script type="text/javascript" rel="dns-prefetch" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script rel="dns-prefetch" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    </head>
    <body class="admin-layout main-modal-body">
        <!--[if lt IE 7]>
        <p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Main Wrapper -->
        <div class="animate-panel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="server-message">
                        @php
                            if(Request::has('is_close')) {
                                Request::session()->flash('success_msg', Session::get('success_msg'));
                            }
                        @endphp

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
            </div>
        </div>
        <?php /*
        <div class="modal iframe-modal-wrapper" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h3 class="modal-title m-t-0">VIEW</h3>
                            </div>
                            <div class="col-md-2 text-right">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <iframe src="" class="iframe bg-white" frameborder="0" name="info" seamless height="100%" width="100%"></iframe>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        */ ?>
        <!-- Vendor scripts -->
        <script src="{{ url('vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ url('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('vendor/metisMenu/dist/metisMenu.min.js') }}"></script>
        <script src="{{ url('vendor/parsley.js') }}"></script>
        <script src="{{ url('vendor/notify.min.js') }}"></script>
        <script src="{{ url('js/summernote.js') }}"></script>
        <script src="{{ url('js/back-end/admin.js') }}"></script>
        <script src="{{ url('js/back-end/category.js') }}"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            @if (Request::has('is_close'))
                window.parent.closeModalReloadParent();
            @endif
        });
        </script>
        @yield('footer')
    </body>
</html>