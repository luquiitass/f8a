<?php /*<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>*/ ?>

<!-- Modal -->
<?php /*<div id="myModal" class="modal fade" role="dialog">*/ ?>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $__env->yieldContent('titulo','SinTitulo'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo $__env->yieldContent('body','sin Body'); ?>
                <?php /*<p>Some text in the modal.</p>*/ ?>
            <?php /*</div>*/ ?>
            <div class="modal-footer">
                <?php echo $__env->yieldContent('footer'); ?>
                <?php /*<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>*/ ?>
            </div>
        </div>

    </div>
<?php /*</div>*/ ?>
