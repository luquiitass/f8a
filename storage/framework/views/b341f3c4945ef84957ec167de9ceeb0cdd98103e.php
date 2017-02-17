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
            <a href="/equipo/create" class="btn btn-primary">Nuevo Equipo</a>
            <hr>

            <a class="edit btn btn-success" data-toggle="modal" data-target="#myModal" data-link="/equipo"> DataTable en Modal</a>

            <?php echo $__env->make('otros.tabla_datatable_model',compact('tabla'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php /*<table class="table table-striped table-bordered">*/ ?>
                <?php /*<thead>*/ ?>
                    <?php /*<th>Nombre</th>*/ ?>
                    <?php /*<th>Administrador</th>*/ ?>
                    <?php /*<th>Operaciones</th>*/ ?>
                <?php /*</thead>*/ ?>
                <?php /*<tbody>*/ ?>
                    <?php /*<?php $__empty_1 = true; foreach($equipos as $equipo): $__empty_1 = false; ?>*/ ?>
                        <?php /*<tr>*/ ?>
                            <?php /*<td><?php echo e($equipo->nombre); ?></td>*/ ?>
                            <?php /*<td><?php echo e($equipo->users->implode('name',', ')); ?></td>*/ ?>
                            <?php /*<td>*/ ?>
                                <?php /*<a class="btn btn-info" href="<?php echo e(route('equipo.show',array('$equipo'=>$equipo->id))); ?>">Ver</a>*/ ?>
                                <?php /*<a class="btn btn-success" href="<?php echo e(route('equipo.edit',array('equipo'=>$equipo->id))); ?>">Editar</a>*/ ?>
                                <?php /*<a class="btn btn-danger delete" data-toggle="modal" data-target="#myModal" data-link="/estadio/<?php echo e($equipo->id); ?>/deleteMsg" href="#">Eliminar</a>*/ ?>
                            <?php /*</td>*/ ?>
                        <?php /*</tr>*/ ?>
                    <?php /*<?php endforeach; if ($__empty_1): ?>*/ ?>
                        <?php /*<tr><td colspan="3" class="bg-danger">Sin Equipos</td></tr>*/ ?>
                    <?php /*<?php endif; ?>*/ ?>
                <?php /*</tbody>*/ ?>
            <?php /*</table>*/ ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    @parent

    <script>
        cargarTablas();
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>