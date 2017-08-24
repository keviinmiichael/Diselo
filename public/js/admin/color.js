var Color = (function (w, $, undefined) {

    function init () {
		$('.saveForm').on('click', function () {
		  $('#form').submit();
		});
        $('#left-panel li[data-nav="colors"]').addClass('active');
    }

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Color.init();
});
