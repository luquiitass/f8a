<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Inicio'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <?php /*Vincular los css*/ ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_competencias','active'); ?>

<?php $__env->startSection('menu2_'.$competencia->nombre,'active'); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h3>comp. <?php echo e($competencia->nombre); ?></h3>
            <div class="row">
                <div class="col-xs-12">
                    <div class="well bg-success">
                        <p ><?php echo e($competencia->descripcion); ?></p>
                    </div>
                </div>
                <div class="col-xs-12">
                    <h4>Administrado</h4>
                    <ul>
                        <?php foreach($competencia->users as $user): ?>
                            <li><?php echo e($user->name); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>


        </div>
        <div class="col-xs-12 col-md-6">
            <h3>Torneos</h3>
            <a class="btn btn-primary btn-block" href="/torneo/create">Crer Torneo</a>
        </div>

    </div>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    @parent

    <script>

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>