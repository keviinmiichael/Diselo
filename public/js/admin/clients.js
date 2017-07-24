var Clients = (function (w, $, undefined) {

    function init () {
        dtInit();
        $('#left-panel li[data-nav="clients"]').addClass('active');
    }

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'clients',
            columns: [
                'name',
                'email|limit',
                'street|limit',
                'number',
                'floor',
                'apartment',
                'zip_code',
                'localidad|limit',
                'provincia|limit',
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
    Clients.init();
});
