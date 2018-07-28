@extends('installer::layouts.steps')

@section('installer-title')
Estructura principal de datos
@endsection

@section('installer-styles')

@endsection

@section('installer-content')    
    
    <div class="">
        <h2>Estructura principal de datos</h2>
        <h4>Creando estructura principal de la base de dato</h4>
        @if(!$errors->has('error'))
        <div class="alert alert-success fade in">                                
            <strong><i class="fa fa-check-circle}}"></i></strong> Estructura creada con éxito!!!
        </div>
        @else        
        <div class="alert alert-danger fade in">                                
            <strong><i class="fa fa-ban}}"></i></strong>{{ $errors->first('error') }}
        </div>
        <div class="alert alert-danger fade in">                                
            <strong><i class="fa fa-ban}}"></i></strong>Error ocurrido o se pudo crear la estructura base, para configurar nuevamente preseione 
            <a class="" href="{{ url('installer/database')}}"> Aqui</a>
        </div>
        @endif
    </div>    
@endsection

@section('installer-btn')
<a class="btn btn-danger" type="button" href="{{ url('installer/email')}}">Atras</a>
<a class="btn btn-success {{ (!$errors->has('error'))?'':'disabled' }}" type="button" href="{{ url('installer/modulos')}}">Siguiente</a>
@endsection

@section('installer-script')
<script type="text/javascript">
    $(function () {

        $('#div-home').addClass('iw-current');
        $('#step-home').addClass('iw-current');
        $('#div-req').addClass('iw-current');
        $('#step-req').addClass('iw-current');
        $('#div-per').addClass('iw-current');
        $('#step-per').addClass('iw-current');
        $('#div-db').addClass('iw-current');
        $('#step-db').addClass('iw-current');
        $('#div-email').addClass('iw-current');
        $('#step-email').addClass('iw-current');

        $('#div-tab').addClass('iw-current');
        $('#step-tab').addClass('iw-current');
    
    });
</script>
@endsection