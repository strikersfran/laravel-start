@extends('layouts.metronic')

@section('title')
<title>{{ config('app.name') }} | Instalación - @yield('installer-title')</title>
@endsection

@section('styles')

<link href="{{ Module::asset('installer:assets/css/module.css') }}" rel="stylesheet">

@yield('installer-styles')

@endsection

@section('content')    
    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">                        
                        <h3 class="panel-title"><i class="fa fa-cogs" aria-hidden="true"></i> Proceso de Instalación</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row iw-breadcrumb">
                            <li class="iw-step-divider iw-current"></li>
                            <li class="iw-step-divider" id="div-home"></li>
                            <li class="iw-step" id="step-home" title="Inicio"><i class="fa fa-home fa-2x"></i></li>

                            <li class="iw-step-divider" id="div-req"></li>
                            <li class="iw-step" id="step-req" title="Requerimientos"><i class="fa fa-sliders fa-2x"></i></li>

                            <li class="iw-step-divider" id="div-per"></li>
                            <li class="iw-step" id="step-per" title="Permisos"><i class="fa fa-folder fa-2x"></i></li>

                            <li class="iw-step-divider" id="div-db"></li>
                            <li class="iw-step" id="step-db" title="Configuración de base de datos"><i class="fa fa-database fa-2x"></i></li>

                            <li class="iw-step-divider" id="div-email"></li>
                            <li class="iw-step" id="step-email" title="Configuración de email"><i class="fa fa-envelope fa-2x"></i></li>

                            <li class="iw-step-divider" id="div-tab"></li>
                            <li class="iw-step" id="step-tab" title="Tablas y datos base"><i class="fa fa-table fa-2x"></i></li>

                            <li class="iw-step-divider" id="div-mod"></li>
                            <li class="iw-step" id="step-mod" title="Instalación de modulos"><i class="fa fa-cubes fa-2x"></i></li>

                            <li class="iw-step-divider" id="div-fin"></li>
                            <li class="iw-step" id="step-fin" title="Fin"><i class="fa fa-child fa-2x"></i></li>

                            <li class="iw-step-divider" id="div-home"></li>
                            <li class="iw-step-divider" id="div-home"></li>
                        </div>

                        @yield('installer-content')

                    </div>
                    <div class="panel-footer text-right">
                        @yield('installer-btn')                                                
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugins')
@endsection

@section('script')

<script src="{{ Module::asset('installer:assets/js/module.js') }}"></script>

@yield('installer-script')

@endsection
