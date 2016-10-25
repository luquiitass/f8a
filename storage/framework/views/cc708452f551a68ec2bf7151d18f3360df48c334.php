<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Inicio'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <?php /*Vincular los css*/ ?>
    <link href="<?php echo e(asset('plugins/datepicker/datepicker3.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_inicio','active'); ?>



<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-form">
                <h3>Nuevo Equipo</h3>

                <?php echo e(Form::open(array('url'=>url('equipo/'.$equipo->id),'id'=>'form_equipo','method'=>'PUT'))); ?>

                <?php echo e(Form::token()); ?>

                <div class="form-group">
                    <?php echo e(Form::label('nombre')); ?>

                    <?php echo e(Form::text('nombre',$equipo->nombre,array('class'=>'form-control'))); ?>

                </div>
                <?php /*<div class="form-group">*/ ?>
                <?php /*<?php echo e(Form::label('apodo')); ?>*/ ?>
                <?php /*<?php echo e(Form::text('apodo',null,array('class'=>'form-control'))); ?>*/ ?>
                <?php /*</div>*/ ?>
                <?php /*<div class="form-group">*/ ?>
                    <?php /*<?php echo e(Form::label('fundado')); ?>*/ ?>
                    <?php /*<?php echo e(Form::text('fundado',$equipo->fundado,array('class'=>'form-control datepicker'))); ?>*/ ?>
                <?php /*</div>*/ ?>
                <?php /*<div class="form-group">*/ ?>
                <?php /*<?php echo e(Form::label('fundadores')); ?>*/ ?>
                <?php /*<?php echo e(Form::text('fundadores',null,array('class'=>'form-control'))); ?>*/ ?>
                <?php /*</div>*/ ?>
                <?php /*<div class="form-group">*/ ?>
                <?php /*<?php echo e(Form::label('descripcion')); ?>*/ ?>
                <?php /*<?php echo e(Form::textArea('descripcion',null,array('class'=>'form-control'))); ?>*/ ?>
                <?php /*</div>*/ ?>
                <?php /*<div class="form-group">*/ ?>
                    <?php /*<?php echo e(Form::label('administrador/es')); ?>*/ ?>
                    <?php /*<?php echo e(Form::select('administradores[]',$users,null,array('class'=>'form-control select2','multiple'=>'multiple','data-id_selects'=>json_encode($us),'data-url'=>'/usersSelect2','data-holder'=>'Bucas usuario'))); ?>*/ ?>
                    <?php /*<br>*/ ?>
                <?php /*</div>*/ ?>

                <?php echo $equipo->html_selectUser(); ?>


                <?php echo e(Form::submit('Crear',array('class'=>'fomr-control btn btn-primary center-block'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    @parent
    <script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>

    <script src="/plugins/select2/select2.min.js"></script>
    <script src="/plugins/select2/i18n/es.js"></script>

    <script type="text/javascript" src="<?php echo e(asset('vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>

    <script>
        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            language: "es",
            autoclose: true,
        });

        cargarSelect2();
    </script>

    <?php echo JsValidator::formRequest('App\Http\Requests\EquipoRequestStore', '#form_equipo'); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>