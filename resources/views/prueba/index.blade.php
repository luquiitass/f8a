@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_inicio','active')



@section('main-content')
    <ul>
        @foreach($result as $equipo)
            <li>{{$equipo->nombre}}</li>
        @endforeach
    </ul>
@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection