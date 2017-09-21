@extends('front.app')

@section('title', 'Contacto')
@section('description', 'Contacto')


@section('body')
<!-- Main Container Starts -->
<div class="main-container container">
    <div class="main-container container">
        <!-- Main Heading Starts -->
        <h2 class="main-heading text-center">
            Contactanos
        </h2>
        <!-- Main Heading Ends -->
        <!-- Starts -->
        <div class="row">
            <!-- Contact Form Starts -->
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">Envianos tu consulta</h3>
                    </div>
                    <div class="panel-body">
                        <form id="form-contact" class="form-horizontal" role="form" novalidate>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">
                                    Nombre
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">
                                    Email
                                </label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject" class="col-sm-2 control-label">
                                    Asunto
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-sm-2 control-label">
                                    Mensaje
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="message" id="message" class="form-control" rows="5" placeholder="Mensaje"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button id="sender" type="submit" class="btn btn-black text-uppercase" data-sending="false">
                                        <span style="display: none" class="fa fa-spin fa-spinner"></span> Enviar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Contact Form Ends -->
        </div>
        <!-- Ends -->
    </div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.1083855205557!2d-58.479530150517185!3d-34.62670121654996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc99317541a87%3A0xb253864cf4629455!2zRMOtc2Vsbw!5e0!3m2!1ses!2sar!4v1506024952832" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>

</div>
<!-- Main Container Ends -->

@endsection

@section('scripts')
    <script src="/js/front/contact.js"></script>
@endsection
