<div>
    <div class="col-form">
        {{Form::open()}}
        {{Form::token()}}

        <div class="form-group">
            {{Form::label('nombre')}}
            {{Form::text('nombre',null,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label('alias')}}
            {{Form::text('alias',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('fundado')}}
            {{Form::text('fundado',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('fundadores')}}
            {{Form::text('fundadores',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('descripcion')}}
            {{Form::textArea('descripcion',null,array('class'=>'form-control'))}}
        </div>

        <div class="centered">
            <a class="btn btn-primary save_ajax">Guardar</a>
        </div>
        {{Form::close()}}
    </div>
</div>