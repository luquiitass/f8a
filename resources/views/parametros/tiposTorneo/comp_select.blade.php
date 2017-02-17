@php($id_select = str_random(10))
<div class="form-group">
    {{Form::label('Tipo de Torneo')}}
    {{Form::select('tipo_torneo_id',\App\TipoTorneo::select(),!empty($tipo->tipoTorneo)?$tipo->tipoTorneo->id:'null',array('class'=>'form-control','id'=>$id_select,'data-placeholder'=>'Seleccionar Tipo','style'=>'width: 75%'))}}
    {{--<a class="manita edit" data-toggle="modal" data-target="#myModal" data-link="/categoria/create" >+ Categoría</a>--}}
</div>


<script type="text/javascript">
    $("#{{$id_select}}").select2({
        placeholder: $(this).data('placeholder')
    });
</script>