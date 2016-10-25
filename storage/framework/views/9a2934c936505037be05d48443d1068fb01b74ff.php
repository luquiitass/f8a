<li class="list-group-item pais<?php echo e(isset($paisActivo) && $paisActivo==$pais->id?' active':''); ?>" id="li_pais_id_<?php echo e($pais->id); ?>">
    <?php /*$pais->nombre*/ ?>
    <div class="form-line">
        <label class="text-left" ><?php echo e($pais->nombre); ?></label>

        <button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger pull-right btn-xs" data-link="/pais/<?php echo e($pais->id); ?>/deleteMsg">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        <button data-toggle="modal" data-target="#myModal" class="edit btn btn-info pull-right btn-xs" data-link="/pais/<?php echo e($pais->id); ?>/edit">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
        <button onclick="mostrarProvincia();" class="btn-tab btn btn-success pull-right btn-xs" href="#p_<?php echo e($pais->id); ?>" data-pais="<?php echo e($pais->id); ?>" data-toggle="tab">
            <strong><?php echo e($pais->provincias->count()); ?></strong>
            Provincias
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
    </div>

</li>