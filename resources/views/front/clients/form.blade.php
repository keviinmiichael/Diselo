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
                        @include('front.clients._form', ['btn_txt' => 'Registrase'])
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
@endsection

@section('scripts')
    <script src="/js/front/cart.js"></script>
@endsection
