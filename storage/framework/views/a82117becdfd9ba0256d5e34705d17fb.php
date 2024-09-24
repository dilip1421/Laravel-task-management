<?php $__env->startSection('content'); ?>
    <div class="container">
        <form action="<?php echo e(route('login')); ?>" method="post" class="border p-3 w-50 m-auto">
            <?php echo csrf_field(); ?>
            
            <?php if(Session::has('error')): ?>
                <p class="text-danger"><?php echo e(Session::get('error')); ?></p>
            <?php endif; ?>
            <?php if(Session::has('success')): ?>
                <p class="text-success"><?php echo e(Session::get('success')); ?></p>
            <?php endif; ?>
            <h2>Login form</h2>

            <strong>Email</strong>
            <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="alert-danger"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <strong>Password</strong>
            <input type="password" class="form-control" name="password">
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="alert-danger"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <button type="submit" class="btn btn-secondary mt-3">Login</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\webspiders\resources\views/login.blade.php ENDPATH**/ ?>