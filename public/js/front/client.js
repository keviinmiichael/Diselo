$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var Client = (function (w, $, undefined) {

    function init () {
        modalInit();
        listeners();
        localidadesByProvincia();
    }

    function listeners () {
        $('#comprar').on('click', function () {
            comprar();
        });
        $('input, select').on('focus', function () {
            removeError($(this));
        });
        $('#provincia').on('change', function() {
            localidadesByProvincia();
        });
    }

    function modalInit () {
        $('#comprar').on('click', function () {
            $('#myModal .error').hide();
            $('#myModal .default').show();
            $('#myModal').show();
        });
        $('#myModal .close').on('click', function () {
            $('#myModal').hide();
        });
        $('#myModal').on('click', function (e) {
            if(e.target.className == 'modal') $('#myModal').hide();
        });
    }

    function comprar () {
        $.ajax({
            url: $('#form').attr('action'),
            type: $('#form').attr('method'),
            data: $('#form').serialize(),
            success: function (response) {
                $('#myModal').hide();
                location.href = response.redirect;
            },
            error: function (error) {
                if (error.responseJSON.message) {
                    $('#myModal .error').show();
                    $('#myModal .default').hide();
                    $('#myModal .modal-body .error').html(error.responseJSON.message)
                } else {
                    $('#myModal').hide();
                    for (var a in error.responseJSON) {
                        addError(a, error.responseJSON[a][0]);
                    }
                }
            }
        });
    }

    function addError (name, error) {
        $formGroup = $('[name="'+name+'"]').parents('.form-group');
        $formGroup.addClass('has-error');
        $('.help-block', $formGroup).text(error);
    }

    function removeError($el) {
        $formGroup = $el.parents('.form-group');
        $formGroup.removeClass('has-error');
        $('.help-block', $formGroup).text('');
    }

    function localidadesByProvincia () {
        if (!$('#provincia').val()) {
            $('#localidad').html('<option>Seleccionar</option>');
        } else {
            $('label[for="localidad"] span').show();
            $('#localidad').attr('disabled', true);
            $.ajax({
                url: '/localidades/byProvincia',
                type: 'get',
                data: {'provincia_id': $('#provincia').val()},
                success: function (response) {
                    $('label[for="localidad"] span').hide();
                    $('#localidad').replaceWith(response);
                    $('#localidad option[value="'+$('input[name="localidad_id_hidden"]').val()+'"]').attr('selected', true);
                }
            });
        }
    }

    return {
        init : function () {
            init();
        }
    }

})(window, jQuery, undefined);

$(document).ready(function () {
    Client.init();
});
