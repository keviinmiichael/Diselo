@extends('admin.app')

@section('content')
<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">
        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>Home</li>
            <li>{{ $category->name }}</li>
            <li>Subcategorías</li>
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
                    <i class="fa-fw fa fa-list"></i>
                        {{ $category->name }}
                    <span>>
                        Subcategorías
                    </span>
                </h1>
            </div>
            <!-- end col -->

            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8 text-right">
                <a href="/admin/categories/{{$category->id}}/subcategories/create" class="btn btn-success"><span class="fa fa-plus"></span> Agregar</a>
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
                            <h2>Listado de Subcategorías</h2>
                        </header>

                        <!-- widget div-->
                        <div role="content">

                            <!-- widget content -->
                            <div class="widget-body no-padding">
                                <table id="datatable" class="table table-striped table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <input type="hidden" name="category_id" id="category_id" value="{{ $category->id }}">
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
    <script src="/js/admin/subcategories.js"></script>
@endsection
