<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Nuevo Estadio'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <?php /*Vincular los css*/ ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_estadios','active'); ?>



<?php $__env->startSection('main-content'); ?>
<div class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="col-form">
            <h3>Nuevo Estadio</h3>
            <?php echo e(Form::open(array('url'=>url('estadio')))); ?>

                <?php echo e(Form::token()); ?>

                <div class="form-group">
                    <?php echo e(Form::label('nombre')); ?>

                    <?php echo e(Form::text('nombre',null,array('class'=>'form-control'))); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('alias')); ?>

                    <?php echo e(Form::text('alias',null,array('class'=>'form-control'))); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('capasidad')); ?>

                    <?php echo e(Form::text('capasidad',null,array('class'=>'form-control'))); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('dueños')); ?>

                    <?php echo e(Form::text('dueños',null,array('class'=>'form-control'))); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('arquitectos')); ?>

                    <?php echo e(Form::text('arquitectos',null,array('class'=>'form-control'))); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('inauguracion')); ?>

                    <?php echo e(Form::text('inauguracion',null,array('class'=>'form-control'))); ?>

                </div>

                <?php echo $__env->make('otros.direccion.direccion ', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo e(Form::submit('Guardar',array('class'=>'btn btn-primary center-block'))); ?>


            <?php echo e(Form::close()); ?>


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    @parent

    <script>

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>