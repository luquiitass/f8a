@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_competencias','active')

@section('menu2_'.$competencia->nombre,'active')


@section('main-content')
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h3>comp. {{$competencia->nombre}}</h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="well bg-success">
                        <p >{{$competencia->descripcion}}</p>
                    </div>
                </div>
                <div class="col-xs-12">
                    <h4>Administrado</h4>
                    <ul>
                        @foreach($competencia->users as $user)
                            <li>{{$user->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>


        </div>
        <div class="col-xs-12 col-md-6">
            <h3>Torneos</h3>
            <a class="btn btn-primary btn-block" href="/torneo/create">Crer Torneo</a>
        </div>

    </div>


@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection