<?php $__env->startSection('title', 'Contacto'); ?>
<?php $__env->startSection('description', 'Contacto'); ?>


<?php $__env->startSection('body'); ?>
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
</div>
<!-- Main Container Ends -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="/js/front/contact.js"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>