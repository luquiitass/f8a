<?php /*Extiende del blade app*/ ?>

<?php $__env->startSection('titulo','Paises'); ?>
<?php $__env->startSection('menu2_pasies','active'); ?>

<?php $__env->startSection('htmlheader'); ?>
    @parent
    <?php /*Vincular los css*/ ?>
    <style>
        button {
            margin:0 auto;
            display:block;
        }
        .nuevo{
            margin: 3%;
            align-items: center;

        }
        .pais{

        }
        .pais > .btn-group{

        }
        
        .provincia{
            padding: 10px !important;
        }
        .localidad{
            padding: 10px !important;
        }

        .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
            z-index: 2;
            color: #262424;
            background-color: #bbf0be;
            border-color: #a0c9ed;
        }
        #ul_paises,#ul_provincias,#ul_localidades {
            height: 400px;
            overflow: auto;
            border: 1px solid #e7dbdb;
            border-radius: 3px;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_parametros','active'); ?>

<?php $__env->startSection('menu2_paises','active'); ?>


<?php $__env->startSection('main-content'); ?>

    <?php /*<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
    <div id="content">

        <?php echo $__env->make('pais.html_pais_provincia_localidad',array('paises',$paises), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php /*<div class="row" style="max-height: 500px; background:#FFF;">
            <div class="col-xs-4">
                <h3>Paises</h3>
                <div class="nuevo text-center ">
                    <button data-toggle="modal" data-target="#myModal" class = ' create btn btn-info blo'  data-link = '/pais/create'>
                        Nuevo Pais
                    </button>
                </div>

                <div class="tabs" style="height: 400px;overflow: auto">
                    <ul id="ul_paises" class="nav nav-pills nav-stacked list-group">
                        <?php $__empty_1 = true; foreach($paises as $pais): $__empty_1 = false; ?>

                            <?php echo $__env->make('pais.unPais',array('pais',$pais), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            */ ?><?php /*<li class="pais">*/ ?><?php /*
                            */ ?><?php /*<?php echo e($pais->nombre); ?>*/ ?><?php /*
                            */ ?><?php /*<div class="btn-group pull-right">*/ ?><?php /*
                            */ ?><?php /*<button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger " data-link="/pais/<?php echo e($pais->id); ?>/deleteMsg">*/ ?><?php /*
                            */ ?><?php /*<i class="fa fa-trash" aria-hidden="true"></i>*/ ?><?php /*
                            */ ?><?php /*</button>*/ ?><?php /*
                            */ ?><?php /*<button data-toggle="modal" data-target="#myModal" class="edit btn btn-info" data-link="/">*/ ?><?php /*
                            */ ?><?php /*<i class="fa fa-pencil" aria-hidden="true"></i>*/ ?><?php /*
                            */ ?><?php /*</button>*/ ?><?php /*
                            */ ?><?php /*<button class="btn btn-success " href="#p_<?php echo e($pais->id); ?>" data-pais="<?php echo e($pais->id); ?>" data-toggle="tab">*/ ?><?php /*
                            */ ?><?php /*Provincias*/ ?><?php /*
                            */ ?><?php /*<i class="fa fa-chevron-right" aria-hidden="true"></i>*/ ?><?php /*
                            */ ?><?php /*</button>*/ ?><?php /*
                            */ ?><?php /*</div>*/ ?><?php /*

                            */ ?><?php /*</li>*/ ?><?php /*
                        <?php endforeach; if ($__empty_1): ?>
                            <li class="alert alert-info"><span>Sin Paises</span></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="col-xs-4" style="max-height: 500px;overflow: auto">
                <h3>Provincias</h3>
                <div class="tab-content">
                    <?php foreach($paises as $pais): ?>
                        <div id="p_<?php echo e($pais->id); ?>" class="tab-pane">
                            <div class="nuevo text-center ">
                                <button data-toggle="modal" data-target="#myModal" class = "create btn btn-info "  data-link ="/<?php echo e($pais->id); ?>/provincias/create" > Nueva Provincia</button>
                            </div>
                            <ul id="ul_provincias" class="nav nav pills nav-stacked">
                                <?php $__empty_1 = true; foreach($pais->provincias as $provincia): $__empty_1 = false; ?>

                                    <?php echo $__env->make('provincia.unaProvincia',array('provincia'=>$provincia), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    */ ?><?php /*<li class="provincia">*/ ?><?php /*
                                    */ ?><?php /*<?php echo e($provincia->nombre); ?>*/ ?><?php /*
                                    */ ?><?php /*<div class="btn-group pull-right">*/ ?><?php /*
                                    */ ?><?php /*<button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger " data-link="/provincia/<?php echo e($provincia->id); ?>/deleteMsg">*/ ?><?php /*
                                    */ ?><?php /*<i class="fa fa-trash" aria-hidden="true"></i>*/ ?><?php /*
                                    */ ?><?php /*</button>*/ ?><?php /*
                                    */ ?><?php /*<button href="#" class="btn btn-info  ">*/ ?><?php /*
                                    */ ?><?php /*<i class="fa fa-pencil" aria-hidden="true"></i>*/ ?><?php /*
                                    */ ?><?php /*</button>*/ ?><?php /*
                                    */ ?><?php /*<button class="btn btn-success"  data-prov="<?php echo e($provincia->id); ?>" href="#pr_<?php echo e($provincia->id); ?>" data-toggle="tab">*/ ?><?php /*
                                    */ ?><?php /*Localidades*/ ?><?php /*
                                    */ ?><?php /*<i class="fa fa-chevron-right" aria-hidden="true"></i>*/ ?><?php /*
                                    */ ?><?php /*</button>*/ ?><?php /*
                                    */ ?><?php /*</div>*/ ?><?php /*
                                    */ ?><?php /*</li>*/ ?><?php /*
                                <?php endforeach; if ($__empty_1): ?>
                                    <li class="alert alert-info"><strong><?php echo e($pais->nombre); ?></strong> no posee Provincias</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-xs-4" style="max-height: 500px;overflow: auto">
                <h3>Localidades</h3>
                <div class="tab-content">
                    <?php foreach($paises as $pais): ?>
                        <?php foreach($pais->provincias as $provincia): ?>
                            <div id="pr_<?php echo e($provincia->id); ?>" class="localidad tab-pane">

                                <div class="nuevo text-center ">
                                    <button data-toggle="modal" data-target="#myModal" class = "create btn btn-info "  data-link ="/<?php echo e($provincia->id); ?>/localidad/create" > Nueva Provincia</button>
                                </div>

                                <ul id="ul_localidades" class="nav nav pills nav-stacked">
                                    <?php $__empty_1 = true; foreach($provincia->localidades as $localidad): $__empty_1 = false; ?>
                                        <?php echo $__env->make('localidad.unaLocalidad',array('localidad'=>$localidad), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        */ ?><?php /*<li class="localidad" >*/ ?><?php /*
                                        */ ?><?php /*<?php echo e($localidad->nombre); ?>*/ ?><?php /*
                                        */ ?><?php /*<div class="btn-group pull-right">*/ ?><?php /*
                                        */ ?><?php /*<button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger " data-link="/localidad/<?php echo e($localidad->id); ?>/deleteMsg">*/ ?><?php /*
                                        */ ?><?php /*<i class="fa fa-trash" aria-hidden="true"></i>*/ ?><?php /*
                                        */ ?><?php /*</button>*/ ?><?php /*
                                        */ ?><?php /*<button href="#" class="btn btn-info  ">*/ ?><?php /*
                                        */ ?><?php /*<i class="fa fa-pencil" aria-hidden="true"></i>*/ ?><?php /*
                                        */ ?><?php /*</button>*/ ?><?php /*
                                        */ ?><?php /*</div>*/ ?><?php /*
                                        */ ?><?php /*</li>*/ ?><?php /*
                                    <?php endforeach; if ($__empty_1): ?>
                                        <li class="alert alert-info"><strong><?php echo e($provincia->nombre); ?></strong> no posee Localidades</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>*/ ?>
    </div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
    @parent

    <script>

        $(document).on('click','.pais',function () {
            $('.localidad').parents('.tab-pane').removeClass('active');
        });

        mostrarPaises();

        function mostrarPaises() {
            $('#columna-paises').removeClass().addClass('col-xs-12 col-md-6 col-md-offset-3');
            $('#columna-provincias').removeClass().addClass('hide');
            $('#columna-localidades').removeClass().addClass('hide');
        }

        function mostrarProvincia() {
            $('#columna-paises').removeClass().addClass('hide');
            $('#columna-provincias').removeClass().addClass('col-xs-12 col-md-6 col-md-offset-3');
            $('#columna-localidades').removeClass().addClass('hide');
        }

        function mostrarLocalidades() {
            $('#columna-paises').removeClass().addClass('hide');
            $('#columna-provincias').removeClass().addClass('hide');
            $('#columna-localidades').removeClass().addClass('col-xs-12 col-md-6 col-md-offset-3');
        }

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>