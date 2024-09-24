<?php if(Route::has('login')): ?>
    <nav class="m-2">
        <?php if(auth()->guard()->check()): ?>
            
            <a href="<?php echo e(url('/dashboard')); ?>"
                class="btn btn-primary">
                Dashboard
            </a>
            <a href="<?php echo e(url('/logout')); ?>"
                class="btn btn-danger float-end">
                Logout
            </a>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>"
                class="btn btn-success">
                Log in
            </a>

            <?php if(Route::has('register')): ?>
                <a href="<?php echo e(route('register')); ?>"
                    class="btn btn-secondary">
                    Register
                </a>
            <?php endif; ?>
        <?php endif; ?>
    </nav>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\webspiders\resources\views/layout/navbar.blade.php ENDPATH**/ ?>