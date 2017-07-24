var Purchases = (function (w, $, undefined) {

    function init () {
        dtInit();
        listeners();
        $('#left-panel li[data-nav="products"]').addClass('active');
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
                'state',
                'id|actions'
            ]
        });
    }
    //fin Data Table

    //listeners
    function listeners () {
        $('.saveForm').on('click', function () {
            $('#form').submit();
        });
        $('#sliderImagenes').on('click', '.btn-danger', function () {
            borrar($(this));
        });
        $('#tipo-precio').on('change', function() {
            togglePrecio();
        });
        if ($('input[name="profit_margin"]').val()) {
            $('#tipo-precio').val(1);
        } else {
            $('#tipo-precio').val(2);
        }
        $('input[data-type="float"]').on('keypress', function (e) {
            if (e.which == 44) {
                $(this).val($(this).val() + '.');
            }
            if (e.which != 46 && e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });
        togglePrecio();
    }

    //toggle precio
    function togglePrecio() {
        if ($('#tipo-precio').val() == 1) {
            $('input[name="profit_margin"]').attr('disabled', false);
            $('input[name="price"]').attr('disabled', true);
            $('input[name="price"]').val('');
        } else {
            $('input[name="price"]').attr('disabled', false);
            $('input[name="profit_margin"]').attr('disabled', true);
            $('input[name="profit_margin"]').val('');
        }
    }

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Purchases.init();
});
