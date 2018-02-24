<?php $__env->startSection('content'); ?>


    <article>

        <div id="success"></div>

        <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <div class="col-sm-3">
                        <div class="col-item">
                            <div class="photo">
                                <img src="<?php echo e(asset('images/'.$item->image)); ?>" class="img-responsive"  height="155px" width="155"/>
                            </div>
                            <div class="info">
                                <div class="col-item">
                                    <div>
                                        <p> Naziv: <?php echo e($item->name); ?></p>
                                        <p> Cijena: KM<?php echo e($item->price); ?></p>
                                    </div>

                                </div>
                                <div class="separator clear-left">
                                    <p class="btn-add">
                                        <button type="button" class="btn btn-danger btn-sm btn-course" onclick="addToCart(<?php echo e($item->id); ?>)">Dodaj</button></p>
                                    <p class="btn-details">
                                        <i class="fa fa-list"></i><a href="<?php echo e(route('details', $item->id)); ?>" class="hidden-sm">Vise info!</a></p>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                    </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h3>Nepostoji product u ovoj kategoriji!</h3>
        <?php endif; ?>
        </div>

    </article>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>