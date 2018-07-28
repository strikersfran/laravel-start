<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="Aplicación iniciar de laravel con wizard install y autenticación">
        <meta name="author" content="Francisco Carrión">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <link rel="shortcut icon" href="#" type="image/png">
        
        @yield('title')

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
        <link href="{{ url('metronic/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('metronic/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('metronic/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('metronic/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        
        <!-- BEGIN PAGE LEVEL STYLES -->
        @yield('styles')    
        <!-- END PAGE LEVEL STYLES -->

        <!-- BEGIN THEME STYLES -->
        <link href="{{ url('metronic/global/css/components-rounded.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="{{ url('metronic/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ url('metronic/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="{{ url('metronic/admin/layout/css/themes/default.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ url('metronic/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body class="login">
        <input type="hidden" value="{{url('/')}}" id="url_base">

        @yield('content')
        
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            2018 &copy; Laravel Start - por strikersfran.
        </div>
        <!-- END COPYRIGHT -->
    
        <script src="{{ url('metronic/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('metronic/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('metronic/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('metronic/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('metronic/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('metronic/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('metronic/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        @yield('plugins')
        <!-- END PAGE LEVEL PLUGINS -->
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ url('metronic/global/scripts/metronic.js') }}" type="text/javascript"></script>
        <script src="{{ url('metronic/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
        <script src="{{ url('metronic/admin/layout/scripts/demo.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->  
        <script>
            jQuery(document).ready(function() {    
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                Demo.init();
            });
        </script>
        
        @yield('script')
        
    </body>
</html>