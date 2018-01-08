@extends('admin.app')

@section('content')
<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">
        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>Home</li>
            <li>Colores</li>
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
                    <i class="fa-fw fa fa-adjust"></i>
                        Colores
                    <span>>
                        {{ $viewConfig['accion'] }}
                    </span>
                </h1>
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

        @include('admin.partials.errors')

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
                            {!! Form::model($color, $formOptions) !!}
                                <fieldset>
                                    <legend>Datos</legend>
                                    <div class="row">
                                        <section class="col col-md-3 col-sm-3 col-xs-12">
                                            <label class="label">Nombre:</label>
                                            <label class="input">
                                                {!! Form::text('value', null, ['autofocus', 'placeholder' => 'Ej.: azul o estampado de flores']) !!}
                                            </label>
                                        </section>
                                        <section class="col col-md-3 col-sm-3 col-xs-12">
                                            <label class="label">Tipo:</label>
                                            <label class="select">
                                                <select name="tipo" id="tipo">
                                                    <option value="1">Color</option>
                                                    <option value="2">Imagen</option>
                                                </select><i></i>
                                            </label>
                                        </section>
                                        <section class="col col-md-3 col-sm-3 col-xs-12">
                                            <label class="label">Color:</label>
                                            <label class="input">
                                                {!! Form::text('hex', null, ['id' => 'colorpicker']) !!}
                                            </label>
                                        </section>
                                        <section class="col col-md-3 col-sm-3 col-xs-12">
                                            <label class="label">Imagen:</label>
                                            <label class="input">
                                                <div class="input input-file">
                                                    <span class="button"><input type="file" id="file" name="file" onchange="this.parentNode.nextSibling.value = this.value" value="">Browse</span><input id="image" type="text" placeholder="{{$color->hex ? 'Imagen' : $color->value}}" readonly="">
                                                </div>
                                            </label>
                                        </section>
                                </fieldset>
                                <input type="hidden" name="id" value="{{$color->id ?? 0}}">
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

@endsection

@section('scripts')
    <script src="/js/admin/plugin/jquery-form/jquery-form.min.js"></script>
    <script src="/js/admin/plugin/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="/js/admin/color.js"></script>
@endsection
