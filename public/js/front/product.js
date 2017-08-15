$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var Product = (function (w, $, undefined) {

    var modalRowTpl = $('#modal-row-template').val();

    function init () {
        listener();
        stepperInit();
    }

    function listener () {
        //agregar items
        $('a[href="agregar"]').on('click', function (e) {
            e.preventDefault();
            agregarRow();
        });
        //remover items
        $('#selected-items').on('click', 'a[href="remover"]', function(e) {
            e.preventDefault();
            removerRow($(this));
        });
        //actualizar stock
        $('#selected-items').on('change', 'select[name="size[]"], select[name="color[]"]', function(e) {
            actualizarStock($(this));
        });
        //agregar productos al pedido
        $('#agregar').on('click', function () {
            agregarProducto();
        });
    }

    function stepperInit (parent) {
        parent = parent | 'body';
        if ($('.amount', parent).length) {
            $('.amount', parent).stepper().on('keypress', function (e) {
                e.preventDefault();
                return false;
            });
        }
    }

    function agregarRow () {
        var tpl = modalRowTpl.replace(/\$\{time\}/g, (new Date()).getTime() );
        var $item = $(tpl);
        $('#selected-items').append($item);
        stepperInit($item);
    }

    function removerRow ($this) {
        $this.parents('.row').remove();
    }

    function actualizarStock ($this) {
        var $parent = $this.parents('.row'), html = '', color, data;
        if ($this.attr('name') == 'size[]') {
            $('select[name="color[]"]', $parent).html('<option>Espere...</option>');
            data = {'size_id':$this.val()}
        } else {
            data = {
                'size_id' : $('select[name="size[]"]', $parent).val(),
                'color_id' : $this.val()
            }
        }
        $.ajax({
            type: 'get',
            url : '/productos/1/get-stock',
            data: data,
            success: function (response) {
                //stepper
                $('input[name="amount[]"]', $parent).attr('max', response.availableStock.amount).val(1);
                $('input[name="amount[]"]', $parent).stepper('destroy');
                $('input[name="amount[]"]', $parent).stepper();
                //colors
                if ($this.attr('name') == 'size[]'){
                    for (var i in response.availableColors) {
                        color = response.availableColors[i];
                        html += '<option value="'+color.id+'">'+color.value+'</option>';
                    }
                    $('select[name="color[]"]', $parent).html(html);
                }
            }
        });
    }

    function agregarProducto () {
        $('.btn-cart i').removeClass('fa-shopping-cart').addClass('fa-spin fa-spinner');
        if (!$('.btn-cart').data('waiting')) {
            $('.btn-cart').data('waiting', true);
            $.ajax({
                url: '/cart/add',
                type: 'post',
                data: $('#selected-items').serialize(),
                success: function (response) {
                    $('#cart-total').text(response.totalItems+' item(s)');
                    $('.btn-cart').data('waiting', false).attr('disabled', true).find('i').removeClass('fa-spin fa-spinner').addClass('fa-check');

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
    Product.init();
});
