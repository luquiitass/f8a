@if(isset($titulo) && isset($modal))
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{$titulo}}</h4>
            </div>
            <div class="modal-body">
                <p>{{$mensaje}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
            </div>
        </div>

    </div>
</div>
@else
    Falta pasar titulo o mensaje;
@endif
