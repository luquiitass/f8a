<div class="centered" id="div_imagen_jcrop">
    <a class="" href="#" data-img="img_perfil"  data-input="#input_img_perfil" data-link="/imagen/seleccionar_perfil" onclick="init_jcrop(this);">
        <img width="128px" height="128px" id="img_perfil" src="{{isset($foto)?$foto : asset('/img/pictures.png')}}">
    </a>
    <h2>Foto de Perfil</h2>
    {{Form::hidden('img_perfil',isset($foto)?$foto :'',array('id'=>'input_img_perfil'))}}
</div>

