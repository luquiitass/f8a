<div class="modal-large">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-body height_cien">
            <div class="mensaje_modal"></div>
            <?php echo isset($body)?$body:''; ?>


            <div id="modal_body" class="height_cien">

                <center class="height_cien alfa">

                    <button type="button" class="close" onclick="cerrarCrop();">&times;</button>

                    <div id="div_fot">
                        <img  class="manita select_imagen" id="fot" src="<?php echo e(asset('/img/pictures.png')); ?>" alt="" style="border: 1px solid #000000">
                    </div>

                    <?php echo e(Form::open(array('id'=>'form_subir_imagen','files'=>true,'class'=>'subir_imagen'))); ?>

                    <?php echo e(Form::token()); ?>


                    <input type="hidden" id="x" name="x" />
                    <input type="hidden" id="y" name="y" />
                    <input type="hidden" id="w" name="w" />
                    <input type="hidden" id="h" name="h" />

                    <input id="imp_img" type="file" name="imagen" style="display: none" onchange="readURL(this,'#fot')" accept="image/*">

                    <div class="group-a">

                        <a class=" manita" onclick="cerrarCrop()">Cancelar</a>

                        <a class=" manita select_imagen ">Cambiar foto</a>

                        <a class=" manita save_imagen_ajax con_imagen" style="display: none" onclick="guardarImagen(this);" data-link="/imagen/cortar_escudo">Guardar</a>
                    </div>
                    <br>

                    <?php echo e(Form::close()); ?>


                </center>
            </div>

            <?php /*<p>Some text in the modal.</p>*/ ?>
        </div>

        <div class="modal-footer">
            <?php echo isset($footer)?$footer:''; ?>

            <?php /*<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>*/ ?>
        </div>
    </div>

</div>