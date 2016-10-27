<div class="">
    <h3>Configuraciones</h3>
    <div>
        <div class="row">
            <div class="hidden-xs col-md-3">
                <ul class="nav nav-stacked">
                    <li class=" active"><a href="#conf_datos_generales" data-toggle="tab">Datos Generales</a></li>
                    <li><a href="#conf_estadios" data-toggle="tab">Estadios</a></li>
                    <li><a href="#conf_contacto" data-toggle="tab">Contacto</a></li>
                    <li><a href="#conf_otro" data-toggle="tab">Otro</a></li>
                </ul>
            </div>

            <div class="col-xs-12 col-md-9 borde-left">
                <div class="tab-content">
                    <div id="conf_datos_generales" class="tab-pane fade in active">
                        <div class="row">

                            <div class="col-xs-12 col-md-6">
                                <div class="separador_in_tabs resaltar">
                                    <div class="titulo">
                                        <span>Datos Del Equipo</span>
                                    </div>
                                    @include('equipo.comp_show',compact('equipo'))
                                    <a class="manita" data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                                </div>{{--Datos del equipo--}}

                                <br>

                                <div class="separador_in_tabs resaltar">
                                    <div class="titulo">
                                        <span>Datos de Estadio</span>
                                    </div>
                                    @forelse($equipo->estadios as $estadio)
                                        @include('estadio.comp_show',['estadio'=>$estadio])
                                        <a class="manita" data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>

                                    @empty
                                        Sin Estadios
                                    @endforelse
                                </div>

                            </div>{{--Columna datos de equipo--}}

                            <div class="col-xs-12 col-md-6"></div>
                        </div>


                    </div>

                    <div id="conf_estadios" class="tab-pane fade">
                        <h3>Estadios</h3>
                        @forelse($equipo->estadios as $estadio)
                            @include('estadio.comp_edit',['estadio'=>$estadio])
                        @empty
                            Sin Estadios
                        @endforelse
                    </div>

                    <div id="conf_contacto" class="tab-pane fade">
                        <h3>Contacto</h3>
                        @if(isset($equipo->contacto))
                            @include('contacto.comp_edit',['contacto'=>$equipo->contacto])
                        @else
                            Crear Contacto
                            @include('contacto.comp_create')
                        @endif
                    </div>

                    <div id="conf_otro" class="tab-pane fade">
                        <h3>Otros</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>