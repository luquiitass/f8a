@if(isset($equipo))
    <div class="user-block">
        <img class="img-circle img-bordered-sm" src="{{$equipo->getFotoEscudo()}}" alt="Escudo">
        <span class="username">
            <a href="{{route('equipo.perfil',['equipo'=>$equipo->id])}}">{{$equipo->nombre}}</a>
        </span>
        <span class="description">{{!empty($equipo->alias)?'Alias '.$equipo->alias:''}} - categoría {{$equipo->categoria->nombre}}</span>
    </div>
@else
    faltaEquipo
@endif