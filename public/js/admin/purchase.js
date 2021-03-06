var Purchase = (function (w, $, undefined) {

    function init () {
        dtInit();
        $('#left-panel li[data-nav="purchases"]').addClass('active');
    }

    //Data Table
    function dtInit() {
        $('#datatable').DataTable({
             "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth" : true,
            processing: false,
            serverSide: false,
            stateSave: true,
            language: w.dtLanguage
        });
        /*
        window.DT.create('#datatable', {
            resource: 'items',
            columns: [
                'thumb|image:/content/products/thumb/',
                'product|limit',
                'color',
                'price',
                'amount',
                'amount|callback:(function (row) {return row["amount"] * row["price"]})(row)'
            ],
            data: {
                purchase_id: $('#purchase_id').val()
            }
        })*/
    }
    //fin Data Table

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Purchase.init();
});
