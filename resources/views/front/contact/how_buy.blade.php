@extends('front.app')

@section('title', 'Cómo Comprar')
@section('description', 'Cómo Comprar')

@section('banner')
	<img src="" alt="" class="img-responsive"/>
@endsection

@section('body')
<!-- Main Container Starts -->
<div class="main-container container">
    <div class="main-container container">
        <!-- Main Heading Starts -->

        <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
          <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" >¿QUIEN PUEDE COMPRAR EN DISELO?</a>
                      </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                      <div class="panel-body">
                          Las ventas de DISELO, son solo por mayor a comerciantes o revendedores. Entendemos por revendedores todas aquellas personas que venden indumentaria de forma particular ya sea en un showroom o a través de una página web o red social.
                      </div>
                  </div>
              </div>
              <!-- /.panel -->
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">¿VENDEN POR MENOR ALGUN DIA?</a>
                      </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                          No, en nuestros locales no vendemos por menor ningún día, ni tampoco con recargo.
                      </div>
                  </div>
              </div>
              <!-- /.panel -->
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">¿CUANTAS PRENDAS HAY QUE COMPRAR POR MAYOR?</a>
                      </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                      <div class="panel-body">
                          El mínimo de compras en los locales es de 10 prendas surtidas.
                          <br>
                          El mínimo para pedidos online es de $3000.
                      </div>
                  </div>
              </div>
              <!-- /.panel -->
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">¿TIENEN TALLES?</a>
                      </h4>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse">
                      <div class="panel-body">
                        En DISELO  manejamos en su mayoría talle único, salvo algunos modelos importados que tiene curva de talles. De haber talles, estará detallados. Nuestro talle UNICO equivale a un talle S/M y a un talle 24/26 de pantalón.
                      </div>
                  </div>
              </div>
              <!-- /.panel -->
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">¿CUANTO TIEMPO SE DEMORA EN ARMAR UN PEDIDO?</a>
                      </h4>
                  </div>
                  <div id="collapseFive" class="panel-collapse collapse">
                      <div class="panel-body">
                          Una vez recibido el pedido se tarda entre 24/48 horas hábiles en armar el mismo según la demanda. Cuando el pedido está listo, se notifica al cliente los faltantes de stock (de haber), el total y los datos de la cuenta bancaria para realizar el depósito.
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">¿CUANTO TIEMPO TENGO PARA ABONAR UN PEDIDO?</a>
                      </h4>
                  </div>
                  <div id="collapseSix" class="panel-collapse collapse">
                      <div class="panel-body">
                          Luego de enviarle el monto total y los datos de la cuenta para el pago al cliente, el mismo tiene 7 (siete) días para realizar el pago. Si pasados los 7 días no se abona el pedido, se procede a cancelarlo y desarmarlo.
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">¿HACEN ENVIOS?</a>
                      </h4>
                  </div>
                  <div id="collapseSeven" class="panel-collapse collapse">
                      <div class="panel-body">
                          Si, hacemos envíos a todo el país con el medio de transporte que vos elijas. Trabajamos con todos los expresos y transportes.
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseEigth">¿CUANTO DEMORA EL ENVIO?</a>
                      </h4>
                  </div>
                  <div id="collapseEigth" class="panel-collapse collapse">
                      <div class="panel-body">
                          El tiempo de envio depende del transporte seleccionado y la distancia por recorrer. Por lo general a través de expresos y transportes tarda entre 2 y 5 días aproximadamente.
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">¿SE PUEDE PASAR A RETIRAR EL PEDIDO?</a>
                      </h4>
                  </div>
                  <div id="collapseNine" class="panel-collapse collapse">
                      <div class="panel-body">
                          Si, podés pasar a retirar tu pedido por nuestro local de venta .A su vez, retirando por nuestro local es posible abonar el pedido en efectivo en el momento.
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">¿CUALES SON LOS MEDIOS DE PAGO?</a>
                      </h4>
                  </div>
                  <div id="collapseTen" class="panel-collapse collapse">
                      <div class="panel-body">
                          Podés abonar tu pedido a través de depósito o transferencia bancaria. Trabajamos con el BANCO BBVA FRANCES. Es necesario notificar el pago con su respectivo comprobante al ejecutivo de cuentas para poder poner en marcha el envío del mismo.
                      </div>
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">¿CUAL ES LA POLITICA DE CAMBIO?</a>
                      </h4>
                  </div>
                  <div id="collapseEleven" class="panel-collapse collapse">
                      <div class="panel-body">
                          La mercadería se cambia únicamente por fallas de forma presencial en el local. Si tenés una prenda fallada es necesario notificarla y traerla al local para realizar el cambio.
                      </div>
                  </div>
              </div>
          </div>
          <!-- /.panel-group -->
      </div>
      <!-- /.col-lg-12 -->
  </div>

        <!-- Main Heading Ends -->
    </div>
</div>
<!-- Main Container Ends -->

@endsection
