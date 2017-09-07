@extends('admin.app')

@section('content')
<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">
        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>Home</li><li>Compras</li><li>{{ $purchase->client->name }}</li>
        </ol>
        <!-- end breadcrumb -->
    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">

        <!-- row -->
        <div class="row">

            <!-- col -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <h1 class="page-title txt-color-blueDark">

                    <!-- PAGE HEADER -->
                    <i class="fa-fw fa fa-shopping-cart"></i>
                        Compras
                    <span>>
                        {{ $purchase->client->name }}
                    </span>
                </h1>
            </div>
            <!-- end col -->

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8 text-right">
                <h1 class="page-title txt-color-blueDark">Total: ${{ $purchase->total }}</h1>
            </div>

        </div>
        <!-- end row -->

        <!--
            The ID "widget-grid" will start to initialize all widgets below
            You do not need to use widgets if you dont want to. Simply remove
            the <section></section> and you can use wells or panels instead
            -->

        <!-- widget grid -->
        <section id="widget-grid" class="">

            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-body status">
                            <div class="who clearfix">
                                <h4>Datos del comprador</h4>

                            </div>
                            <div class="who clearfix">
                                <p><strong>Nombre:</strong> {{ $purchase->client->name . ' ' . $purchase->client->lastname }}</p>
                                <p><strong>Razón Social:</strong> {{ $purchase->client->business_name }}</p>
                                <p><strong>Email:</strong> {{ $purchase->client->email }}</p>
                                <p><strong>Teléfono:</strong> {{ $purchase->client->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-body status">
                            <div class="who clearfix">
                                <h4>Datos para el envío</h4>
                            </div>
                            <div class="who clearfix">
                                <p><strong>Dirección:</strong> {{ $purchase->client->street . ' ' . $purchase->client->number }}</p>
                                <p>
                                    <strong>Localidad:</strong> {{ $purchase->client->localidad->value }}
                                    @if ($purchase->client->neighborhood) ({{ $purchase->client->neighborhood}}) @endif
                                    - <strong>Provincia:</strong> {{ $purchase->client->provincia->value }}
                                </p>
                                <p><strong>Código Postal:</strong> {{ $purchase->client->zip_code }}</p>
                                @if ($purchase->client->floor)
                                    <p><strong>Piso:</strong> {{ $purchase->client->floor }}</p>
                                @endif
                                @if ($purchase->client->aparment)
                                    <p><strong>Departamento:</strong> {{ $purchase->client->aparment }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row -->
            <div class="row">


                <!-- NEW WIDGET START -->
                <article class="col-sm-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div
                        class="jarviswidget jarviswidget-color-darken"
                        id=""
                        data-widget-colorbutton="false"
                        data-widget-editbutton="false"
                        data-widget-togglebutton="false"
                        data-widget-deletebutton="false"
                        data-widget-sortable="false"
                    >
                        <header>
                            <h2>Resumen de la compra</h2>
                        </header>

                        <!-- widget div-->
                        <div role="content">

                            <!-- widget content -->
                            <div class="widget-body no-padding">
                                <table id="datatable" class="table table-striped table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Producto</th>
                                            <th>Precio</th>
											<th>Cantidad</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <input id="purchase_id" type="hidden" name="purchase_id" value="{{$purchase->id}}">
                            </div>
                            <!-- /widget content -->

                        </div>
                        <!-- /widget div -->

                    </div>
                    <!-- end widget -->

                </article>
                <!-- WIDGET END -->

            </div>
            <!-- end row -->


        </section>
        <!-- end widget grid -->

    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
@endsection

@section('scripts')
    <script src="/js/admin/purchase.js"></script>
@endsection
