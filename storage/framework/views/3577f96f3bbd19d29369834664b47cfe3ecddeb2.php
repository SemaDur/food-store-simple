<?php if(Route::has('login')): ?>
    <div class="header">

        <div class="clear"> </div>
        <div class="header-top-nav">
            <ul>
                <?php if(Auth::guest()): ?>
                    <li><a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a></li>
                    <li><a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a></li>

                <?php else: ?>
                    <li><a href="/viewProfile"><?php echo e(Auth::user()->name); ?></a></li>
                    <li>
                        <a href="/cart">
                            Shopping cart
                            <?php echo (isset($countProductCart) && $countProductCart != 0) ? '<span class="badge" id="countCart">'.$countProductCart .'</span>' : '<span class="badge" id="countCart"></span>'; ?>

                        </a>
                    </li>

                    
                    <?php if(Auth::user()->isAdmin()): ?>
                        <li><a href="/admin/products">Management</a></li>
                        <li>
                            <a href="/admin/orders">
                                Orders
                                <?php echo (isset($countActiveOrders) && $countActiveOrders != 0) ? '<span class="badge">'. $countActiveOrders .'</span>' : ''; ?>

                            </a>
                        </li>
                    <?php endif; ?>

                    <li><a href="<?php echo e(url('/logout')); ?>"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Logout</a></li>

                    <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="">
                        <?php echo e(csrf_field()); ?>

                    </form>
                <?php endif; ?>

            </ul>
        </div>

        <div class="clear"> </div>
    </div>
<?php endif; ?>