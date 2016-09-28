<div class="row" style="padding-bottom: 20px; background:#FFF;">
    <div class="col-xs-4">
        <h3>Paises</h3>
        <hr>
        <div class="nuevo text-center ">
            <button data-toggle="modal" data-target="#myModal" class = ' create btn btn-primary'  data-link = '/pais/create'>
                Nuevo Pais
            </button>
        </div>

        <div class="tabs">
            <ul id="ul_paises" class="nav nav-pills nav-stacked">
                @forelse($paises as $pais)

                    @include('pais.unPais',array('pais',$pais))

                @empty
                    <li class="alert bg-info"><span>Sin Paises</span></li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="col-xs-4" >
        <h3>Provincias</h3>
        <hr>
        <div class="tab-content" >
            @foreach($paises as $pais)
                <div id="p_{{$pais->id}}" class="tab-pane {{isset($paisActivo) && $paisActivo == $pais->id?'active':''}}" >
                    <div class="nuevo text-center ">
                        <button data-toggle="modal" data-target="#myModal" class = "create btn btn-primary "  data-link ="/{{$pais->id}}/provincias/create" > Nueva Provincia</button>
                    </div>
                    <ul id="ul_provincias" class="nav nav pills nav-stacked">
                        @forelse($pais->provincias as $provincia)

                            @include('provincia.unaProvincia',array('provincia'=>$provincia))

                        @empty
                            <li class="provincia alert bg-info"><strong>{{$pais->nombre}}</strong> no posee Provincias</li>
                        @endforelse
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-xs-4">
        <h3>Localidades</h3>
        <hr>
        <div class="tab-content">
            @foreach($paises as $pais)
                @foreach($pais->provincias as $provincia)
                    <div id="pr_{{$provincia->id}}" class="tab-pane {{isset($provinciaActiva) && $provinciaActiva == $provincia->id?'active':''}}">

                        <div class="nuevo text-center ">
                            <button data-toggle="modal" data-target="#myModal" class = "create btn btn-primary "  data-link ="/{{$provincia->id}}/localidad/create" > Nueva Provincia</button>
                        </div>

                        <ul id="ul_localidades" class="nav nav pills nav-stacked">
                            @forelse($provincia->localidades as $localidad)
                                @include('localidad.unaLocalidad',array('localidad'=>$localidad))

                            @empty
                                <li class="localidad alert bg-info"><strong>{{$provincia->nombre }}</strong> no posee Localidades</li>
                            @endforelse
                        </ul>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>