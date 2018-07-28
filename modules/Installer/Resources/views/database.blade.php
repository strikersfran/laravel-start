@extends('installer::layouts.steps')

@section('installer-title')
Configurar base de datos
@endsection

@section('installer-styles')

@endsection

@section('installer-content')    
    
    <div class="">
        <h2>Base de dato</h2>
        <h4>Por favor introduzca la información de su base de datos</h4>   
        <form role="form" action="{{ url('installer/dbsave')}}" method="POST" id="formdb">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-body">
                <div class="form-group {{ $errors->has('tipodb') ? 'has-error' : ''}}">
                    <label>Tipo</label>
                    <select class="form-control" name="tipodb">
                        <option value="mysql">MySql</option>
                        <option value="pgsql">Postgres</option>
                        {!! $errors->first('tipodb', '<p class="help-block">:message</p>') !!}
                    </select>
                </div>
                <div class="form-group {{ $errors->has('portdb') ? 'has-error' : ''}}">
                    <label>Puerto</label>                    
                    <input type="number" name="portdb" class="form-control" placeholder="Introduzca un puerto" value="{{ $portdb or old('portdb')}}">
                    {!! $errors->first('portdb', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('userdb') ? 'has-error' : ''}}">
                    <label>Usuario</label>                    
                    <input type="text" name="userdb" value="{{ $userdb or old('userdb')}}" class="form-control" placeholder="Introduzca un usuario">
                    {!! $errors->first('userdb', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('passdb') ? 'has-error' : ''}}">
                    <label>Contraseña</label>                    
                    <input type="text" name="passdb" value="{{ $passdb or old('passdb')}}" class="form-control" placeholder="Introduzca una contraseña">
                    {!! $errors->first('passdb', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('namedb') ? 'has-error' : ''}}">
                    <label>Base de dato</label>                    
                    <input type="text" name="namedb" value="{{ $namedb or old('namedb')}}" class="form-control" placeholder="Introduzca una base de datos">
                    {!! $errors->first('namedb', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </form>                         
    </div>    
@endsection

@section('installer-btn')
<a class="btn btn-danger" type="button" href="{{ url('installer/permisos')}}">Atras</a>
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
    });

    function enviar(){
        $('#formdb').submit();
    }
</script>
@endsection