<!DOCTYPE html>
<html lang="es-ar">
    <head>
        <?php echo $__env->make('admin.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('head'); ?>
    </head>
    <body>
        <?php echo $__env->make('admin.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('admin.partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('admin.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('admin.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('admin.partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>
</html>