<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bravo Tours | Administration</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/plugins/select2/select2.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/css/lte.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/css/lte-override.css')}}" rel="stylesheet" type="text/css" />
        <meta content="{{Session::token()}}" name="csrf-token" />
        @yield('addon_stylesheets')
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue fixed">
        @include('layouts/admin/_header')
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">
                @include('layouts/admin/_sidebar')
            </aside>
            <aside class="right-side">
                <section class="content-header">
                    @yield('header_content')
                    @yield('breadcrumbs')
                </section>
                <section class="content">
                    @yield('content')
                </section>
            </aside>
        </div>
        
        <!-- START PLUGINS -->
        <script src="{{asset('js/plugins/jquery-1.10.2.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/plugins/jquery-ui-1.10.3.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/plugins/select2.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/plugins/daterangepicker.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/plugins/bootstrap3-wysihtml5.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/plugins/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <!-- END PLUGINS -->
        
        <script src="{{asset('js/admin/lte.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/admin/init.js')}}" type="text/javascript"></script>
        @yield('addon_js')
        
        @yield('inline_scripts')
    </body>
</html>