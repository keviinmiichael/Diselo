@extends('front.app')

@section('title', 'Díselo')
@section('description', 'Login')


@section('body')
<!-- Main Container Starts -->
<div class="main-container container">

    <h2 class="main-heading text-center">Login</h2>


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
                        <!-- Form Starts -->
                        <form action="login" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email:</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="email">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Contraseña:</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="password">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" id="comprar" class="btn btn-black">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- Form Ends -->
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
