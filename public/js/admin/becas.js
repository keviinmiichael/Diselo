$(document).ready(function () {
    dtInit();
    $('#left-panel li[data-nav="becas"]').addClass('active');
});

var dataTable, currentRow = 0,
    responsiveHelper_dt_basic = undefined,
    breakpointDefinition = {
        tablet : 1024,
        phone : 480
    }
;

var formatData = {
    normalizeDate: function (date) {
        return (!date)?'':date.replace(/.*([0-9]{4})-([0-9]{2})-([0-9]{2}).*/, '$3-$2-$1');
    },
    acciones: function (row) {
        return '\
            <a href="beca/'+row.id+'/solicitudes" title="Solicitudes" rel="tooltip" class="btn btn-primary btn-sm"><i class="fa-fw fa fa-file-text"></i></a>\
        ';
    }
}

function dtInit () {
    dataTable = $('#tableBecas').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        processing: false,
        serverSide: true,
        stateSave: false,
        ajax: BASE_URL_BECAS+'admin/php/providers/becas.provider.php',
        language: dtLanguage,
        "preDrawCallback" : function() {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper_dt_basic) {
                responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#tableBecas'), breakpointDefinition);
            }
        },
        "rowCallback" : function(nRow, aData) {
            responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
            $('a[rel="tooltip"]').tooltip();
            responsiveHelper_dt_basic.respond();
        },
        columnDefs: [
            {
                render: function ( data, type, row ) {
                    return formatData.normalizeDate(row.fecha);
                },
                targets: 0
            },
            {
                render: function ( data, type, row ) {
                    return row.value;
                },
                targets: 1
            },
            {
                render: function ( data, type, row ) {
                    return row.solicitantes;
                },
                targets: 2
            },
            {
                render: function ( data, type, row ) {
                    return formatData.acciones(row);
                },
                targets: 3
            },
            { 
                sortable: false,
                targets: [3]
            }
        ],
        order: [[ 0, "desc" ]]
    });
}