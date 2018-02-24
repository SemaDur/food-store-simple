<?php $__env->startSection('content'); ?>

    <menu class="category">
        <ul class="nav nav-justified">
            <li><a href="#add" class="nav-link">Dodaj produkt ili kategoriju</a></li>
            <li><a href="/editProducts" class="nav-link">Modifikovanje produkta</a></li>
            <li><a href="/trashProducts" class="nav-link">Izbaceni produkti iz prodaje</a></li>
            <li><a href="/editUser" class="nav-link">Pregled Korisnika</a></li>
        </ul>
    </menu>


    <div class="col-xs-16">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-sm-16 col-md-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Dodavanje produkta:</div>
                        <div class="panel-body add_product">

                            <form action="<?php echo e(route('products.store')); ?>" method="POST" role="form"
                                  enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>


                                <?php if(session('add_product')): ?>
                                    <div class="col-xs-18">
                                        <span class="help-block">
                                            <?php $__currentLoopData = session('add_product'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($value); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <div class="container" >
                                    <div class="table-wrapper" >
                                    <div class="row clearfix">
                                        <div class="col-15 table-responsive" >
                                            <table class="table table-striped table-bordered" id="tab_logic">
                                                <thead>
                                                <tr >
                                                    <th class="text-center">
                                                        Naziv
                                                    </th>
                                                    <th class="text-center ">
                                                        Cijena
                                                    </th>
                                                    <th class="text-center">
                                                        Deskripcija
                                                    </th>
                                                    <th class="text-center ">
                                                        Kategorija
                                                    </th>
                                                    <th class="text-center">
                                                        Slika
                                                    </th>
                                                    <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr id='addr0' data-id="0" class="hidden">
                                                    <td data-name="name">
                                                        <input id="name" type="text" name='name'  placeholder='Naziv' class="form-control" value="<?php echo e(old('name')); ?>" required/>
                                                    </td>
                                                    <td data-name="mail">
                                                        <input id="price" type="text" name='price' placeholder='Cijena' class="form-control" value="<?php echo e(old('price')); ?>" required/>
                                                    </td>
                                                    <td data-name="desc" >
                                                        <textarea  name="description" class="form-control" placeholder="Deskripcija..." required><?php echo e(old('description')); ?></textarea>
                                                    </td>

                                                    <td data-name="sel">
                                                        <select name="category_id" class="form-control">
                                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </td>
                                                    <td data-name="img">
                                                        <div class="file-upload upload-add" >
                                                            <label>
                                                                <input type="file"  class="btn" name="image" onclick="getFileName('add')">
                                                                <span id="img-add">Upload:</span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td data-name="del">
                                                        <input type="submit" class="btn btn-primary" name="add_name" value="Spasi">
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="panel panel-primary">
                        <div id="edit" class="panel-heading">Dodaj ili ukloni kategoriju za produkte:</div>
                        <div class="panel-body">
                            <?php if(session('add_category')): ?>
                                <div class="col-xs-12">
                                        <span class="help-block">
                                            <?php $__currentLoopData = session('add_category'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($value); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </span>
                                </div>
                            <?php endif; ?>

                            <?php echo Form::open(['route'=>'categories.store', 'method'=>'POST', 'role'=>'form']); ?>

                            <?php echo e(csrf_field()); ?>

                            <div class="input-group">
                                <input type="text" name="name" class="form-control input-sm" required>
                                <span class="input-group-btn" style="margin-left: 4px">
                                    <?php echo Form::submit('Dodaj', ['class' => 'btn btn-primary btn-sm']); ?>

                                </span>
                            </div>
                            <?php echo Form::close(); ?>

                            <br>


                            <ul class="list-group">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        <?php echo e($category->name); ?>

                                        <?php echo Form::open(['route' => ['categories.destroy', $category->id] , 'method' => 'DELETE', 'class' => 'pull-right']); ?>

                                        <?php echo csrf_field(); ?>

                                        <?php echo Form::hidden('id',  $category->id); ?>

                                        <?php echo Form::submit('Izbrisi', ['class' => 'buttonDanger', 'style'=>'margin-top:-100px']); ?>

                                        <?php echo Form::close(); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>