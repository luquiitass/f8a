@if(!isset($temporada))
    <div class="alert alert-danger">
        Falta pasar la torneo
    </div>
@else

    <div class="">
        <div class="centered">
            <h3>Nueva Torneo</h3>
        </div>
        <div class="row">
            {{Form::open(array('id'=>'form_create_temporada'))}}

                {{Form::hidden('temporada_id',$temporada->id)}}

            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    {{Form::label('nombre')}}
                    {{Form::text('nombre',null,array('class'=>'form-control'))}}
                </div>

                <div class="form-group">
                    {{Form::label('descripción')}}
                    {{Form::textArea('descripcion',null,array('class'=>'form-control'))}}
                </div>
            </div>


            <div class="col-xs-12 col-md-6">

                <div class="form-group">
                    {{Form::label('Fecha inicio')}}
                    {{Form::text('inicio',null,array('class'=>'form-control datepicker'))}}

                </div>
                <div class="form-group">
                    {{Form::label('Fecha a finalizar')}}
                    {{Form::text('fin',null,array('class'=>'form-control datepicker'))}}
                </div>

                @include('categoria.comp_select_multiple')

                <div class="centered">
                    <a class="save_ajax btn btn-primary manita" data-link="/torneo" >Guardar</a>
                </div>
            </div>


            {{Form::close()}}
        </div>

    </div>
@endif
