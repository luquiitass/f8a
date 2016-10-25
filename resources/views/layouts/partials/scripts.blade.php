<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
{{--<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>--}}
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<!--Base o dominio de la app ej "Larrealucas.com.ar"  -->
<script> var baseURL = "{{URL::to('/')}}"</script>
<script> var public_path = "{{public_path()}}"</script>
{{--Js De libreria scafolding --}}
<script src = "{{ URL::asset('js/AjaxisBootstrap.js')}}"></script>
<script src = "{{ URL::asset('js/scaffold-interface-js/customA.js')}}"></script>

{{--mi javascript--}}
<script src="{{asset('js/miScript.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->