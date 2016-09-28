/*|
 *| jQuery File Ajaxis Plugin for Bootstrap
 *| https://github.com/amranidev/ajaxis
 *|
 *| Copyright 2015, Amrani Houssain
 *| amranidev@gmail.com
 *|
 *| Licensed under the MIT license:
 *| http://www.opensource.org/licenses/MIT
 *|
 */

$(document).on('click', '.delete', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.edit', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.display', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.create', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.destroy', function() {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + $(this).data('link'),
        success: function(response) {
            var conOperaciones = operaciones(response);
            if(! conOperaciones){
                window.location = response;
            }
        }
    })
})
$(document).on('click', '.save', function() {
    POST($('#AjaxisForm').serializeArray(), $(this).data('link'));
})

$(document).on('click','.link',function(){
    var link = $(this).data('link');
    var id = $(this).data('id');
    HTML(link,id);
})

function GET(dataLink) {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + dataLink,
        success: function(response) {
            var conOperaciones = operaciones(response);
            if(! conOperaciones){
                $('.AjaxisModal').html(response);
            }
        }
    })
}

function POST(postData, dataLink) {
    $.ajax({
        async: true,
        type: 'post',
        url: baseURL + dataLink,
        data: postData,
        success: function(response) {
            var conOperaciones = operaciones(response);
            if(! conOperaciones){
                window.location = response;
            }
        },
        error:function(xhr){
            if (xhr.status == 422 ){
                var html='<ul>';
                $.each(xhr.responseJSON,function(index,value){
                    html=html+"<li>"+value+"</li>";
                });
                html=html+"</ul>";
                mensaje(html,'danger',true);
            }
        }
    })
}

function HTML(dataLink,idContent) {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + dataLink,
        success: function (response) {

            $('#' + idContent).html(response)
            //window.location = response;
        }
    });
}

function operaciones(response) {
    var retorno = false;
    if(isJson(response))
    {
        var json = JSON.parse(response);
        retorno = true;
        for (operacion in json) {

            ocultarModal();

            switch (operacion) {
                case 'cargarTabla':
                    cargarTablas();
                    break;
                case 'html':
                    $(json.id_content).html(json.html);
                    break;
                case "html_append":
                    var html = $(json.id_content).html();
                    $(json.id_content).html(html + json.html_append);
                    break;
                case 'fadeOut':
                    $(json.id_content).fadeOut();
                    break;
                case 'html_remplace':
                    var element = $(json.id_content);
                    element.replaceWith(json.html_remplace);
                    break;
                case 'mensaje':
                    mensaje(json.mensaje,json.tipo_mensaje,json.permanente);
                    //mostrar mensaje;
                    break;

            }
        }

    }
    return retorno;
}

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function mensaje(mensaje,tipo,permanente){
    if ($('#myModal').hasClass('in')){
        var elemento_mensaje = $('#mensaje_modal');
    }else{
        var elemento_mensaje = $('#mensaje');
    }

    var clase = 'alert alert-'+tipo+' alert-dismissible';

    var boton = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

    var div = '<div class="'+clase+'">'+ boton + mensaje + '</div>';

    elemento_mensaje.html(div);


    if (permanente == 'true')
    {
        elemento_mensaje.fadeIn(400).delay(3000);
    }else{
        elemento_mensaje.fadeIn(400).delay(3000).fadeOut(400);
    }
}

function ocultarModal()
{
    $('#myModal').modal('hide');
}