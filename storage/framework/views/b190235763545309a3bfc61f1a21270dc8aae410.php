<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Equipo'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <style>
        table{
            background: white!important;
        }
        td{
            border-bottom:1px solid rgba(31, 48, 31, 0.2);
            padding:5px;
        }
    </style>
    <?php /*Vincular los css*/ ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_equipo','active'); ?>


<?php $__env->startSection('main-content'); ?>
    <h3><?php echo e($estadio->nombre); ?> <strong><?php echo e($estadio->alias); ?></strong></h3>
    <h4>Datos</h4>
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <h4>Datos</h4>
            <table class="well">
                <?php foreach($estadio['attributes'] as $key => $value): ?>
                    <tr>
                        <td><?php echo e(ucfirst($key)); ?>:</td>
                        <td style=" padding-left: 7px;" ><?php echo e($value); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-xs-12 col-md-4">
            <h4>Direccion</h4>
            <table class="well">
                <?php foreach($estadio->direccion['attributes'] as $key => $value): ?>
                    <tr>
                        <td><?php echo e(ucfirst($key)); ?>:</td>
                        <td style=" padding-left: 7px;" ><?php echo e($value); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    @parent

    <script>

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>