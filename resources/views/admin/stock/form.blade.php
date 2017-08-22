@extends('admin.app')

@section('content')
<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">
        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>Home</li><li>Stock</li>
        </ol>
        <!-- end breadcrumb -->
    </div>
    <!-- END RIBBON -->
    
    <!-- MAIN CONTENT -->
    <div id="content">

        <!-- row -->
        <div class="row">
            
            <!-- col -->
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    
                    <!-- PAGE HEADER -->
                    <i class="fa-fw fa fa-dropbox"></i> 
                        Stock 
                    <span>>  
                        Carga
                    </span>
                </h1>
            </div>
            <!-- end col -->
            
        </div>
        <!-- end row -->
        
        <!--
            The ID "widget-grid" will start to initialize all widgets below 
            You do not need to use widgets if you dont want to. Simply remove 
            the <section></section> and you can use wells or panels instead 
            -->
        
        <!-- widget grid -->
        <section id="widget-grid" class="">
        
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
                            <h2>Carga de stock</h2>              
                        </header>
        
                        <!-- widget div-->
                        <div role="content">

                            <!-- widget content -->
                            <div class="widget-body">
                                <form id="formStock" action="/admin/stock" method="post" style="display: inline-block;">
                                        {{ csrf_field() }}
                                    <table id="stock" class="table table-striped table-bordered table-hover smart-form" width="100%" style="margin-bottom: 20px">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Costo</th>
                                                <th>XS</th>
                                                <th>S</th>
                                                <th>M</th>
                                                <th>L</th>
                                                <th>XL</th>
                                                <th>Color</th>
                                                <th>Cantidad</th>
                                                <th><i class="fa fa-times"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="input"><input name="code[]" type="text" value="" /></label>
                                                </td>
                                                <td>
                                                    <label class="input"><input name="name[]" type="text" value="" /></label>
                                                </td>
                                                <td>
                                                    <label class="input"><input name="cost[]" type="text" value="" class="cost" data-type="float" /></label>
                                                </td>
                                                <td>
                                                    <label class="input"><input name="size_id_1[]" type="text" value="" data-type="int" /></label>
                                                </td>
                                                <td>
                                                    <label class="input"><input name="size_id_2[]" type="text" value="" data-type="int" /></label>
                                                </td>
                                                <td>
                                                    <label class="input"><input name="size_id_3[]" type="text" value="" data-type="int" /></label>
                                                </td>
                                                <td>
                                                    <label class="input"><input name="size_id_4[]" type="text" value="" data-type="int" /></label>
                                                </td>
                                                <td>
                                                    <label class="input"><input name="size_id_5[]" type="text" value="" data-type="int" /></label>
                                                </td>
                                                <td>
                                                    <label class="select">
                                                        {!! \App\Color::toSelect() !!}
                                                        <i></i>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="input"><input class="stock" name="amount[]" type="text" value="" data-type="int" /></label>
                                                    <input type="hidden" name="product_id[]" value="" />
                                                </td>
                                                <td><a class="btn btn-danger" style="padding: 5px 10px" onclick="Stock.removeRow(this)"><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <footer style="text-align: right;">
                                    <a id="guardar" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Guardar
                                    </a>
                                    <a class="btn btn-success addItem">
                                        <i class="fa fa-plus"></i> Agregar
                                    </a>
                                </footer>
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

<textarea id="itemTpl" class="hidden">@include('admin.stock._row')</textarea>

@endsection

@section('scripts')
    <script>
        var codesAutocomplete = {!! $codesAutocomplete !!};
        var namesAutocomplete = {!! $namesAutocomplete !!};
    </script>
    <script src="/js/admin/stock.js"></script>
@endsection