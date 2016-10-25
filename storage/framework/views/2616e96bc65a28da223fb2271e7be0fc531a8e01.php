<li id="li_provincia_id_<?php echo e($provincia->id); ?>" class="list-group-item provincia <?php echo e(isset($provinciaActiva) && $provinciaActiva == $provincia->id?' active':''); ?>">
    <div class="form-line">
        <label class="text-left" ><?php echo e($provincia->nombre); ?></label>

        <button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger pull-right btn-xs" data-link="/provincia/<?php echo e($provincia->id); ?>/deleteMsg">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        <button data-toggle="modal" data-target="#myModal" class="edit btn btn-info pull-right btn-xs" data-link="/provincia/<?php echo e($provincia->id); ?>/edit">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
        <button onclick="mostrarLocalidades();" class="btn btn-success pull-right btn-xs"  data-prov="<?php echo e($provincia->id); ?>" href="#pr_<?php echo e($provincia->id); ?>" data-toggle="tab">
            <strong><?php echo e($provincia->localidades->count()); ?></strong>
            Localidades
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
    </div>
</li>