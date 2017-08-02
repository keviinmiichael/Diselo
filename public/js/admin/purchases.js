var Purchases = (function (w, $, undefined) {

    function init () {
        dtInit();
        $('#left-panel li[data-nav="purchases"]').addClass('active');
    }

    var states = {
        1:{label:'danger', value:'Pendiente'},
        2:{label:'warning', value:'Enviada'},
        3:{label:'success', value:'Recibida'},
    };

    var paid = {
        0:{label:'danger', value:'Impaga'},
        1:{label:'success', value:'Saldada'}
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
                'state_id|stateSwitcher:'+JSON.stringify(states),
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
