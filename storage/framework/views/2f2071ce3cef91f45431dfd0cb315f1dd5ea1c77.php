<?php $__env->startComponent('mail::message'); ?>
# Consulta

<p><strong>Nombre:</strong> <?php echo e($data['name']); ?></p>

<p><strong>Email:</strong> <?php echo e($data['email']); ?></p>

<p><strong>Asunto:</strong> <?php echo e($data['subject']); ?></p>

<p><strong>Mensaje:</strong> <?php echo e($data['message']); ?></p>

<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
