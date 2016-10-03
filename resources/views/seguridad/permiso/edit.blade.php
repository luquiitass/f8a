@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Seguridad')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_parametros','active')

@section('menu2_seguridad','active')


@section('main-content')

    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <div class="well">
                <h3>Editar Permiso</h3>
                <hr>
                {{Form::open(array('url'=>url('permiso/'.$permission->id.'/update')))}}
                {{Form::token()}}
                <div class="form-group">
                    {{Form::label('Nombre')}}
                    {{Form::text('nombre',$permission->name,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('slug')}}
                    {{Form::text('slug',$permission->slug,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('model')}}
                    {{Form::text('model',$permission->model,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('Descripcion')}}
                    {{Form::textArea('descripcion',$permission->description,array('class'=>'form-control','height'=>'117px'))}}
                </div>
                {{Form::submit('Modificar',array('class'=>'btn btn-primary'))}}
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