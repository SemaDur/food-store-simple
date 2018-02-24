<?php $__env->startSection('content'); ?>

    <article>

        <div class="col-sm-3">
            <div class="col-item">
                <div class="photo">
                    <img src="<?php echo e(asset('images/'.$product->image)); ?>"  class="img-responsive" alt="a" />
                </div>
                <div class="info">
                    <div class="row">
                        <div class="price col-md-6">
                            <h5>
                                <?php echo e($product->name); ?></h5>
                            <h5 class="price-text-color">
                                Cijena: KM <?php echo e($product->price); ?></h5>
                        </div>
                        <div class="rating hidden-sm col-md-6">
                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                            </i><i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="separator clear-left">
                        <p class="btn-add">
                            <button type="button" class="btn btn-sm btn-course" onclick="addToCart(<?php echo e($product->id); ?>)">Dodaj u korpu</button>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
    </article>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>