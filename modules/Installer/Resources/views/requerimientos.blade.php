@extends('installer::layouts.steps')

@section('installer-title')
Verificación de requerimientos
@endsection

@section('installer-styles')

@endsection

@section('installer-content')    
    
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
@endsection

@section('installer-btn')
<a class="btn btn-danger" type="button" href="{{ url('installer')}}">Atras</a>
<a class="btn btn-success {{ ($sw)?'':'disabled' }}" type="button" href="{{ url('installer/permisos')}}">Siguiente</a>
@endsection

@section('installer-script')
<script type="text/javascript">
    $(function () {

        $('#div-home').addClass('iw-current');
        $('#step-home').addClass('iw-current');
        $('#div-req').addClass('iw-current');
        $('#step-req').addClass('iw-current');
    
    });
</script>
@endsection