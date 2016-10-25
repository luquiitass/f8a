<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Estadios'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <?php /*Vincular los css*/ ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_estadios','active'); ?>

<?php $__env->startSection('menu2_administrarEstadios','active'); ?>

<?php $__env->startSection('main-content'); ?>

   <h3>Estadioa</h3>
   <a href="<?php echo e(url('estadio/create')); ?>" class="btn btn-primary">NuevoEstadio</a>
    
    <table class="table table-bordered table-striped">
        <thead>
            <th>Nombre</th>
            <th>Alias</th>
            <th>Equipo/s</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php $__empty_1 = true; foreach($estadios as $estadio): $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($estadio->nombre); ?></td>
                    <td><?php echo e($estadio->alias); ?></td>
                    <td><?php echo e($estadio->equipos->implode('nombre',', ')); ?></td>
                    <td>
                        <a href="<?php echo e(route('estadio.show',array('estadio'=>$estadio->id))); ?>" class="btn btn-info">Ver</a>
                        <a href="<?php echo e(route('estadio.edit',array('estadio'=>$estadio->id))); ?>" class="btn btn-success">Editer</a>
                        <a data-link="/estadio/<?php echo e($estadio->id); ?>/deleteMsg" class="delete btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; if ($__empty_1): ?>
                <tr>
                    <td colspan="4"> Sin Estadios</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    @parent

    <script>

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>