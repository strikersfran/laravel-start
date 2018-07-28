@extends('installer::layouts.steps')

@section('installer-title')
Inicio de instalación
@endsection

@section('installer-styles')

@endsection

@section('installer-content')    
    
    <div class="">
        <h2>Bienvenidos Laravel Start</h2>
        <h3>Este proceso los guiará por cada una de las
        opciones necesarias para llevar acabo la instalación de esta
        aplicación.</h3>
    </div>    
@endsection

@section('installer-btn')
<a class="btn btn-success" type="button" href="{{ url('installer/requerimientos')}}">Siguiente</a>
@endsection

@section('installer-script')
<script type="text/javascript">
    $(function () {

        $('#div-home').addClass('iw-current');
        $('#step-home').addClass('iw-current');
    
    });
</script>
@endsection
