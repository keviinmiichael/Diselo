$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var Contact = (function (w, $, undefined) {

    function init () {
        listeners();
    }

    function listeners () {
        $('#form-contact').on('submit', function (e) {
            e.preventDefault();
            send();
        });
        $('input, textarea').on('focus', function () {
            removeError($(this));
        });
    }

    function send () {
        if (!$('#sender').data('sending')) {
            $('#sender').data('sending', true);
            $('#sender .fa-spin').show();
            $.ajax({
                url: '/contact/send',
                type: 'post',
                data: $('#form-contact').serialize(),
                success: function (response) {
                    document.getElementById('form-contact').reset();
                    Lobibox.notify('success', {
                        sound: false,
                        title: 'Mensaje enviado',
                        msg: 'Muchas gracias por contactarnos.',
                        delayIndicator: false,
                        delay: 2700,
                        position: 'top right'
                    });
                    $('#sender').data('sending', false);
                    $('#sender .fa-spin').hide();
                },
                error: function (error) {
                    for (var a in error.responseJSON) {
                        addError(a, error.responseJSON[a][0]);
                    }
                    $('#sender').data('sending', false);
                    $('#sender .fa-spin').hide();
                }
            });
        }
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

    return {
        init : function () {
            init();
        }
    }

})(window, jQuery, undefined);

$(document).ready(function () {
    Contact.init();
	
});
