@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Equipos')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_equipos','active')
@section('menu2_equipos','active')


@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Equipos</h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Nombre</th>
                    <th>Administrador</th>
                    <th>Operaciones</th>
                </thead>
                <tbody>
                    @foreach($equipos as $equipo)
                        <tr>
                            <td>{{$equipo->nombre}}</td>
                            <td>{{$equipo->users->implode('name',', ')}}</td>
                            <td>
                                <a href="{{route('equipo.show',array('$equipo'=>$equipo->id))}}">Ver</a>
                                <a href="{{route('equipo.edit',array('equipo'=>$equipo->id))}}">Editar</a>
                                <a class="delete" data-toggle="modal" data-target="#myModal" data-link="/estadio/{{$equipo->id}}/deleteMsg" href="#">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection