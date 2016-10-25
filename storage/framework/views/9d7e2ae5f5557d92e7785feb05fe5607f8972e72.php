<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo e(asset('/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
<?php /*<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>*/ ?>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('/js/app.min.js')); ?>" type="text/javascript"></script>
<!--Base o dominio de la app ej "Larrealucas.com.ar"  -->
<script> var baseURL = "<?php echo e(URL::to('/')); ?>"</script>
<script> var public_path = "<?php echo e(public_path()); ?>"</script>
<?php /*Js De libreria scafolding */ ?>
<script src = "<?php echo e(URL::asset('js/AjaxisBootstrap.js')); ?>"></script>
<script src = "<?php echo e(URL::asset('js/scaffold-interface-js/customA.js')); ?>"></script>

<?php /*mi javascript*/ ?>
<script src="<?php echo e(asset('js/miScript.js')); ?>"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->