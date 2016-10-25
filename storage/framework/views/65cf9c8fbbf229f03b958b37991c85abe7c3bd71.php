<div class="row" >
    <div class="<?php echo e(isset($colPais)?'col-xs-12 col-md-6 col-md-offset-3':'hide'); ?>" id="columna-paises">
        <div class="tabs col-form">
            <h3 class="text-center">Paises</h3>
            <hr>
            <div class="nuevo text-center ">
                <?php /*<?php if (Auth::check() && Auth::user()->can('pais.create')): ?>*/ ?>

                <button data-toggle="modal" data-target="#myModal" class = ' create btn btn-primary'  data-link = '/pais/create'>
                    Nuevo Pais
                </button>
                <?php /*<?php endif; ?>*/ ?>
            </div>

            <ul id="ul_paises" class="nav nav-pills nav-stacked">
                <?php $__empty_1 = true; foreach($paises as $pais): $__empty_1 = false; ?>

                    <?php echo $__env->make('pais.unPais',array('pais',$pais), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php endforeach; if ($__empty_1): ?>
                    <li class="alert bg-info"><span>Sin Paises</span></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="<?php echo e(isset($colProvincia)?'col-xs-12 col-md-6 col-md-offset-3':'hide'); ?>" id="columna-provincias" >
        <div class="tab-content col-form" >
        <?php foreach($paises as $pais): ?>
                <div id="p_<?php echo e($pais->id); ?>" class="tab-pane <?php echo e(isset($paisActivo) && $paisActivo == $pais->id?'active':''); ?>" >
                    <h3 class="text-center">Provincias de <b class="underline"><?php echo e($pais->nombre); ?></b></h3>
                    <hr>

                    <div class="nuevo text-center ">
                        <button onclick="mostrarPaises();" class="btn btn-warning">Paises</button>
                        <button data-toggle="modal" data-target="#myModal" class = "create btn btn-primary "  data-link ="/<?php echo e($pais->id); ?>/provincias/create" > Nueva Provincia</button>
                    </div>
                    <ul id="ul_provincias" class="nav nav pills nav-stacked">
                        <?php $__empty_1 = true; foreach($pais->provincias as $provincia): $__empty_1 = false; ?>

                            <?php echo $__env->make('provincia.unaProvincia',array('provincia'=>$provincia), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <?php endforeach; if ($__empty_1): ?>
                            <li class="provincia alert bg-info"><strong><?php echo e($pais->nombre); ?></strong> no posee Provincias</li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="<?php echo e(isset($colLocalidad)?'col-xs-12 col-md-6 col-md-offset-3':'hide'); ?>" id="columna-localidades">
        <div class="tab-content col-form">
        <?php foreach($paises as $pais): ?>
            <?php foreach($pais->provincias as $provincia): ?>
                    <div id="pr_<?php echo e($provincia->id); ?>" class="tab-pane <?php echo e(isset($provinciaActiva) && $provinciaActiva == $provincia->id?'active':''); ?>">

                        <h3 class="text-center">Localidades de <b class="underline"><?php echo e($pais->nombre); ?>, <?php echo e($provincia->nombre); ?></b></h3>
                        <hr>

                        <div class="nuevo text-center ">
                            <button onclick="mostrarProvincia();" class="btn btn-warning">Provincias</button>
                            <button data-toggle="modal" data-target="#myModal" class = "create btn btn-primary "  data-link ="/<?php echo e($provincia->id); ?>/localidad/create" > Nueva Provincia</button>
                        </div>

                        <ul id="ul_localidades" class="nav nav pills nav-stacked">
                        <?php $__empty_1 = true; foreach($provincia->localidades as $localidad): $__empty_1 = false; ?>
                                <?php echo $__env->make('localidad.unaLocalidad',array('localidad'=>$localidad), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <?php endforeach; if ($__empty_1): ?>
                                <li class="localidad alert bg-info"><strong><?php echo e($provincia->nombre); ?></strong> no posee Localidades</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
