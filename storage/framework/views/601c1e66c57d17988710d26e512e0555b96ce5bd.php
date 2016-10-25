<div class="form-group">
<label class="control-label"><?php echo e($label); ?></label>
 <input class="<?php echo e(($type == 'date')?'form-control datepicker':'form-control'); ?>" id = "<?php echo e($name); ?>" type="<?php echo e(($type == 'date')?'text':'text'); ?>" name = "<?php echo e($name); ?>" value = "<?php echo e($value); ?>" placeholder = "<?php echo e($label); ?>">
</div>
