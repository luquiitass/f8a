<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Seguridad'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <?php /*Vincular los css*/ ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_parametros','active'); ?>

<?php $__env->startSection('menu2_seguridad','active'); ?>


<?php $__env->startSection('main-content'); ?>

    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <div class="well">
                <h3>Nuevo Permiso</h3>
                <hr>
                <?php echo e(Form::open(array('url'=>url('permiso')))); ?>

                <?php echo e(Form::token()); ?>

                <div class="form-group">
                    <?php echo e(Form::label('Nombre')); ?>

                    <?php echo e(Form::text('name',null,array('class'=>'form-control'))); ?>

                    <?php echo $__env->make('mensajes.error_input',['name'=>'name'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

                <div class="form-group">
                    <?php echo e(Form::label('slug')); ?>

                    <?php echo e(Form::text('slug',null,array('class'=>'form-control'))); ?>

                    <?php echo $__env->make('mensajes.error_input',['name'=>'slug'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

                <div class="form-group">
                    <?php echo e(Form::label('model')); ?>

                    <?php echo e(Form::text('model',null,array('class'=>'form-control'))); ?>

                    <?php echo $__env->make('mensajes.error_input',['name'=>'model'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

                <div class="form-group">
                    <?php echo e(Form::label('Descripcion')); ?>

                    <?php echo e(Form::textArea('description',null,array('class'=>'form-control','height'=>'117px'))); ?>

                    <?php echo $__env->make('mensajes.error_input',['name'=>'description'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <?php echo e(Form::submit('Crear',array('class'=>'btn btn-primary'))); ?>

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