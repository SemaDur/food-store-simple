<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                    <div class="container" style="border-bottom:1px solid black">
                        <h1><b><?php echo e($userid->name); ?></b></h1>
                    </div>
                </br>
                    <ul class="list-group">
                        <li ><p>Moji podaci:</p></li>
                        <li class="list-group-item  active"><p><b>Email:</b> <?php echo e($userid->email); ?></p></li>
                        <form action="<?php echo e(route('user.update')); ?>" method="POST" role="form">
                        <?php echo csrf_field(); ?>
                            <li class="list-group-item">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Adresa:</span>
                                        <input id="address" type="text" name='address' class="form-control" value="<?php echo e($userid->address); ?>" required/>

                                    </div>
                            </li>
                            <span class="input-group-btn">
                                <?php echo Form::submit('Spasi promjenu', ['class' => 'btn btn-secondary']); ?>

                            </span>
                        </form>
                    </ul>
                </div>
            </div>
        </div>

        <?php if(!is_null($orders->first())): ?>
            <div class="container">

                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Moje <b>Narudzbe</b></h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Produkt:</th>
                            <th>Status:</th>
                            <th>Datum:</th>
                            <th>Cijena:</th>
                        </tr>
                        </thead>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>

                            <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="<?php echo e($order->status); ?>">
                                    <td>
                                        <?php echo e($product->name); ?>

                                    </td>
                                    <td><?php echo e($order->status); ?></td>
                                    <td><?php echo e($order->created_at); ?></td>
                                    <td>
                                        <?php echo e($product->price); ?> KM
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <tr style="border-top: 1px solid gray;border-bottom: 2px solid gray">
                                <td colspan="5">
                                    <strong>Total cost: KM <?php echo e($order->amount); ?></strong>
                                </td>
                                <td>
                                    <?php if($order->status == 'active'): ?>
                                        Narudzba u toku
                                    <?php else: ?>
                                        Isporuceno
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                    </table>
                </div>
            </div>
    </div>

    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>