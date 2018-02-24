<?php $__env->startComponent('mail::message'); ?>
# Narudzba ponistena

Vasa narudzba je ponistena.
Hvala vam na posjeti.

<?php $__env->startComponent('mail::button', ['url' => '']); ?>
Food Store
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
