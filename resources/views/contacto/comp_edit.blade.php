<div class="col-form">
    {{Form::open()}}
    {{Form::token()}}

    <div class="form-group">
        {{Form::label('nombre')}}
        {{Form::text('nombre',$contacto->nombre,array('class'=>'form-control'))}}
    </div>

    <div class="form-group">
        {{Form::label('email')}}
        {{Form::text('email',$contacto->email,array('class'=>'form-control'))}}
    </div>

    <div id="form-telefonos">
        @if(isset($contacto->telefonos))
            @include('telefono.comp_edit',['telefonos'=>$contacto->telefonos])
        @else
            @include('telefono.comp_create')
        @endif

    </div>

    <div class="">
        <a class="glyphicon glyphicon-plus-sign addTelefono manita" style="padding: 10px;"> Telefono</a>
    </div>
    <div class="centered">
        {{Form::submit('Modificar',array('class'=>'btn btn-primary'))}}
    </div>
    {{Form::close()}}

</div>