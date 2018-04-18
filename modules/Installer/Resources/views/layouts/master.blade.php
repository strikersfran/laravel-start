<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="Aplicación iniciar de laravel con wizard install y autenticación">
        <meta name="author" content="Francisco Carrión">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <link rel="shortcut icon" href="#" type="image/png">
        <title>Laravel Start</title>        
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style-responsive.css') }}" rel="stylesheet">
        
        @yield('styles')
        
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
        
        @yield('content')
        
        <script src="{{ asset('/js/jquery-1.10.2.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('/js/jquery.form.js') }}"></script>
        <script src="{{ asset('/js/jquery.uploadfile.min.js') }}"></script>
        
        <!--Propios de cada pagina-->
        @yield('script')
        
    </body>
</html>
