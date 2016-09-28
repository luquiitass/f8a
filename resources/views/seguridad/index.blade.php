@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Seguridad')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_parametros','active')

@section('menu2_seguridad','active')

@section('main-content')
    <div id="content">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <h3>Seguridad</h3>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab_roles">Roles</a></li>
                    <li><a data-toggle="tab" href="#tab_permisos">Permisos</a></li>
                </ul>

                <div class="tab-content">
                    <div id="tab_roles" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <h4>Roles</h4>
                                <ul class="nav nav-tabs">
                                    @forelse($roles as $rol)

                                    @empty
                                        <li class="alert bg-success"> No se han creado roles aun</li>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <h4>Permisos de roloes</h4>
                                <ul>
                                    @forelse($permisos as $permiso)
                                        @include('seguridad.permiso.unPermiso',array('permiso',$permiso))
                                    @empty
                                        <li class="alert bg-success"> Rol sin permisos</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>



                    <div id="tab_permisos" class="tab-pane fade">
                        <h3>Permisos</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    @parent

    <script>

    </script>

@endsection