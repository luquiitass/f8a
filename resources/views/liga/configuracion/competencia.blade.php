@if(isset($competencia))

    @extends('liga.root')

    @section('titulo_seccion')

    @endsection

    @section('menu_liga_configuraciones','active')

    @section('liga_configuraciones_content')
        @include('competencia.comp_show_configuraciones')
    @endsection
@else
    Falta pasar la competencia
@endif