<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Competencia'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <?php /*Vincular los css*/ ?>
    <link href="<?php echo e(asset('plugins/datepicker/datepicker3.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_competencias','active'); ?>

<?php $__env->startSection('menu2_nuevaCompetencia','active'); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="col-form">
                <h3>Nueva Competencia</h3>
                <?php echo e(Form::open(array('url'=>url('competencia'),'id'=>'form_comp'))); ?>

                <div class="form-group">
                    <?php echo e(Form::label('nombre')); ?>

                    <?php echo e(Form::text('nombre',null,array('class'=>'form-control'))); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('descripcion')); ?>

                    <?php echo e(Form::textArea('descripcion',null,array('class'=>'form-control'))); ?>

                </div>

                <?php echo $__env->make('otros.selectUser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php /*<div class="form-group">*/ ?>
                    <?php /*<?php echo e(Form::label('administrador/es')); ?>*/ ?>
                    <?php /*<?php echo e(Form::select('administradores',array(),null,array('class'=>'form-control select2','multiple'=>'multiple','data-url'=>'/usersSelect2','data-holder'=>'Bucas usuario'))); ?>*/ ?>
                    <?php /*<br>*/ ?>
                <?php /*</div>*/ ?>

                <div class="form-group">
                    <?php echo e(Form::label('organizador de partido')); ?>

                    <?php echo e(Form::select('org_partidos',array('admin_competencia'=>'administrado por organizador de la competencia','admin_equipo'=>'administrado por equipos'),null,array('class'=>'form-control'))); ?>

                </div>
                <?php echo e(Form::token()); ?>

                <div class="form-group">
                </div>
                <?php echo e(Form::submit('Guadar',array('class'=>'btn btn-primary btn-guardar center-block'))); ?>

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
        cargarSelect2();
    </script>


    <?php echo JsValidator::formRequest('App\Http\Requests\CompetenciaRequestStore', '#form_comp'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>