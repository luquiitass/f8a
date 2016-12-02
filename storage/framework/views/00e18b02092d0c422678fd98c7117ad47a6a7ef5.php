<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo e(asset('/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->apellido); ?> <?php echo e(Auth::user()->nombre); ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('adminlte_lang::message.online')); ?></a>
                </div>
            </div>
        <?php endif; ?>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.search')); ?>..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><?php echo e(trans('adminlte_lang::message.header')); ?></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php echo $__env->yieldContent('menu_inicio',''); ?>">
                <a href="<?php echo e(url('home')); ?>">
                    <i class='fa fa-link'></i>
                    <span><?php echo e(trans('adminlte_lang::message.home')); ?></span>
                </a>
            </li>
            <?php /*}}<li><a href="#"><i class='fa fa-link'></i> <span><?php echo e(trans('adminlte_lang::message.anotherlink')); ?></span></a></li>*/ ?>

            <li class="<?php echo $__env->yieldContent('menu_competencias',''); ?>">
                <a href="<?php echo e(route('competencia.index')); ?>">
                    <i class='fa fa-link'></i>
                    <span><?php echo e(trans('string.link_competencias')); ?></span>
                </a>
            </li>

            <?php /*Menu de Competenci */ ?>
            <?php /*<li class="treeview <?php echo $__env->yieldContent('menu_competencias',''); ?>">*/ ?>
                <?php /*<a href="#">*/ ?>
                    <?php /*<i class='fa fa-link'></i>*/ ?>
                    <?php /*<span><?php echo e(trans('string.link_competencias')); ?></span>*/ ?>
                    <?php /*<i class="fa fa-angle-left pull-right"></i>*/ ?>
                <?php /*</a>*/ ?>
                <?php /*<ul class="treeview-menu">*/ ?>
                    <?php /*<?php if (Auth::check() && Auth::user()->is('admin')): ?>*/ ?>
                    <?php /*<li class="<?php echo $__env->yieldContent('menu2_nuevaCompetencia',''); ?>"><a href="<?php echo e(route('competencia.create')); ?>"><?php echo e(trans('string.link_nueva_competencia')); ?></a></li>*/ ?>
                    <?php /*<li class="<?php echo $__env->yieldContent('menu2_admCompetencia',''); ?>"><a href="<?php echo e(route('competencia.index')); ?>"><?php echo e(trans('string.link_adm_competencia')); ?></a></li>*/ ?>
                    <?php /*<?php foreach( App\Competencia::get() as $competencia): ?>*/ ?>
                        <?php /*<li class="<?php echo $__env->yieldContent('menu2_'.$competencia->nombre,''); ?>"><a href="<?php echo e(url('competencia/'.$competencia->id)); ?>">Comp. <?php echo e($competencia->nombre); ?></a></li>*/ ?>
                    <?php /*<?php endforeach; ?>*/ ?>
                    <?php /*<?php endif; ?>*/ ?>
                <?php /*</ul>*/ ?>
            <?php /*</li>*/ ?><?php /*Fin de menu de parametros*/ ?>
            <?php /*Menu de Parametros */ ?>
            <li class="treeview <?php echo $__env->yieldContent('menu_parametros',''); ?>">
                <a href="#">
                    <i class='fa fa-link'></i>
                    <span><?php echo e(trans('string.link_parametros')); ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?php /*<?php if (Auth::check() && Auth::user()->is('abm.pais|admin')): ?>*/ ?>
                    <li class="<?php echo $__env->yieldContent('menu2_pasies',''); ?>"><a href="<?php echo e(route('pais')); ?>"><?php echo e(trans('string.link_pais,provincia,localidad')); ?></a></li>
                    <?php /*<?php endif; ?>*/ ?>
                    <li class="<?php echo $__env->yieldContent('menu2_seguridad',''); ?>"><a href="<?php echo e(route('segutidad.index')); ?>"><?php echo e(trans('string.link_seguridad')); ?></a></li>
                </ul>
            </li><?php /*Fin de menu de parametros*/ ?>

            <li class="<?php echo $__env->yieldContent('menu_equipos',''); ?>">
                <a href="<?php echo e(route('equipo.index')); ?>">
                    <i class='fa fa-link'></i>
                    <span><?php echo e(trans('string.link_adm_equipos')); ?></span>
                </a>
            </li>

            <?php /*<li class="treeview <?php echo $__env->yieldContent('menu_equipos',''); ?>">*/ ?>
                <?php /*<a href="#">*/ ?>
                    <?php /*<i class='fa fa-link'></i>*/ ?>
                    <?php /*<span>Equipos</span>*/ ?>
                    <?php /*<i class="fa fa-angle-left pull-right"></i>*/ ?>
                <?php /*</a>*/ ?>
                <?php /*<ul class="treeview-menu">*/ ?>
                    <?php /*<li class="<?php echo $__env->yieldContent('menu2_equipos',''); ?>">*/ ?>
                        <?php /*<a href="<?php echo e(route('equipo.index')); ?>"><?php echo e(trans('string.link_adm_equipo_administrar')); ?></a>*/ ?>
                    <?php /*</li>*/ ?>
                    <?php /*<li class="<?php echo $__env->yieldContent('menu2_nuevoEquipo',''); ?>">*/ ?>
                        <?php /*<a href="<?php echo e(route('equipo.create')); ?>"><?php echo e(trans('string.link_adm_equipo_nuevo')); ?></a>*/ ?>
                    <?php /*</li>*/ ?>
                <?php /*</ul>*/ ?>
            <?php /*</li>*/ ?>

            <li class="treeview <?php echo $__env->yieldContent('menu_estadios',''); ?>">
                <a href="#">
                    <i class='fa fa-link'></i>
                    <span>Estadios</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo $__env->yieldContent('menu2_administrarEstadios',''); ?>">
                        <a href="<?php echo e(route('estadio.index')); ?>"><?php echo e(trans('string.link_adm_estadio_administrar')); ?></a>
                    </li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
