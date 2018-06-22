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
                            <h2>Base de dato</h2>
                            <h4>Por favor introduzca la información de su base de datos</h4>   
                            <form class="form" action="{{ url('installer/database')}}" method="POST">
                                <select name="typedb">
                                    <option value="mysql">MySql</option>
                                    <option value="pgsql">Postgres</option>
                                </select>
                                <input type="text" name="portdb">
                                <input type="text" name="userdb">
                                <input type="text" name="passdb">
                                <input type="text" name="namedb">
                            </form>                         
                        </div>
                    </div>
                    <div class="panel-footer text-right">                        
                        <a class="btn btn-danger disabled" type="button" href="{{ url('installer/email')}}">Siguiente</a>                        
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
        $('#div-per').addClass('iw-current');
        $('#step-per').addClass('iw-current');
        $('#div-db').addClass('iw-current');
        $('#step-db').addClass('iw-current');
    
    });
</script>
@endsection
