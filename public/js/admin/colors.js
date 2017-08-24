var Colors = (function (w, $, undefined) {

    function init () {
        dtInit();
        boxes();
        $('#left-panel li[data-nav="colors"]').addClass('active');
    }

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'colors',
            columns: [
                'value|limit',
                'id|actions'
            ]
        });
    }
    //fin Data Table

    function boxes () {
        Box.small({title: 'Perfecto', content:'El color se cargó con éxito.'}).success().showIfHash('new');
        Box.small({title: 'Perfecto', content:'El color se editó con éxito.'}).success().showIfHash('edit');
    }
    
    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Colors.init();
});