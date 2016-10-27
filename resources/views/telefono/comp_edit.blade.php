<div>
    <?php
        $tel= "Telefono ";
        $num = 0;
    ?>
    @foreach($telefonos as $telefono)
        <?php $dato = $tel . ($num+1) ?>
        {{Form::label($dato)}}
        {{Form::text('telefono[]',$telefono->numero,array('class'=>'form-control'))}}
    @endforeach
</div>