<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Seguridad'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <?php /*Vincular los css*/ ?>
    <style>
        .li_roles,.li_permission{
            border-bottom: 1px solid antiquewhite;
        }

        li.active.li_rol > a{
            border-top: 1px solid #e3e1e1;
            border-bottom: 1px solid #e3e1e1;
            border-radius: 3px;
            background-color: #dcedf8;
        }
        .roles,.description,.permission{
            max-height: 400px;
            height: auto;
            overflow: auto;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_parametros','active'); ?>

<?php $__env->startSection('menu2_seguridad','active'); ?>

<?php $__env->startSection('main-content'); ?>
    <div id="content">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <h3>Seguridad</h3>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab_roles">Roles</a></li>
                    <li><a data-toggle="tab" href="#tab_permission">Permisos</a></li>
                </ul>

                <div class="tab-content">
                    <div id="tab_roles" class="tab-pane fade in active">
                        <div class="row" style="background: white">
                            <div class="col-xs-12 col-md-6 ">
                                <h4>Roles</h4>
                                <?php echo e(link_to(route('rol.reate'),'Nuevo Rol',array('class'=>'btn btn-primary'))); ?>

                                <hr>
                                <ul id="ul_roles" class="nav nav-pills nav-stacked roles">
                                    <?php $__empty_1 = true; foreach($roles as $rol): $__empty_1 = false; ?>
                                        <li id="li_rol_id_<?php echo e($rol->id); ?>" class="li_roles"><a href="#tab_rol_<?php echo e($rol->id); ?>" data-toggle="tab"><?php echo e($rol->name); ?></a></li>
                                    <?php endforeach; if ($__empty_1): ?>
                                        <li class="alert bg-success"> Sin Roles</li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                            <div class="col-xs-12 col-md-6 ">
                                <h4>Datos del rol</h4>
                                <hr>
                                <div class="tab-content">
                                    <?php foreach($roles as $rol): ?>
                                        <div id="tab_rol_<?php echo e($rol->id); ?>" class="tab-pane fade well description">
                                            <h4><?php echo e($rol->name); ?></h4>

                                            <p><?php echo e($rol->description); ?></p>
                                            <h3>Permisos</h3>
                                            <hr>
                                            <ul class="">
                                                <?php $__empty_1 = true; foreach($rol->permissions as $permiso): $__empty_1 = false; ?>
                                                    <li><?php echo e($permiso->name); ?></li>
                                                <?php endforeach; if ($__empty_1): ?>
                                                    <li>Sin Permisos</li>
                                                <?php endif; ?>
                                            </ul>

                                            <?php echo e(link_to('/rol/'.$rol->id.'/edit','Editar',array('class'=>'btn btn-success btn-block'))); ?>

                                            <button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger btn-block" data-link="/rol/<?php echo e($rol->id); ?>/deleteMsg">
                                                Eliminar <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>


                    <div id="tab_permission" class="tab-pane fade">

                        <div class="row" style="background: white">
                            <div class="col-xs-12 col-md-6 ">
                                <h3>Permisos</h3>
                                <?php echo e(link_to(route('permiso.create'),'Nuevo Permiso',array('class'=>'btn btn-primary'))); ?>

                                <hr>
                                <ul class="nav nav-pills nav-stacked permission">
                                    <?php $__empty_1 = true; foreach($permission as $permiso): $__empty_1 = false; ?>
                                        <li class="li_permission"><a href="#tab_permiso_<?php echo e($permiso->id); ?>" data-toggle="tab"><?php echo e($permiso->name); ?></a></li>
                                    <?php endforeach; if ($__empty_1): ?>
                                        <li class="alert bg-success">Sin permission</li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                            <div class="col-xs-12 col-md-6 ">
                                <div class="tab-content">
                                    <h3>Descrpcion</h3>
                                    <hr>
                                    <?php foreach($permission as $permiso): ?>
                                        <div id="tab_permiso_<?php echo e($permiso->id); ?>" class="tab-pane fade well description">
                                            <p>descripcion: <strong><?php echo e($permiso->description); ?></strong></p>
                                            <p>modelo: <strong><?php echo e($permiso->model); ?></strong></p>
                                            <p>slug: <strong><?php echo e($permiso->slug); ?></strong></p>
                                            <?php echo e(link_to('/permiso/'.$permiso->id.'/edit','Editar',array('class'=>'btn btn-primary btn-block'))); ?>

                                            <button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger btn-block" data-link="/permiso/<?php echo e($permiso->id); ?>/deleteMsg">
                                                Eliminar <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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