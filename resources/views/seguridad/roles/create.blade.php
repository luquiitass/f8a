@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Seguridad')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}

    <style>
        #div_permisos{
            max-height: 500px;
            overflow: auto;
        }

    </style>

@endsection

@section('menu_parametros','active')

@section('menu2_seguridad','active')


@section('main-content')

    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <div class="well">
                <h3 class="">Nuevo Rol</h3>
                {{Form::open(array('url'=>url('rol')))}}
                    {{Form::token()}}
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{Form::label('nombre')}}
                                {{Form::text('name',null, array('class' =>'form-control'))}}
                                @include('mensajes.error_input',['name'=>'name'])
                            </div>

                            <div class="form-group">
                                {{Form::label('slug')}}
                                {{Form::text('slug',null, array('class' =>'form-control'))}}
                                @include('mensajes.error_input',['name'=>'slug'])
                            </div>

                            <div class="form-group">
                                {{Form::label('descripcion')}}
                                {{Form::textArea('description',null, array('class' =>'form-control'))}}
                                @include('mensajes.error_input',['name'=>'description'])
                            </div>
                        </div>
                        <div id="div_permisos" class="col-xs-6">
                            Permisos
                                @foreach($permisos as $permiso)
                                    <div class="box" style="padding-left: 5px;">
                                        {{Form::checkbox('permisos['.$permiso->id.']',$permiso->name)}}
                                        {{Form::label($permiso->name)}}
                                    </div>
                                @endforeach                        
                        </div>
                    </div>

    
                    {{Form::submit('Crear',array('class'=>'btn btn-primary'))}}

                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection