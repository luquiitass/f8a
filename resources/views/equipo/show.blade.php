@extends('layouts.app'){{--Extiende del blade app--}}

@section('titulo','Inicio')

@section('htmlheader')
    @parent
    {{--Vincular los css--}}
    <style>

/*  *******************Css de Foto de Portada*********************/
        body {
            color: #797979;
            background: #f1f2f7;
            font-family: 'Open Sans', sans-serif;
            padding: 0px !important;
            margin: 0px !important;
            font-size: 13px;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            margin-top:20px;
        }

        a.btn{
            text-decoration: none;
        }

        .panel-body {
            background: #E6E7E7;
        }

        .cover-photo {
            position: relative;
        }

        a:hover{
            text-decoration:none;
        }

        .fb-timeline-img img {
            width: 100%;
            max-height: 400px;
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
        }

        .profile-thumb img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            margin-top: -90px;
            border: 3px solid #fff;
        }

        .nombre-equipo{
            color: #000;
        }


        .profile-info .panel-footer ul li a {
            color: #7a7a7a;
        }

        .profile-thumb {
            float: left;
            position: relative;
        }

        .p-text-area, .p-text-area:focus {
            border: none;
            font-weight: 300;
            box-shadow: none;
            color: #c3c3c3;
            font-size: 16px;
        }


        .fb-user-mail {
            margin: 10px 0 0 20px;
            display: inline-block;
        }


        .fb-name  {
            bottom: 5px;
            left: 175px;
            position: absolute;
        }

        .fb-name h2 a {
            color: #FFFFFF;
            text-rendering: optimizelegibility;
            text-shadow: 0 0 3px rgba(0, 0, 0, 0.8);
            font-size: 25px;
            border-radius: 20px;
            background: radial-gradient(ellipse at center, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 0%, rgba(0,0,0,0.65) 36%, rgba(0,0,0,0.51) 51%, rgba(0,0,0,0.25) 78%, rgba(0,0,0,0.25) 97%);
            padding-left: 10px;
            padding-right: 10px;
        }

        .fb-user-thumb {
            float: left;
            width: 70px;
            margin-right:15px;
        }

        .fb-user-thumb img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
        }


        .fb-user-details h3 {
            margin: 15px 0 0;
            font-size: 18px;
            font-weight: 300;
        }

        .fb-user-details p {
            color: #c3c3c3;
        }


        .fb-user-status {
            padding: 10px 0;
            line-height: 20px;
        }

        .fb-time-action {
            padding: 15px 0;
        }


        .fb-border {
            border-top:1px solid #ebeef5;
        }

        .fb-time-action span, .fb-time-action a {
            margin-right: 5px;
        }

        .fb-time-action a {
            color: #2972a1;
        }

        .fb-time-action a:hover {
            text-decoration: underline;
        }

        .fb-time-action span {
            color: #5a5a5a;
        }

        .fb-status-container, .fb-comments li {
            margin: 0 -15px 0 -15px;
            padding: 0 15px;
        }

        .fb-gray-bg {
            background: #f6f6f6;
        }

        .fb-comments li {
            border-top:1px solid #ebeef5;
            padding: 15px;
        }

        .fb-comments .cmt-thumb  {
            width: 50px;
            float: left;
            margin-right: 15px;
        }

        .fb-comments .cmt-thumb img {
            width: 50px;
        }

        .fb-comments .cmt-details {
            padding-top: 5px;
        }


        .fb-comments .cmt-details a  {
            font-size: 14px;
            font-weight: bold;
        }

        .fb-comments .cmt-details a.like-link {
            font-size: 12px;
            font-weight: normal;
        }

        .cmt-form {
            display: inline-block;
            width: 90%;
        }

        .cmt-form textarea{
            height: 50px;
            line-height: 35px;
        }

        .fb-timeliner h2 {
            background: #828283;
            color: #fff;
            margin-top: 0;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 4px;
            -webkit-border-radius: 4px;
            font-weight: 300;
        }

        .fb-timeliner ul {
            margin-left:15px;
            margin-bottom: 20px;
            list-style-type:none;
        }

        .fb-comments{
            list-style-type:none;
        }

        .fb-timeliner ul li {
            margin-bottom: 3px;
        }

        .fb-timeliner ul li a{
            color: #999797;
            border-left: 4px solid #d3d7dd;
            padding-left:10px;
            padding-top: 3px;
            padding-bottom: 3px;
            display: block;
        }

        .fb-timeliner ul li a:hover{
            color: #999797;
            border-left: 4px solid #b1b1b1;
            padding-left:10px;
        }

        .fb-timeliner ul li.active a{
            color: #7a7a7a;
            border-left: 4px solid #7a7a7a;
            padding-left:10px;
        }

        .recent-highlight {
            background: #FF6C60 !important;
        }
        /*   *************** Fin de Css de Foto dde Portada ********************  */

        /* ******************* otros Css***********************/


        /* *********************finde otros css *******************************/

    </style>
    <style>
        @media (min-width: 400px )
        {
            .profile-thumb img {
                width: 140px;
                height: 140px;
                border-radius: 50%;
                -webkit-border-radius: 50%;
                margin-top: -90px;
                border: 3px solid #fff;
            }

            .fb-name  {
                left: 175px;
            }
        }

        @media (max-width: 400px )
        {
            .profile-thumb img {
                width: 140px;
                height: 140px;
                border-radius: 50%;
                -webkit-border-radius: 50%;
                margin-top: -90px;
                border: 3px solid #fff;
                display: none;
            }

            .fb-name  {
                left: 5px;
            }
        }
    </style>

@endsection

@section('menu_inicio','active')



@section('main-content')

    <div class="container bootstrap snippet">
        <div class="row">
            <div class="panel">
                <div class="cover-photo">
                    <div class="fb-timeline-img">
                        <img src="{{asset('img/port.jpg')}}" alt="Portada">
                    </div>
                    <div class="fb-name">
                        {{--<h2><a href="#">Deyson Bejarano</a></h2>--}}
                    </div>
                </div>

                <div class="panel-body">
                    <div class="profile-thumb">
                        <img class="" src="{{asset('/img/esc.png')}}" alt="Escudo">
                    </div>
                    {{--<a href="#" class="fb-user-mail">dbjarano@bootdey.com</a>--}}
                    <h2 class="nombre-equipo">{{$equipo->nombre}}</h2>
                </div>
            </div>
        </div>
        
        <div class="borde-bottom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#perfil" data-toggle="tab"> <span class="glyphicon glyphicon-triangle-top tab-select-span"></span> Perfil</a></li>
                <li><a href="#resultados" data-toggle="tab">Resultados</a></li>
                <li><a href="#p_fechas" data-toggle="tab">Proximas Fechas</a></li>
                <li><a href="#fotos" data-toggle="tab">Fotos</a></li>
                <li><a href="#config" data-toggle="tab">Configuraciones</a></li>
            </ul>

            <div class="tab-content bg-white resaltar">

                <div class="tab-pane active" id="perfil">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="alert">
                                <h3>Datos de Equippo</h3>
                                @forelse($equipo->mostrarDatos() as $key=>$value)
                                    @if($value)
                                        <p><strong>{{$key}}: </strong>{{$value}}</p>
                                    @endif
                                @empty
                                    <div class="alert alert-danger">Sindatos</div>
                                @endforelse
                            </div>
                        </div>{{--Columna de los datos--}}

                        <div class="col-xs-12 col-md-4">
                            @include('contacto.comp_index',array('contacto'=>$equipo->contacto))
                        </div>{{-- Columna --}}
                    </div>
                </div>{{--Fin tab perfil--}}

                <div class="tab-pane" id="resultados">
                    <h3>Resultados</h3>
                </div>{{--Fin tab resultados--}}

                <div class="tab-pane" id="p_fechas">
                    <h3>Proximas Fechas</h3>
                </div>{{--Fin tab Proximas Fechas--}}

                <div class="tab-pane" id="fotos">
                    <h3>Fotos</h3>
                </div>{{--Fin tab fotos--}}

                <div class="tab-pane" id="config">

                    @include('equipo.tabs.configuraciones',compact('equipo'))
                </div>{{--Fin tab fotos--}}

            </div>
        </div>
            
            
            
    </div>
@endsection



@section('scripts')
    @parent

    <script>
        function show_edit(id) {
            $("#display_"+id).fadeOut();
            $("#edit_"+id).show("slow");

        }

        function show_display(id) {
            $("#edit_"+id).slideUp(300).fadeOut();
            var visible = $("#display_"+id).fadeIn();
            visible.addClass('bg-info').delay(400).queue(function(){
                $(this).removeClass().dequeue();
            });
        }

        $(document).on('click','.addTelefono',function(){
            var boton = '<span class="glyphicon glyphicon-remove borrar"></span>'
            var nuevoTelefono = '<div class="form-group dimissable bg-info resaltar">'+boton+' <label for="Telefono 1">Nuevo Telefono</label> <input class="form-control" name="telefono[]" type="text">';
            $('#form-telefonos').append(nuevoTelefono);
        });

        $(document).on("mousemove",".separador_in_tabs",function () {
           $(this).find("a").show();
        });
        $(document).on("mouseleave",".separador_in_tabs",function () {
            $(this).find("a").hide();
        });



    </script>

@endsection