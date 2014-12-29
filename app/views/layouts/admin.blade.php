<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bravo Tours | Administration</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ HTML::style('/shared/css/bootstrap.min.css') }}
        {{ HTML::style('/plugins/select2/select2.css') }}
        {{ HTML::style('/fonts/font-awesome.min.css') }}
        {{ HTML::style('/plugins/bootstrap-datepicker/datepicker3.css') }}
        {{ HTML::style('/plugins/html5wysiwyg/bootstrap-wysihtml5-0.0.2.css') }}
        {{ HTML::style('/plugins/uploadfile/uploadfile.css') }}
        {{ HTML::style('/backend/css/lte.css') }}
        {{ HTML::style('/backend/css/lte-override.css') }} 
         {{ HTML::style('/backend/css/addon.css') }}    
        <meta content="{{Session::token()}}" name="csrf-token" />
        @yield('addon_stylesheets')
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
           var baseURL = '{{ url("/") }}';
        </script>
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
        <!-- START LIBRARIES & PLUGINS -->
        {{ HTML::script('shared/js/jquery-2.0.3.min.js') }}
        {{ HTML::script('plugins/jquery-ui/jquery-ui-1.10.3.min.js') }}
        {{ HTML::script('shared/js/bootstrap.min.js') }}
        {{ HTML::script('plugins/select2/select2.min.js') }}
        {{ HTML::script('plugins/daterangepicker/daterangepicker.js') }}
        {{ HTML::script('plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}
        {{ HTML::script('plugins/jquery.slimscroll.min.js') }}
        {{ HTML::script('plugins/bootbox.min.js') }}
        {{ HTML::script('/plugins/html5wysiwyg/wysihtml5-0.3.0.min.js') }}
        {{ HTML::script('/plugins/html5wysiwyg/bootstrap-wysihtml5-0.0.2.min.js') }}  
        {{ HTML::script('/plugins/uploadfile/jquery.uploadfile.min.js') }}
        <!-- END LIBRARIES & PLUGINS -->

        {{ HTML::script('backend/js/helper.js') }}
        {{ HTML::script('backend/js/lte.js') }}
        {{ HTML::script('backend/js/scripts.js') }}

        @yield('addon_js')
        
        @yield('inline_scripts')
    </body>
</html>