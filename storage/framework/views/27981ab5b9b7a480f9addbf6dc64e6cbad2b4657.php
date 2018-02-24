<?php $__env->startSection('content'); ?>

    <menu class="category">
        <ul class="nav nav-justified">
            <li><a href="/admin/products" class="nav-link">Dodaj produkt ili kategoriju</a></li>
            <li><a href="#" class="nav-link">Modifikovanje produkta</a></li>
            <li><a href="/trashProducts" class="nav-link">Izbaceni produkti iz prodaje</a></li>
            <li><a href="/editUser" class="nav-link">Pregled Korisnika</a></li>
        </ul>
    </menu>

    <div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Product <b>Details</b></h2>
                    </div>
                    <?php if(session('edit')): ?>
                        <div class="col-xs-12">
                            <?php $__currentLoopData = session('edit'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="help-block">
                                                <strong>ERROR: Validation of meaning (<?php echo e($key); ?>)! </strong>
                                    <?php $__currentLoopData = $error; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($value); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="col-sm-6">
                        <div class="search-box">
                            <div class="input-group">
                                <input id="filter" type="text" class="form-control" placeholder="Filter...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr  class="row">
                    <th class="col-sm-2">Slika</th>
                    <th class="col-sm-2">Naziv</th>
                    <th class="col-sm-1">Cijena</th>
                    <th class="col-sm-2">Kategorija</th>
                    <th class="col-sm-2">Deskripcija</th>
                </tr>
                </thead>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php echo Form::open(['route' => ['products.update', $item->id] , 'method' => 'PUT', 'enctype' => 'multipart/form-data']); ?>

                    <?php echo e(csrf_field()); ?>

                    <tbody class="searchable">
                    <tr class="row">
                        <td data-name="img" class="col-sm-2">
                            <img src="<?php echo e(asset('images/'.$item->image)); ?>" width="100px" height="100px">
                        </td>
                        <td data-name="name" class="col-sm-2">
                            <input id="name" type="text" name='name'  class="form-control" value="<?php echo e($item->name); ?>" required/>
                        </td>
                        <td data-name="price" class="col-sm-1">
                            <input id="price" type="text" name='price' class="form-control" value="<?php echo e($item->price); ?>" required/>
                        </td>
                        <td data-name="desc" class="col-sm-2">
                            <?php if(count($item->categories) == 1): ?>
                                <select name="category_id" class="form-control">
                                    <option value="<?php echo e($item->categories[0]->id); ?>"><?php echo e($item->categories[0]->name); ?></option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($category->id != $item->categories[0]->id): ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php elseif(count($item->categories) > 1): ?>
                                <?php echo Form::hidden('many_categories', count($item->categories)); ?>

                                <?php $__currentLoopData = $item->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <select name="<?php echo e('categories_'.$loop->iteration); ?>" class="form-control">
                                        <option value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($category->id != $v->id): ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </td>
                        <td data-name="desc" class="col-sm-2">
                            <textarea  name="description" class="form-control"><?php echo e($item->description); ?></textarea>
                        </td>
                        <td data-name="edit">
                            <div>
                                <?php echo Form::submit('Spasi promjenu', ['class' => 'btn-edit pull-right']); ?>

                            </div>
                            <?php echo Form::close(); ?>

                        </td>
                        <td data-name="del">
                            <?php echo Form::open(['route' => ['products.destroy', $item->id] , 'method' => 'DELETE', 'class' => 'pull-right']); ?>

                            <?php echo e(csrf_field()); ?>

                            <?php echo Form::hidden('id',  $item->id); ?>

                            <?php echo Form::submit('Izbrisi', ['class' => 'btn-danger']); ?>

                            <?php echo Form::close(); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <h3>Sorry, no products!</h3>
                    <?php endif; ?>
                    </tbody>
            </table>
        </div>

    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>