
<?php $__env->startSection('title', 'Edit Categories'); ?>
<?php $__env->startSection('breadcrumb'); ?>
  <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
  <li class="breadcrumb-item active">Edit Categories</li>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('dashboard.categories.update', $category->id)); ?>" method="post" enctype="multipart/form-data"> 
    <?php echo csrf_field(); ?>
    <?php echo method_field('put'); ?>
    <?php echo $__env->make('dashboard.categories._form', [
        'button_label' => "Update"
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd\resources\views\dashboard\categories\edit.blade.php ENDPATH**/ ?>