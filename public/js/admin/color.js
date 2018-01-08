var Color = (function (w, $, undefined) {

    function init () {
        
        $('#colorpicker').colorpicker()
        $('#left-panel li[data-nav="colors"]').addClass('active');
        listeners();
        switchType();
        getCurrentType();
    }

    function listeners () {
        $('.saveForm').on('click', function () {
            $('#form').submit();
        });
        $('#tipo').on('change', function () {
            switchType();
        });
    }

    function switchType () {
        if ($('#tipo').val() == 1) {
            $('input[name="hex"]').attr('disabled', false);
            $('#file, #image').attr('disabled', true);
        } else {
            $('input[name="hex"]').attr('disabled', true);
            $('#file, #image').attr('disabled', false);
        }
    }

    function getCurrentType () {
        var value = ($('input[name="hex"]').val()) ? 1 : 2;
        $('#tipo option[value="'+value+'"]').attr('selected', true);
        switchType();
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
