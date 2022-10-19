
<?php $__env->startSection('title', $category->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
  <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
  <li class="breadcrumb-item active">Categories</li>
  <li class="breadcrumb-item active"><?php echo e($category->name); ?></li>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Store</th>
            <th>Status</th>
            <th>Craeted At</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $products = $category->products->with('store')->latest()->paginate(5);
        ?>
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><img src="<?php echo e(asset('storage/'.$product->product_image)); ?>" alt="" height="50"></td>
                <td><?php echo e($product->name); ?></td>
                <!-- SELECT * FROM stores WHERE id = $product->store_id; just at used relation method -->
                <td><?php echo e($product->store->name); ?></td>
                <td><?php echo e($product->status); ?></td>
                <td><?php echo e($product->created_at); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <td colspan="5">No products defind.</td>
        <?php endif; ?>
    </tbody>
</table>

<?php echo e($products->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd\resources\views\dashboard\categories\show.blade.php ENDPATH**/ ?>