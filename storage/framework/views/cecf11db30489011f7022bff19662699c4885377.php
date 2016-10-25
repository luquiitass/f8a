<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo e($title); ?></h4>
        </div>
        <div class="modal-body">
            <div id="mensaje_modal" role="alert"></div>
            <form  id = "AjaxisForm">
                <input type = "hidden" name = "_token" value = "<?php echo e(csrf_token()); ?>">
