@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Seguridad')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
    <style>
        .li_roles,.li_permission{
            border-bottom: 1px solid antiquewhite;
        }

        li.active.li_rol > a{
            border-top: 1px solid #e3e1e1;
            border-bottom: 1px solid #e3e1e1;
            border-radius: 3px;
            background-color: #dcedf8;
        }
        .roles,.description,.permission{
            max-height: 400px;
            height: auto;
            overflow: auto;
        }

    </style>
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
                    <li><a data-toggle="tab" href="#tab_permission">Permisos</a></li>
                </ul>

                <div class="tab-content">
                    <div id="tab_roles" class="tab-pane fade in active">
                        <div class="row" style="background: white">
                            <div class="col-xs-12 col-md-6 ">
                                <h4>Roles</h4>
                                {{link_to(route('rol.reate'),'Nuevo Rol',array('class'=>'btn btn-primary'))}}
                                <hr>
                                <ul id="ul_roles" class="nav nav-pills nav-stacked roles">
                                    @forelse($roles as $rol)
                                        <li id="li_rol_id_{{$rol->id}}" class="li_roles"><a href="#tab_rol_{{$rol->id}}" data-toggle="tab">{{$rol->name}}</a></li>
                                    @empty
                                        <li class="alert bg-success"> Sin Roles</li>
                                    @endforelse

                                </ul>
                            </div>
                            <div class="col-xs-12 col-md-6 ">
                                <h4>Datos del rol</h4>
                                <hr>
                                <div class="tab-content">
                                    @foreach($roles as $rol)
                                        <div id="tab_rol_{{$rol->id}}" class="tab-pane fade well description">
                                            <h4>{{$rol->name}}</h4>

                                            <p>{{$rol->description}}</p>
                                            <h3>Permisos</h3>
                                            <hr>
                                            <ul class="">
                                                @forelse($rol->permissions as $permiso)
                                                    <li>{{$permiso->name}}</li>
                                                @empty
                                                    <li>Sin Permisos</li>
                                                @endforelse
                                            </ul>

                                            {{link_to('/rol/'.$rol->id.'/edit','Editar',array('class'=>'btn btn-success btn-block'))}}
                                            <button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger btn-block" data-link="/rol/{{$rol->id}}/deleteMsg">
                                                Eliminar <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>


                    <div id="tab_permission" class="tab-pane fade">

                        <div class="row" style="background: white">
                            <div class="col-xs-12 col-md-6 ">
                                <h3>Permisos</h3>
                                {{link_to(route('permiso.create'),'Nuevo Permiso',array('class'=>'btn btn-primary'))}}
                                <hr>
                                <ul class="nav nav-pills nav-stacked permission">
                                    @forelse($permission as $permiso)
                                        <li class="li_permission"><a href="#tab_permiso_{{$permiso->id}}" data-toggle="tab">{{$permiso->name}}</a></li>
                                    @empty
                                        <li class="alert bg-success">Sin permission</li>
                                    @endforelse

                                </ul>
                            </div>
                            <div class="col-xs-12 col-md-6 ">
                                <div class="tab-content">
                                    <h3>Descrpcion</h3>
                                    <hr>
                                    @foreach($permission as $permiso)
                                        <div id="tab_permiso_{{$permiso->id}}" class="tab-pane fade well description">
                                            <p>descripcion: <strong>{{$permiso->description}}</strong></p>
                                            <p>modelo: <strong>{{$permiso->model}}</strong></p>
                                            <p>slug: <strong>{{$permiso->slug}}</strong></p>
                                            {{link_to('/permiso/'.$permiso->id.'/edit','Editar',array('class'=>'btn btn-primary btn-block'))}}
                                            <button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger btn-block" data-link="/permiso/{{$permiso->id}}/deleteMsg">
                                                Eliminar <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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