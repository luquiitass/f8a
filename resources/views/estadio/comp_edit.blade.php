<div class="col-form">
    {{Form::open(array())}}
        {{Form::token()}}
        <div class="form-group">
            {{Form::label("nombre")}}
            {{Form::text('nombre',$estadio->nombre,array('class'=>'form-control'))}}
        </div>

    <div class="form-group">
        {{Form::label("alias")}}
        {{Form::text('alias',$estadio->alias,array('class'=>'form-control'))}}
    </div>

    <div class="form-group">
        {{Form::label("capasidad")}}
        {{Form::text('capasidad',$estadio->capasidad,array('class'=>'form-control'))}}
    </div>

    <div class="form-group">
        {{Form::label("iluminado")}}
        {{Form::text('iluminado',$estadio->iluminado,array('class'=>'form-control'))}}
    </div>

    <div class="form-group">
        {{Form::label("arquitectos")}}
        {{Form::text('arquitectos',$estadio->arquitectos,array('class'=>'form-control'))}}
    </div>

    <div class="form-group">
        {{Form::label("dueños")}}
        {{Form::text('dueños',$estadio->dueños,array('class'=>'form-control'))}}
    </div>

    <div class="form-group">
        {{Form::label("inauguracion")}}
        {{Form::text('inauguracion',$estadio->inauguracion,array('class'=>'form-control'))}}
    </div>
    <div class="centered">
        <button class="btn btn-primary">Modificar</button>
    </div>

    {{Form::close()}}
</div>