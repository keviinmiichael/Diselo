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
        $('#selected-items').on('change', 'select[name="size"], select[name="color"]', function(e) {
            actualizarStock($(this));
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
        if ($this.attr('name') == 'size') {
            $('select[name="color"]', $parent).html('<option>Espere...</option>');
            data = {'size_id':$this.val()}
        } else {
            data = {
                'size_id' : $('select[name="size"]', $parent).val(),
                'color_id' : $this.val()
            }
        }
        $.ajax({
            type: 'get',
            url : '/productos/1/get-stock',
            data: data,
            success: function (response) {
                //stepper
                $('input[name="quantity"]', $parent).attr('max', response.availableStock.amount).val(1);
                $('input[name="quantity"]', $parent).stepper('destroy');
                $('input[name="quantity"]', $parent).stepper();
                //colors
                if ($this.attr('name') == 'size'){
                    for (var i in response.availableColors) {
                        color = response.availableColors[i];
                        html += '<option value="'+color.id+'">'+color.value+'</option>';
                    }
                    $('select[name="color"]', $parent).html(html);
                }
            }
        });
    }

    function agregarProducto () {
        $('i', $this).show();
        if ( !$('i', $this).is(':visible') ) {
            $.ajax({
                url: '/cart/add',
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
