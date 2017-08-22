$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var Cart = (function (w, $, undefined) {

    function init () {
        modalInit();
        stepperInit();
        listeners();
        agregarProducto();
        removerProducto();
        actualizarTotal();
    }

    function listeners () {
        $('.amount').on('change', function () {
            actualizarTotal();
        });
        $('#comprar').on('click', function () {
            comprar();
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
        $('input, select').on('focus', function () {
            removeError($(this));
        });
        $('#provincia').on('change', function() {
            localidadesByProvincia();
        });
    }

    function stepperInit () {
        if ($('.amount').length) {
            $('.amount').stepper().on('keypress', function (e) {
                e.preventDefault();
                return false;
            }).on('change', function () {
                var $this = $(this), $parten = $(this).parents('tr');
                $.ajax({
                    url: '/cart/refresh',
                    type: 'post',
                    data: {
                        product_id: $this.data('product-id'),
                        size_id: $this.data('size-id'),
                        color_id: $this.data('color-id'),
                        amount: $this.val()
                    }
                });
            });
        }
    }

    function agregarProducto () {
        $('.cart-button .btn').on('click', function (e) {
            e.preventDefault();
            var $this = $(this);
            $this.find('i').attr('class', 'fa fa-spin fa-spinner');
            $.ajax({
                url: '/cart/'+$this.data('action'),
                type: 'post',
                data: {product_id: $this.data('id')},
                success: function (response) {
                    $('#cart-total').text(response.totalItems+' item(s)');
                    if ($this.data('action') == 'add') {
                        $this.data('action', 'remove');
                        $this.find('i').attr('class', 'fa fa-trash');
                        $this.find('span').text('Remover');
                    } else {
                        $this.data('action', 'add');
                        $this.find('i').attr('class', 'fa fa-shopping-cart');
                        $this.find('span').text('Agregar al carrito');
                    }
                }
            });
        });
    }

    function removerProducto () {
        $('.shopping-cart-table').on('click', 'a[href="remover-producto"]',function (e) {
            e.preventDefault();
            var $this = $(this);
            $this.find('i').toggleClass('fa-spin fa-spinner');
            $.ajax({
                url: '/cart/remove',
                type: 'post',
                data: {
                    product_id: $this.data('product-id'),
                    size_id: $this.data('size-id'),
                    color_id: $this.data('color-id'),
                },
                success: function (response) {
                    $('#cart-total').text(response.totalItems+' item(s)');
                    $this.parents('tr').remove();
                    if (!$('.shopping-cart-table tbody tr').length) {
                        $('.shopping-cart-table tbody').append('\
                            <tr>\
                                <td colspan="8">\
                                    <p style="text-align: center; margin: 10px">No hay ningún producto seleccionado</p>\
                                </td>\
                            </tr>\
                        ')
                    }
                    actualizarTotal();
                }
            });
        });
    }

    function actualizarTotal () {
        if ($('.shopping-cart-table tbody tr .price').length) {
            var precio, cantidad, total, totalFinal = 0;
            $('.shopping-cart-table tbody tr').each(function () {
                precio = $(this).find('.price').text().replace(/[^0-9]+/g, '');
                cantidad = $(this).find('.amount').val();
                totalFinal += parseInt(precio * cantidad);
                total = parseInt(precio * cantidad).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                $(this).find('.total').text('$ ' + total);
            });
            totalFinal = totalFinal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('.shopping-cart-table .total-final').text('$ ' + totalFinal);
        } else {
            $('.shopping-cart-table .total-final').text('0');
        }
    }

    function comprar () {
        $.ajax({
            url: '/cart/buy',
            type: 'post',
            data: $('#form-cliente').serialize(),
            success: function (response) {
                $('#myModal').hide();
                location.href = '/pedido-exitosa'
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

    function localidadesByProvincia () {
        $('label[for="localidad"] span').show();
        $('#localidad').attr('disabled', true);
        $.ajax({
            url: '/localidades/byProvincia',
            type: 'get',
            data: {'provincia_id': $('#provincia').val()},
            success: function (response) {
                $('label[for="localidad"] span').hide();
                $('#localidad').replaceWith(response);
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

    return {
        init : function () {
            init();
        }
    }

})(window, jQuery, undefined);

$(document).ready(function () {
    Cart.init();
	
});
