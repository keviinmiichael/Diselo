var Subcategory = (function (w, $, undefined) {

    function init () {
		 $('.saveForm').on('click', function () {
			  $('#form').submit();
		 });
    }

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Subcategory.init();
});
