var Purchase = (function (w, $, undefined) {

    function init () {
        dtInit();
        $('#left-panel li[data-nav="purchases"]').addClass('active');
    }

    //Data Table
    function dtInit() {
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
        });
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
