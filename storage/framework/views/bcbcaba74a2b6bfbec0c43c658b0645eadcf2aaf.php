
<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session()->has("danger")): ?>
    <div class="alert alert-danger">
        <?php echo e(session("danger")); ?>

    </div>
<?php endif; ?>

<?php if(session()->has("info")): ?>
    <div class="alert alert-info">
        <?php echo e(session("info")); ?>

    </div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd\resources\views/components/alert.blade.php ENDPATH**/ ?>