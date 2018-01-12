@extends('front.app')

@section('title', 'Díselo')
@section('description', 'Registro de usuarios')


@section('body')
<!-- Main Container Starts -->
<div class="main-container container">

    <h2 class="main-heading text-center">Registro</h2>


    <!-- Shipping Section Starts -->
    <section class="registration-area">
        <div class="row">
            <!-- Shipping & Shipment Block Starts -->
            <div class="col-sm-8 col-sm-offset-2">
                <!-- Shipment Information Block Starts -->
                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">Información</h3>
                    </div>
                    <div class="panel-body">
                        @include('front.clients._form', ['btn_txt' => 'Registrase', 'showPass' => true])
                    </div>
                </div>
                <!-- Shipment Information Block Ends -->
            </div>
            <!-- Shipping & Shipment Block Ends -->
        </div>
    </section>
    <!-- Shipping Section Ends -->
</div>
<!-- Main Container Ends -->

<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="default">Estamos procesando tu registración</h2>
            <h2 class="error" style="display: none">Error</h2>
        </div>
        <div class="modal-body">
            <p class="default">Por favor aguardá un momento</p>
            <p class="error" style="display: none"></p>
        </div>
        <div class="modal-footer">
            <span class="close"><a href="javascript:void(0);" class="round-button">OK</a></span>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="/js/front/client.js"></script>
@endsection
