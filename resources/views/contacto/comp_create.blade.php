<div class="col-form">
    {{Form::open()}}
    {{Form::token()}}

    <div class="form-group">
        {{Form::label('nombre')}}
        {{Form::text('nombre',null,array('class'=>'form-control'))}}
    </div>

    <div class="form-group">
        {{Form::label('email')}}
        {{Form::text('email',null,array('class'=>'form-control'))}}
    </div>

    <div id="form-telefonos">
        @if($contacto->telefono)
            @include('telefono.comp_create')
        @else
            @include('telefono.comp_create')
        @endif

        <button onclick="html_addTelefono();">Añadir telefono</button>
    </div>


    {{Form::close()}}
</div>