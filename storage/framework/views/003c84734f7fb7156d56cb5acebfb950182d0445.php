<div class="top-header">
    <div class="wrap">
        <!----start-logo---->
        <div class="logo">
            <a href="/"><img src="<?php echo e(asset('images/logo.png')); ?>" style=" height: 31px; width: 203px; " title="logo" /></a>
        </div>
        <!----end-logo---->
        <!----start-top-nav---->
        <div class="top-nav">
            <ul>


                <?php $__currentLoopData = \App\Category::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="/category/<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>