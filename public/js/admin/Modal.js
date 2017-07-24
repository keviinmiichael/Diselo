//MODALS
var Modal = {
    delete: {
        init: function () {
            $('#modalBorrar .modal-title .text').html('Borrar');
            $('#modalBorrar .modal-title .jarviswidget-loader').hide();
            $('#modalBorrar .modal-body .content').html('<p>¿Está seguro que desea borrar este item?</p>');
            $('#modalBorrar button.action').attr('data-id', false);
            $('#modalBorrar .modal-footer button').attr('disabled', false);
            $('#modalBorrar .modal-footer button.btn-default').show();
            $('#modalBorrar .modal-dialog').css('width', '');
            return this;
        },
        show: function () {
            $('#modalBorrar').modal('show');
        },
        hide: function () {
            $('#modalBorrar').modal('hide');
        }
    },
    loader: function () {
        $('#modalBorrar .modal-title .jarviswidget-loader').show();
        $('#modalBorrar .modal-body .content').html('Por favor espere...');
        $('#modalBorrar .modal-footer button').attr('disabled', true);
        return this;
    }
}
//FIN MODALS
