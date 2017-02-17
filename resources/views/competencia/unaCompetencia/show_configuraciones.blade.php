@if(isset($competencia))

    @extends('competencia.unaCompetencia.configuraciones')

@section('competencia_configuraciones_migasDePan')
    <ol class="breadcrumb">
        <li>
            <a href="{{route('competencias.configuraciones',['competencia'=>$competencia->id])}}">Configuraciones</a>
        </li>
        <li class="active">
            Competencia
        </li>

    </ol>
@endsection


@section('competencia_configuraciones_content')
    <div class="resaltar bg-success" id="cong_general_general">
        <div class="resaltar bg-white">
            <h3>Nombre: <strong>{{$competencia->nombre}}</strong></h3>
            <p><strong>Descripción: </strong>{{$competencia->descripcion}}</p>
            <p><strong>Organizador de partidos: </strong>{{$competencia->org_partidos}}</p>
            <p><strong>Administrador/es: </strong>{{$competencia->users->implode('email',', ')}}</p>

            <div>
                <a class="btn btn-primary create" data-toggle="collapse" href="#collapse_competencia_editar">Editar Datos</a>
                <div class="collapse" id="collapse_competencia_editar">
                    <div class="" id="contenedor_editar_competencia">
                        <div class="bg-white resaltar">
                            <a  data-toggle="collapse" href="#collapse_competencia_editar" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            @include('competencia.comp_edit',compact('competencia'))
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="resaltar bg-success">
        <div class="resaltar bg-white">
            @include('temporada.admin.index_admin',array('temporadas'=>$competencia->temporadas))
        </div>
    </div>

    @endsection

@else
    <div class="alert alert-danger">
        Falta pasar la competencia
    </div>
@endif