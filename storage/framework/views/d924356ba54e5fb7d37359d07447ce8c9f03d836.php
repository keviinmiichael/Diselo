<!DOCTYPE html>
<html lang="es-ar">
    
    <head>
        <?php echo $__env->make('admin.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>

    <body class="hidden-menu">

    <!-- HEADER -->
    <header id="header">
        <div id="logo-group">
            <!-- PLACE YOUR LOGO HERE -->
            <span id="logo"> <img src="<?php echo e(url('img/admin/logo-polka.svg')); ?>" alt="Pol-ka"> </span>
            <!-- END LOGO PLACEHOLDER -->
        </div>
    </header>
    <!-- END HEADER -->

    <!-- MAIN PANEL -->
    <div id="" role="main">
        <!-- MAIN CONTENT -->
            <div id="content" class="container">

                <div class="row" style="margin-top: 80px">
                    <div class="col-md-4 hidden-sm hidden-xs"></div>
                     <div class="col-md-4">
                        <div class="well no-padding">
                            <form action="/admin/login" method="post" id="login-form" class="smart-form client-form" role="form">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <header>
                                    Login
                                </header>

                                <fieldset>

                                    <section>
                                        <label class="label">Usuario</label>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="email" value="<?php echo e(old('email')); ?>" autofocus>
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingrese su nombre de usuario</b></label>
                                    </section>

                                    <section>
                                        <label class="label">Contraseña</label>
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" name="password">
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingrese su contraseña</b> </label>
                                    </section>

                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">
                                        Entrar
                                    </button>
                                </footer>
                            </form>

                        </div>

                    </div>
                    <div class="col-md-4 hidden-sm hidden-xs"></div>
                </div>
            </div>
    </div>
    <!-- /MAIN PANEL -->

    <?php echo $__env->make('admin.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('admin.partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


</body>
</html>