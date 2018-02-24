<?php $__env->startComponent('mail::message'); ?>
# Hvala vam na registraciji <?php echo e($user->name); ?>


Klikni te na dugme i startujte vasu kupovinu kod nas.
Bon Apetit

<?php $__env->startComponent('mail::button', ['url' => '']); ?>
Food Store
<?php echo $__env->renderComponent(); ?>

Hvala,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
