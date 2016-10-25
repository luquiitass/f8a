<div class="col-form">
    <h4>Direccion</h4>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-grop">
                <?php echo e(Form::label('pais')); ?>

                <?php echo e(Form::select('pais_id',\App\Pais::listForSelect(),array('seleccionar'),
                array(
                    'class'=>'form-control comboCascade',
                    'data-id_complete'=>'#combo_provincia',
                    'id'=>'combo_pais'))); ?>

            </div>
            <div class="form-grop">
                <?php echo e(Form::label('provincia')); ?>

                <?php echo e(Form::select('provincia_id',array(),null,
                array(
                    'class'=>'form-control comboCascade',
                    'id'=>'combo_provincia',
                    'data-url'=>'/provincia/listForSelect/',
                    'data-id_complete'=>'#combo_localidad'))); ?>

            </div>
            <div class="form-grop">
                <?php echo e(Form::label('localidad')); ?>

                <?php echo e(Form::select('localidad_id',array(),null,
                array(
                    'class'=>'form-control',
                    'id'=>'combo_localidad',
                    'data-url'=>'/localidad/listForSelect/'))); ?>

            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('calle')); ?>

                <?php echo e(form::text('calle',null,array('class'=>'form-control'))); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('altura')); ?>

                <?php echo e(form::text('altura',null,array('class'=>'form-control'))); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('piso')); ?>

                <?php echo e(form::text('piso',null,array('class'=>'form-control'))); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('dpto')); ?>

                <?php echo e(form::text('dpto',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
    </div>
</div>


<?php $__env->startSection('scripts'); ?>
@parent
<script>



    //    function comboCascade() {

    $(document).on('change','.comboCascade',function (data) {
        var id_complete = $(this).data('id_complete');
        switch ($(this).attr('id')){
            case 'combo_pais':
                $('#combo_provincia').html('<option>Sin Opciones</option>');
                $('#combo_localidad').html('<option>Sin Opciones</option>');
                break;
            case 'combo_provincia':
                $('#combo_localidad').html('<option>Sin Opciones</option>');
                break;
        }
        $(this).find("option:selected" ).each(function(key,data) {
            var  url = $(id_complete).data('url');
            url = url+$(this).val();

            $.getJSON(url,function (response) {
                $(id_complete).html("");
                var retorno=[];
                $.each(response,function (key,value) {
                    var selec= "";
                    if (key == 'seleccionar'){
                        selec= 'selected="selected"';
                    }
                    retorno.push({'pais':value,'html':'<option '+selec+'  value="'+key+'">'+value+'</option>'});
                    //$(id_complete).append('<option '+selec+'  value="'+key+'">'+value+'</option>')
                    //alert('key: '+key+' value: '+value);
                })
                $.each(sortResults(retorno,'pais',true),function (key,value) {

                    $(id_complete).append(value.html)
                })
            });
        });


    });


//       });
 //   }

//    comboCascade();
</script>
<?php $__env->stopSection(); ?>