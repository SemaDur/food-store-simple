<?php $__env->startSection('content'); ?>

    <article>

        <div class="col-xs-12">
            <div class="panel panel-default">
                <div id="add" class="panel-heading">Dashbord Narudzbe:</div>
                <div class="panel-body">

                        <?php if(!is_null($orders->first())): ?>
                            <div class="container">
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>Narucio: <?php echo e($order->user->name); ?> Adresa: <?php echo e($order->user->address); ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Product:</th>
                                            <th>Status:</th>
                                            <th>Date created:</th>
                                            <th>Cost:</th>
                                        </tr>
                                        </thead>

                                            <tbody>

                                            <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="<?php echo e($order->status); ?>">

                                                    <td>
                                                        <?php echo e(isset($product->name) ? $product->name : 'This product: '.$trashed->where('id', $product->id)->first()->name.' has been removed'); ?>

                                                    </td>
                                                    <td><?php echo e($order->status); ?></td>
                                                    <td><?php echo e($order->created_at); ?></td>
                                                    <td>
                                                        <?php echo e(isset($product->price) ? 'KM ' . $product->price : 'KM '. $trashed->where('id', $$product->id)->first()->price); ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <tr style="border-top: 1px solid gray;border-bottom: 2px solid gray">
                                                <td colspan="5">
                                                    <strong>Total cost: KM <?php echo e($order->amount); ?></strong>
                                                </td>
                                                <td>
                                                    <?php if($order->status == 'active'): ?>
                                                        <?php echo Form::open(['route' => ['orders.update', $order->id], 'method' => 'PUT']); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo Form::submit('Zavrsi', ['class' => 'btn btn-primary']); ?>

                                                        <?php echo Form::close(); ?>

                                                        <?php echo Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'DELETE']); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo Form::submit('Izbrisi', ['class' => 'btn btn-danger']); ?>

                                                        <?php echo Form::close(); ?>


                                                    <?php else: ?>
                                                        Order is closed
                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                            </tbody>
                                    </table>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                                <h2>No orders</h2>
                                            </div>
                                        </div>
                        <?php endif; ?>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </article>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>