<li id="li_localidad_id_<?php echo e($localidad->id); ?>" class="localidad list-group-item <?php echo e(isset($localidadActiva) && $localidadActiva==$localidad->id?' active':''); ?>" >
    <div class="form-line">
        <label class="text-left" ><?php echo e($localidad->nombre); ?></label>

        <button data-toggle="modal" data-target="#myModal"  class="delete btn btn-danger pull-right btn-xs" data-link="/localidad/<?php echo e($localidad->id); ?>/deleteMsg">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
        <button data-toggle="modal" data-target="#myModal" class="edit btn btn-info pull-right btn-xs" data-link="/localidad/<?php echo e($localidad->id); ?>/edit">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
    </div>
</li>