@extends('installer::layouts.steps')

@section('installer-title')
Configurar de envio de correos
@endsection

@section('installer-styles')

@endsection

@section('installer-content')    
    
    <div class="">
        <h2>Envio de Correos</h2>
        <h4>Por favor introduzca la información de su servicio de correo</h4>   
        <form role="form" action="{{ url('installer/emailsave')}}" method="POST" id="formemail">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-body">
                <div class="form-group {{ $errors->has('emaildriver') ? 'has-error' : ''}}">
                    <label>Driver</label>
                    <select class="form-control" name="emaildriver">
                        <option value="log">log</option>
                        <option value="smtp">SMTP</option>
                        {!! $errors->first('emaildriver', '<p class="help-block">:message</p>') !!}
                    </select>
                </div>
                <div class="form-group {{ $errors->has('emailhost') ? 'has-error' : ''}}">
                    <label>Servidor</label>                    
                    <input type="text" name="emailhost" class="form-control" placeholder="Introduzca un Servidor" value="{{ $emailhost or old('emailhost')}}">
                    {!! $errors->first('emailhost', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('emailport') ? 'has-error' : ''}}">
                    <label>Puerto</label>                    
                    <input type="number" name="emailport" class="form-control" placeholder="Introduzca un puerto" value="{{ $emailport or old('emailport')}}">
                    {!! $errors->first('emailport', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('emailuser') ? 'has-error' : ''}}">
                    <label>Usuario</label>                    
                    <input type="text" name="emailuser" value="{{ $emailuser or old('emailuser')}}" class="form-control" placeholder="Introduzca un usuario">
                    {!! $errors->first('emailuser', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('emailpass') ? 'has-error' : ''}}">
                    <label>Contraseña</label>                    
                    <input type="text" name="emailpass" value="{{ $emailpass or old('emailpass')}}" class="form-control" placeholder="Introduzca una contraseña">
                    {!! $errors->first('emailpass', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('emailen') ? 'has-error' : ''}}">
                    <label>Encriptado</label>                    
                    <input type="text" name="emailen" value="{{ $emailen or old('emailen')}}" class="form-control" placeholder="Introduzca el metodo de encriptado">
                    {!! $errors->first('emailen', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </form>                         
    </div>    
@endsection

@section('installer-btn')
<a class="btn btn-danger" type="button" href="{{ url('installer/database')}}">Atras</a>
<a class="btn btn-success" type="button" href="javascript:enviar()">Siguiente</a>
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
    });

    function enviar(){
        $('#formemail').submit();
    }
</script>
@endsection