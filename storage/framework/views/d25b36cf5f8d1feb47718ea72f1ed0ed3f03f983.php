
<?php $__env->startSection('title', 'Edit Product'); ?>
<?php $__env->startSection('breadcrumb'); ?>
  <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
  <li class="breadcrumb-item active">Edit Product</li>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('dashboard.products.update', $product->id)); ?>" method="post" enctype="multipart/form-data"> 
  <?php echo csrf_field(); ?>
  <?php echo method_field('put'); ?>
  <?php echo $__env->make('dashboard.products._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
    
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd\resources\views\dashboard\products\edit.blade.php ENDPATH**/ ?>