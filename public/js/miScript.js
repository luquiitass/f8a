/**
 * Created by lucas on 18/09/16.
 */
$(function(){
    var dataTable;

});


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