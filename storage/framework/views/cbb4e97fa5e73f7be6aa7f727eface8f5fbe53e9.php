<?php $__env->startSection('content'); ?>

        <menu class="category">
            <ul class="nav nav-justified">
                <li><a href="/admin/products" class="nav-link">Dodaj produkt ili kategoriju</a></li>
                <li><a href="/editProducts" class="nav-link">Modifikovanje produkta</a></li>
                <li><a href="#" class="nav-link">Izbaceni produkti iz prodaje</a></li>
                <li><a href="/editUser" class="nav-link">Pregled Korisnika</a></li>
            </ul>
        </menu>

        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div id="trash" class="panel-heading">Kanta za uklonjene produkte:</div>
                <div class="panel-body">

                    <?php $__empty_1 = true; $__currentLoopData = $trashed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-xs-10 col-sm-5 col-md-4 col-lg-3 container prod">
                            <div class="row prod_block">

                                <div class="prod_name">
                                    <span><?php echo e($item->name); ?></span>
                                </div>

                                <div>
                                    <?php echo Form::open(['route' => ['trash.update', $item->id], 'method' => 'PUT']); ?>

                                    <?php echo csrf_field(); ?>

                                    <?php echo Form::submit('Vrati produkt', ['class' => 'btn btn-danger btn-sm btn-course']); ?>

                                    <?php echo Form::close(); ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <h3>Nema Produkta u kanti!</h3>
                    <?php endif; ?>

                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>