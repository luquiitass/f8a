<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Equipos'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <?php /*Vincular los css*/ ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_equipos','active'); ?>
<?php $__env->startSection('menu2_equipos','active'); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Equipos</h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Nombre</th>
                    <th>Administrador</th>
                    <th>Operaciones</th>
                </thead>
                <tbody>
                    <?php foreach($equipos as $equipo): ?>
                        <tr>
                            <td><?php echo e($equipo->nombre); ?></td>
                            <td><?php echo e($equipo->users->implode('name',', ')); ?></td>
                            <td>
                                <a href="<?php echo e(route('equipo.show',array('$equipo'=>$equipo->id))); ?>">Ver</a>
                                <a href="<?php echo e(route('equipo.edit',array('equipo'=>$equipo->id))); ?>">Editar</a>
                                <a class="delete" data-toggle="modal" data-target="#myModal" data-link="/estadio/<?php echo e($equipo->id); ?>/deleteMsg" href="#">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
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