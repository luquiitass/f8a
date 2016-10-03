@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
@endsection

@section('menu_competencias','active')

@section('menu2_'.$competencia->nombre,'active')


@section('main-content')
    <h3>{{$competencia->nombre}}</h3>

    <table>
        @foreach($competencia['attributes'] as $nombre => $valor)
            <tr>
                <td>{{$nombre}}: </td>
                <th> {{$valor}}</th>
            </tr>
        @endforeach
    </table>
@endsection



@section('scripts')
    @parent

    <script>

    </script>

@endsection