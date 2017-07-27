var Subcategories = (function (w, $, undefined) {

    function init () {
        dtInit();
    }

    /*

    var states = {
        2:{label:'warning', value:'Oculto'},
        1:{label:'success', value:'Visible'}
    };

    */

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'categories',
            columns: [
                'name|limit',
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
    Subcategories.init();
});
