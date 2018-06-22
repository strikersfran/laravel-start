@extends('installer::layouts.master')

@section('styles')
<link href="{{ Module::asset('installer:css/module.css')}}" rel="stylesheet">
@endsection

@section('content')    
    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">                        
                        <h3 class="panel-title"><i class="fa fa-cubes" aria-hidden="true"></i> Instalación de la Aplicación</h3>
                    </div>
                    <div class="panel-body">
                        @include('installer::layouts.steps')
                        <div class="">
                            <h2>Bienvenidos Laravel Start</h2>
                            <h3>Este proceso los guiará por cada una de las
                            opciones necesarias para llevar acabo la instalación de esta
                            aplicación.</h3>
                        </div>
                    </div>
                    <div class="panel-footer text-right">                        
                        <a class="btn btn-danger" type="button" href="{{ url('installer/requerimientos')}}">Siguiente</a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
<script src="{{ Module::asset('installer:js/module.js') }}"></script>
<script type="text/javascript">
    $(function () {

        $('#div-home').addClass('iw-current');
        $('#step-home').addClass('iw-current');
    
    });
</script>
@endsection
