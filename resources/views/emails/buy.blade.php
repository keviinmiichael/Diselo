<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <title></title>
    <!-- <style> -->
  </head>
  <body>
    <span class="preheader"></span>
    <table class="body">
      <tr>
        <td class="center" align="center" valign="top">
          <center data-parsed="">
            <style type="text/css" align="center" class="float-center">
              body,
              html,
              .body {
                background: #f3f3f3 !important;
              }
            </style>

            <table align="center" class="container float-center"><tbody><tr><td>

              <table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td></tr></tbody></table>

              <table class="row"><tbody><tr>
                <th class="small-12 large-12 columns first last"><table><tr><th>
                  <h1><img src="{{ url('images/front/logo-diselo.svg')}}" alt="Diselo" class="img-responsive" ></h1>
                  <p>¡Gracias por comprar en Diselo!</p>

                  <table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td></tr></tbody></table>

                  <table class="callout"><tr><th class="callout-inner secondary">
                    <table class="row"><tbody><tr>
                      <th class="small-12 large-6 columns first"><table><tr><th>
                        <p>
                          <strong>Cliente</strong><br>
                          Nro: {{ $purchase->client->id }} <br>
                          Nombre: {{ $purchase->client->name $purchase->client->lastname }} <br>
                          Mail: {{ $purchase->client->email }} <br>
                          Tel: {{ $purchase->client->phone }}
                        </p>
                        <p>
                          <strong>Nro de compra</strong><br>
                          {{ $purchase->id }}
                        </p>
                      </th></tr></table></th>
                      <th class="small-12 large-6 columns last"><table><tr><th>
                        <p>
                          <!--<strong>Metodo de envío</strong><br>
                          metodo de envio<br><br>-->
                          <strong>Dirección de envío</strong><br>
                          {!! $purchase->client->getAddress() !!}
                        </p>
                      </th></tr></table></th>
                    </tr></tbody></table>
                  </th><th class="expander"></th></tr></table>

                  <h4>Detalle de compra</h4>

                  <table>
                    <tr>
                        <th>Producto</th>
                        <th>Color</th>
                        <th>Tamaño</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                    @foreach ($purchase->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->color->value }}</td>
                            <td>{{ $item->size->value }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>{{ $item->price * $item->amount }}</td>
                        </tr>
                    @endforeach
                    <!--<tr><td>Ship's Cannon</td><th>Azul</th><td>2</td><td>$100</td></tr>-->
                    <tr>
                      <td colspan="2"><b>Total:</b></td>
                      <td></td>
                      <td>${{ $purchase->total }}</td>
                    </tr>
                  </table>
                  <hr>
                  <h4>¿Cómo finalizo mi compra?</h4>
                  <p>¡Sólo falta que deposites el monto total de la compra, te comuniques con nosotros y nos encargaremos del resto!
                  <br>
                  Depósito por cuenta corriente:<br> BBVA Francés 40-143-020899/6
                  <br>
                  Transferencia CBU: <br> 01701438-40000002089964
                  </p>
                </th></tr></table></th>
              </tr></tbody></table>
              <table class="row footer text-center"><tbody><tr>
                <th class="small-12 large-3 columns first"><table><tr><th>
                  <img src="/images/front/qr.png" width="60%" alt="">
                </th></tr></table></th>
                <th class="small-12 large-3 columns"><table><tr><th>
                  <p>
                    Tel: (011) 4092-4375<br>
                    Email: diseloindumentaria@gmail.com
                  </p>
                </th></tr></table></th>
                <th class="small-12 large-3 columns last"><table><tr><th>
                  <p>
                    Dr. juan felipe Aranguren 3377<br>
                    Lunes a viernes de 7:30 a 17:30<br>
                    Sabados de 8:30 a 13:00
                  </p>
                </th></tr></table></th>
              </tr></tbody></table>
            </td></tr></tbody></table>

          </center>
        </td>
      </tr>
    </table>
    <!-- prevent Gmail on iOS font size manipulation -->
   <div style="display:none; white-space:nowrap; font:15px courier; line-height:0;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </div>
  </body>
</html>
