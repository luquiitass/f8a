@if(isset($torneo))

    @extends('competencia.unaCompetencia.configuraciones')

    @include('crop.incluir_librerias_jcrop')

    @section('competencia_configuraciones_migasDePan')
        <ol class="breadcrumb">
            <li>
                <a href="{{route('competencias.configuraciones',['competencia'=>$competencia->id])}}">Configuraciones</a>
            </li>
            <li class="">
                <a href="{{route('competencia.configuraciones',['competencia'=>$competencia->id])}}">Competencia {{$competencia->nombre}}</a>
            </li>
            <li class="">
                <a href="{{route('temporada.configuraciones',['temporada'=>$torneo->temporada->id])}}">Temporada {{$torneo->temporada->nombre}}</a>
            </li>
            <li class="active">
                {{$torneo->nombre}}
            </li>
        </ol>
    @endsection

    @section('competencia_configuraciones_content')
        <div class="resaltar bg-success" id="torneo">
            <div class="resaltar bg-white">
                <h3>{{$torneo->nombre}}</h3>
                <p><strong>Descripción: </strong>{{$torneo->descripcion}}</p>
                <p><strong>Inicia: </strong>{{$torneo->inicio->format('d/m/Y')}}</p>
                <p><strong>Finaliza: </strong>{{$torneo->fin->format('d/m/Y')}}</p>
                <p><strong>Categoría/as: </strong>{{$torneo->categorias->implode('nombre',',  ')}}</p>
                <div>
                    <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_torneo_editar">Editar Datos</a>
                    <div class="collapse" id="collapse_torneo_editar">
                        <div class="" id="contenedor_editar_torneo">
                            <div class="bg-white resaltar">
                                @include('torneo.comp_edit')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="resaltar bg-success" id="equipos">
            <div class="resaltar bg-white">
                <h3>Equipos</h3>
                @include('equipo.comp_asociar_equipo')
                <hr>
                @include('equipo.comp_index_admin',['equipos'=>$torneo->equipos])
            </div>

        </div>
    @endsection

@else
    <div class="alert alert-danger">
        Falta pasar el torneo
    </div>
@endif