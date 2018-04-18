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
                        <div class="row iw-breadcrumb">
                            <li class="iw-step-divider iw-current"></li>
                            <li class="iw-step-divider iw-current"></li><li class="iw-step iw-current"><i class="fa fa-home"></i></li>
                            <li class="iw-step-divider"></li><li class="iw-step"><i class="fa fa-sliders"></i></li>
                            <li class="iw-step-divider"></li><li class="iw-step"><i class="fa fa-folder"></i></li>
                            <li class="iw-step-divider"></li><li class="iw-step"><i class="fa fa-file-text-o"></i></li>
                            <li class="iw-step-divider"></li><li class="iw-step"><i class="fa fa-database"></i></li>
                            <li class="iw-step-divider"></li><li class="iw-step"><i class="fa fa-cubes"></i></li>
                            <li class="iw-step-divider"></li><li class="iw-step"><i class="fa fa-child"></i></li>
                            <li class="iw-step-divider"></li>
                            <li class="iw-step-divider"></li>
                        </div>
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
@endsection
