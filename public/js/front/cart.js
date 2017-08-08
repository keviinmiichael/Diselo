$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

console.log($('meta[name="csrf-token"]').attr('content'))

var Cart = (function (w, $, undefined) {

    function init () {
        //stepperInit();
        listeners();
        agregarProducto();
        removerProducto();
    }

    function listeners () {
        $('input[name="cantidad[]"]').on('change', function () {
            actualizarTotal();
        });
        $('a[href="hacer-pedido"]').on('click', function (e) {
            e.preventDefault();
            hacerPedido();
        })
    }

    function stepperInit () {
        $("input[type='number']").stepper().on('keypress', function (e) {
            e.preventDefault();
            return false;
        }).on('change', function () {
            var $this = $(this);
            $.ajax({
                url: '/carrito/refrescar',
                type: 'post',
                data: {producto_id: $this.data('id'), cantidad: $this.val()}
            });
        });
    }

    function agregarProducto () {
        var totalItems;
        $('.cart-button .btn').on('click', function (e) {
            e.preventDefault();
            var $this = $(this);
            $this.find('i').attr('class', 'fa fa-spin fa-spinner');
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
        });
    }

    function removerProducto () {
        var totalItems;
        $('#datatable').on('click', 'a[href="remover-producto"]',function (e) {
            e.preventDefault();
            var $this = $(this);
            $this.find('i').toggleClass('fa-spin fa-spinner');
            $.ajax({
                url: '/carrito/remover',
                type: 'post',
                data: {producto_id: $this.data('id')},
                success: function (response) {
                    $this.replaceWith('<a href="agregar-producto" data-id="'+$this.data('id')+'" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i></a>');
                    //$("#nav-pedido").effect("shake", {distance: 5, times: 2});
                    totalItems = $("#nav-pedido .badge").text()*1;
                    totalItems = --totalItems || '';
                    $("#nav-pedido .badge").text(totalItems);
                }
            });
        });
    }

    function actualizarTotal () {
        var precio, cantidad, total, totalFinal = 0;
        $('#datatable tbody tr').each(function () {
            precio = $(this).find('.precio').text().replace(/[^0-9]+/g, '');
            cantidad = $(this).find('.cantidad').val();
            totalFinal += parseInt(precio * cantidad);
            total = parseInt(precio * cantidad).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $(this).find('.total').text('$ ' + total);
        });
        totalFinal = totalFinal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        $('#datatable .total-final strong').text('$ ' + totalFinal)
    }

    function hacerPedido () {
        $('a[href="hacer-pedido"]').attr('disabled', true);
        $('a[href="hacer-pedido"] span.fa').show();
        $('a[href="hacer-pedido"] span.text').text('Espere...');
        if (!$('a[href="hacer-pedido"]').is(':disabled')) {
            var data = [], producto_id, cantidad;
            $('#datatable tbody tr').each(function () {
                producto_id = $(this).find('.cantidad').data('id');
                cantidad = $(this).find('.cantidad').val();
                data.push('producto_id[]='+producto_id+'&cantidad[]='+cantidad);
            });
            $.ajax({
                url: '/carrito/comprar',
                type: 'post',
                data: data.join('&'),
                success: function () {
                    location.href = '/clientes/pedido/exito'
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
    Cart.init();
	// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
});
