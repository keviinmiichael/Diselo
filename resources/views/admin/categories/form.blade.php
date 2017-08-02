@extends('admin.app')

@section('content')
<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">
        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>Home</li>
            <li>Categorias</li>
            <li>{{ $viewConfig['accion'] }}</li>
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
                        Categorias
                    <span>>
                        {{ $viewConfig['accion'] }}
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
                            <h2>{{ $viewConfig['accion'] }}</h2>
                        </header>

                        <!-- widget content -->
                        <div class="widget-body">
                            {!! Form::model($category, $formOptions) !!}
                                <fieldset>
                                    <legend>Datos</legend>
                                    <div class="row">
                                        <section class="col col-md-12 col-sm-12 col-xs-12">
                                            <label class="label">Nombre:</label>
                                            <label class="input">
                                                {!! Form::text('name', null, ['autofocus']) !!}
                                            </label>
                                        </section>
                                </fieldset>
                            {!! Form::close() !!}

                            <div class="widget-footer smart-form">
                                <div class="btn-group">
                                    <a href="javascript: window.history.back();" class="btn btn-sm btn-default" style="margin-right: 10px">
                                        Cancelar
                                    </a>
                                    <button class="btn btn-sm btn-success saveForm" type="submit">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end widget content -->

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

@include('admin.modals.delete')

@endsection

@section('scripts')
    <script src="/js/admin/plugin/jquery-form/jquery-form.min.js"></script>
    <script src="/js/admin/category.js"></script>
@endsection
