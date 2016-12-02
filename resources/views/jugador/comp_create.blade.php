@if(!isset($equipo))
    <div class="alert alert-danger">Falta pasar el equipo</div>
@else
    <div>
        <div>

            {{Form::open(array('id'=>'form_create_jugador'))}}

            <div class="resaltar">
                <h4>Asignar usuario</h4>
                <div class="alert alert-info">
                    <p>Si asigna este jugador a un unsuario,los datos del mismo se autocompetaran y podran ser modificados por el mismo mas tarde</p>
                </div>

                <div class="input-group">
                    <input type="text" class="form-control autocomplete"  name="country" id="" placeholder="Nombre, Apellido o Email"data-link="/usersSelect" data-form="#form_create_jugador"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div><!-- /input-group -->
            </div>

                {{Form::hidden('equipo_id',$equipo->id)}}

                {{Form::hidden('user_id',null)}}

                <div class="row-fluid">

                    <div class="col-xs-12 centered">
                        <a id="" class="btn btn-warning con_usuario" onclick="conUsuario('#form_create_jugador');">con usuario</a>
                        <a id="" class="btn btn-warning sin_usuario" onclick="sinUsuario('#form_create_jugador')">sin usuario</a>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            {{Form::label('nombre')}}
                            {{Form::text('nombre',null,array('class'=>'form-control'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('apellido')}}
                            {{Form::text('apellido',null,array('class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('alias')}}
                            {{Form::text('alias',null,array('class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('altura')}}
                            {{Form::text('altura',null,array('class'=>'form-control'))}}
                        </div>
                    </div>


                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            {{Form::label('peso')}}
                            {{Form::text('peso',null,array('class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('Fecha nacimiento')}}
                            {{Form::text('fecha_nacimiento',null,array('class'=>'form-control datepicker'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('posicion')}}
                            {{Form::select('posicion_id',App\Posicion::forSelect(),App\Posicion::forSelect()['seleccionar'],array('class'=>'form-control'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('numero')}}
                            {{Form::select('numero',$equipo->getNumerosDisponibles(),null,array('class'=>'form-control'))}}
                        </div>
                    </div>
                </div>


                <div class="centered">
                    <a id="btn-guardar" class="btn btn-primary save_ajax" data-link="/jugador/{{$equipo->id}}">Guardar</a>
                </div>

            {{Form::close()}}
        </div>
    </div>

    @section('scripts')
        @parent

        <script>

            $(document).on('focus click','.autocomplete',function () {
                var url = $(this).data('link');
                var form = $(this).data('form');

                $(this).autocomplete({
                    serviceUrl: url,
                    onSelect: function (suggestion) {
                        completarForm(form, suggestion);
                        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
                    }
                });
            });

            conUsuario('#form_create_jugador');

            function conUsuario(form) {
                if ($(form).find('.con_usuario').length > 0){
                    $(form).find('.sin_usuario').show();
                    $(form).find('.con_usuario').hide();
                    limpiarForm(form);
                }

                $(form).find('.autocomplete').prop('disabled', false);

                $(form).find('input[name=nombre]').prop('disabled', true);
                $(form).find('input[name=apellido]').prop('disabled', true);
                $(form).find('input[name=fecha_nacimiento]').prop('disabled', true);
                $(form).find('input[name=alias]').prop('disabled', true);
                $(form).find('input[name=peso]').prop('disabled', true);
                $(form).find('input[name=altura]').prop('disabled', true);
            }

            function sinUsuario(form) {
                if ($(form).find('.con_usuario').length > 0){
                    $(form).find('.con_usuario').show();
                    $(form).find('.sin_usuario').hide();
                    limpiarForm(form);
                }
                $(form).find('.autocomplete').prop('disabled', true);

                $(form).find('input[name=user_id]').prop('value','');
                $(form).find('input[name=nombre]').prop('disabled', false);
                $(form).find('input[name=apellido]').prop('disabled', false);
                $(form).find('input[name=fecha_nacimiento]').prop('disabled', false);
                $(form).find('input[name=alias]').prop('disabled', false);
                $(form).find('input[name=peso]').prop('disabled', false);
                $(form).find('input[name=altura]').prop('disabled', false);
            }

            function completarForm(form,data) {
                $(form).find('input[name=user_id]').prop('value', data.data);
                $(form).find('input[name=nombre]').prop('value', data.value);
                $(form).find('input[name=apellido]').prop('value', data.apellido);
                $(form).find('input[name=fecha_nacimiento]').prop('value', data.fecha_nacimiento);

                $(form).find('input[name=alias]').prop('value', 'a completar');
                $(form).find('input[name=peso]').prop('value', 'a completar');
                $(form).find('input[name=altura]').prop('value', 'a completar');
            }

        </script>
        {{--<script>--}}

            {{--$('#autocomplete').autocomplete({--}}
                {{--serviceUrl: '/usersSelect',--}}
                {{--onSelect: function (suggestion) {--}}
                    {{--completarForm(suggestion);--}}
                    {{--//alert('You selected: ' + suggestion.value + ', ' + suggestion.data);--}}
                {{--}--}}
            {{--});--}}
            {{--conUsuario();--}}

            {{--function conUsuario() {--}}
                {{--$('#con_usuario').hide();--}}

                {{--limpiarForm('#form_jugador');--}}

                {{--$('#sin_usuario').show();--}}
                {{--$('#autocomplete').prop('disabled', false);--}}
                {{--$('#form_jugador').find('input[name=nombre]').prop('disabled', true);--}}
                {{--$('#form_jugador').find('input[name=apellido]').prop('disabled', true);--}}

                {{--$('#form_jugador').find('input[name=fecha_nacimiento]').prop('disabled', true);--}}
                {{--$('#form_jugador').find('input[name=alias]').prop('disabled', true);--}}
                {{--$('#form_jugador').find('input[name=peso]').prop('disabled', true);--}}
                {{--$('#form_jugador').find('input[name=altura]').prop('disabled', true);--}}
            {{--}--}}

            {{--function sinUsuario() {--}}
                {{--$('#con_usuario').show();--}}
                {{--$('#sin_usuario').hide();--}}
                {{--$('#form_jugador input[name=user_id]').prop('value','');--}}

                {{--$('#autocomplete').prop('disabled', true);--}}
                {{--$('#form_jugador input[name=nombre]').prop('disabled', false);--}}
                {{--$('#form_jugador input[name=apellido]').prop('disabled', false);--}}
                {{--$('#form_jugador input[name=fecha_nacimiento]').prop('disabled', false);--}}

                {{--$('#form_jugador input[name=alias]').prop('disabled', false);--}}
                {{--$('#form_jugador input[name=peso]').prop('disabled', false);--}}
                {{--$('#form_jugador input[name=altura]').prop('disabled', false);--}}

                {{--limpiarForm('#form_jugador');--}}
            {{--}--}}

            {{--function completarForm(data) {--}}
                {{--$('#form_jugador input[name=user_id]').prop('value', data.data);--}}
                {{--$('#form_jugador input[name=nombre]').prop('value', data.value);--}}
                {{--$('#form_jugador input[name=apellido]').prop('value', data.apellido);--}}
                {{--$('#form_jugador input[name=fecha_nacimiento]').prop('value', data.fecha_nacimiento);--}}

                {{--$('#form_jugador input[name=alias]').prop('value', 'a completar');--}}
                {{--$('#form_jugador input[name=peso]').prop('value', 'a completar');--}}
                {{--$('#form_jugador :input[name=altura]').prop('value', 'a completar');--}}
            {{--}--}}

        {{--</script>--}}


    @endsection

@endif