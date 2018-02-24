<?php $__env->startSection('content'); ?>

    <article>

        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <?php if(!is_null($cart)): ?>

                        <div class="container">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <a type="button" href="<?php echo e(route('home')); ?>" class="btn btn-primary btn-sm btn-block">
                                                            <span class="glyphicon glyphicon-share-alt"></span>Nastavi kupovinu
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row">
                                                <div class="col-xs-2"><img class="img-responsive" src="<?php echo e(asset('images/'.$item->product->image)); ?>" height="100px" width="70">
                                                </div>
                                                <div class="col-xs-4">
                                                    <h4 class="product-name"><strong><?php echo e($item->product->name); ?></strong></h4><h4><small><?php echo e($short_description[$item->product->id]); ?></small></h4>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="col-xs-6 text-right">
                                                        <h6><strong><?php echo e($item->product->price); ?><span class="text-muted"> KM</span></strong></h6>
                                                    </div>
                                                    <div class="col-xs-4">

                                                    </div>
                                                    <div class="col-xs-2">
                                                        <?php echo Form::open(['route' => ['cart.destroy', $item->product->id], 'method' => 'Delete', 'class'=>'pull-right']); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" value="Delete" class="btn btn-link btn-xs">
                                                            <span class="glyphicon glyphicon-trash"> </span>
                                                        </button>
                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                </div>

                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <hr>
                                            <div class="row">
                                                <div class="text-center">
                                                    <div class="col-xs-9">
                                                        <h6 class="text-right">Ponisti korpu?</h6>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <?php echo Form::open(['route' => ['cart.destroy', 'all'], 'method' => 'Delete']); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo Form::submit('Izbrisi sve', ['class' => 'btn btn-danger']); ?>

                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row text-center">
                                                <div class="col-xs-9">
                                                    <h4 class="text-right">Total KM: <strong><?php echo e($totalPrice); ?></strong></h4>
                                                </div>
                                                <div class="col-xs-3">
                                                    <?php echo Form::open(['route' => ['orderUser'], 'method' => 'post']); ?>

                                                    <?php echo e(csrf_field()); ?>

                                                    <button type="submit" value="Order" class="btn btn-success pull-left">
                                                        Naruci
                                                    </button>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php if(session('success')): ?>
                            <div id="message" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <?php echo e(session('success')); ?>

                                            <button class="btnModal pull-right" data-dismiss="modal">Ok!</button>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                <h2>No Items in cart</h2>
                            </div>
                        </div>
                    <?php endif; ?>


                </div>
            </div>
        </div>

    </article>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>