<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Food Store</title>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
        <!--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">-->

        <!-- Styles -->


        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
    </head>
    <body>
        <div class="flex-center position-ref full-height">

                <div class="wrap">

                    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="clear"> </div>
                    <?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



                <div class="clear"> </div>
                <div class="wrap">
                    <div class="content">

                    <?php echo $__env->yieldContent('content'); ?>


                    </div>
                    <div class="clear"> </div>
                </div>
                <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </body>
</html>
