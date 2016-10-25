/**
 * Created by lucas on 18/09/16.
 */
$(function(){
    var dataTable;

    $(document).on('display','.datepicker',function () {
        $(this).datepicker({
            format: "dd-mm-yyyy",
            language: "es",
            autoclose: true,
        });
    });


    $(document).on('click','.link',function (e) {
        var url = $(this).attr('href');
        f_Get(url);
        e.preventDefault();
        return false;
    })

});

function f_Get(url) {

    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + url,
        success: function(response) {
            var conOperaciones = operacion(response,false);
            if(! conOperaciones){
               alert('No se devuelve un json... fijate que onda');
            }
        }
    })
}

function operacion(response,isJSON) {
    var retorno = false;
    if(isJson(response) || isJSON)
    {
        if (! isJSON){
            var json = JSON.parse(response);
        }else{
            var json = response;
        }

        retorno = true;


        for(obj in json){

            if (typeof json[obj] == 'object')
                operacion(json[obj],true);


            switch (obj) {
                case 'cargarTabla':
                    cargarTablas();
                    ocultarModal();
                    break;
                case 'html':
                    $(json.id_content).html(json.html);
                    ocultarModal();
                    break;
                case "html_append":
                    var html = $(json.id_content).html();
                    $(json.id_content).html(html + json.html_append);
                    ocultarModal();
                    break;
                case 'fadeOut':
                    $(json.id_content).fadeOut();
                    ocultarModal();
                    break;
                case 'html_remplace':
                    var element = $(json.id_content);
                    element.replaceWith(json.html_remplace);
                    ocultarModal();
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


function cargarTablas(){
    var sum=0;
    $('.datatable').each(function(){
        sum=sum+1;
        var table_id =$(this).attr('id');
        var link = $(this).attr('value');
        var columnas= new Array();

        $(this).find('.col_table').each(function(){
            var name = $(this).data('name');
            if (name == 'operaciones') {
                columnas.push({data: 'action'/*, name: 'action',*/, orderable: false, searchable: $(this).data('searchable') || false, orderable:$(this).data('searchable') || false });
            }else{
                var unaColumna={ data: $(this).data('name')/*, name: $(this).text(),*/,searchable: $(this).data('searchable') ||false, orderable:$(this).data('searchable')|| false };
                columnas.push(unaColumna);
            }
        });

        if ( $.fn.DataTable.isDataTable( '#'+table_id ) ) {
            dataTable.destroy();
        };

        dataTable = $('#'+table_id).DataTable({
            //paging: false,
            //searching: false,
            language:{ url: public_path +'plugins/datatables/dt_es.json'},
            responsive: true,
            processing: true,
            serverSide: true,
            ajax:link,
            columns: columnas
            //columnas
        });
    });
}

function cargarSelect() {
    $('.selectAC').each(function () {
        var select_id = $(this).attr('id');
        var link = (this).data('link');

        $("#" + select_id).autocomplete({
            source: link,
            minLength: 2
        });
    });
}

function cargarSelect2() {

    $.each($('.select2'),function () {
        var selects = $(this).data('id_selects') || [];
        var url = $(this).data('url');
        var holder = $(this).data('holder') || "";

        var s2 = $(this).select2({
            // tags: true,
             placeholder: holder,
             minimumInputLength: 2,
             language: "es",
             allowClear: true,
            ajax: {
                url: baseURL + url,
                dataType: 'json',
                data: function (params) {
                    return {
                        term: params.term
                    }
                },
                processResults: function (data, page){
                    return {
                        results: data
                    };
                }
            }
        });
        s2.val(selects).trigger('change');
    });
}

function getProvincia(obj,pais) {
    var objects = [];
    $.each(obj,function (index,val) {
        if (val.nombre == pais){
            objects.push(val.provincias);
            return false;
        }
    });
    return objects;
}


function getObjects(obj, key, val) {
    var objects = [];
    for (var i in obj) {
        if (!obj.hasOwnProperty(i)) continue;
        if (typeof obj[i] == 'object') {
            objects = objects.concat(getObjects(obj[i], key, val));
        } else if (i == key && obj[key] == val) {
            objects.push(obj);
        }
    }
    return objects;
}

function sortResults(json,prop, asc) {
    retorno = json.sort(function(a, b) {
        if (asc) {
            return (a[prop] > b[prop]) ? 1 : ((a[prop] < b[prop]) ? -1 : 0);
        } else {
            return (b[prop] > a[prop]) ? 1 : ((b[prop] < a[prop]) ? -1 : 0);
        }
    });
    return retorno;
}