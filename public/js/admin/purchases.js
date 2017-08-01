var Purchases = (function (w, $, undefined) {

    function init () {
        dtInit();
        $('#left-panel li[data-nav="purchases"]').addClass('active');
    }

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'purchases',
            columns: [
                'total',
                'cost',
                'paid',
                'client',
                'state_id|stateSwitcher',
                'id|actions'
            ]
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
    Purchases.init();
});
