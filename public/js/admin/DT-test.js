var Pedidos = (function (w, $, undefined) {

    function init () {
        dtInit();
    }

    var states = {
        2:{label:'warning', value:'Oculto'},
        1:{label:'success', value:'Visible'}
    };

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'productos',
            data: {categoria:''},
            columns: [
                'nombre|limit:2',
                'id_estado|stateSwicher:'+JSON.stringify(states),
                'stock',
                'costo',
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
    Pedidos.init();
});