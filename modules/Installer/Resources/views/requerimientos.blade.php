@extends('installer::layouts.master')

@section('styles')
<link href="{{ Module::asset('installer:css/module.css') }}" rel="stylesheet">
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
                            <h2>Requerimientos</h2>
                            <h4>Requerimientos mínimos para el Servidor</h4>
                            @php ($sw=true)                            
                            @foreach($formData as $req)                            
                                <div class="alert alert-{{($req['check'])?'success':'danger'}} fade in">                                
                                    <strong><i class="fa fa-{{($req['check'])?'check-circle':'times-circle'}}"></i></strong> {{ $req['label']}}
                                </div>
                                @if(!$req['check'])
                                    @php ($sw=false)
                                @endif
                            @endforeach 
                        </div>
                    </div>
                    <div class="panel-footer text-right">                        
                        <a class="btn btn-danger {{ ($sw)?'':'disabled' }}" type="button" href="{{ url('installer/permisos')}}">Siguiente</a>                        
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
        $('#div-req').addClass('iw-current');
        $('#step-req').addClass('iw-current');
    
    });
</script>
@endsection