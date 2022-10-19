
<?php $__env->startSection('title', 'Products'); ?>
<?php $__env->startSection('breadcrumb'); ?>
  <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
  <li class="breadcrumb-item active">Products</li>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="mb-5">
    <a class="btn btn-sm btn-outline-primary mr-2" href="<?php echo e(route('dashboard.products.create')); ?>">
        Create
    </a>

    <a class="btn btn-sm btn-outline-dark" href="#">
        Trash
    </a>
</div>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.alert','data' => []]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<form action="<?php echo e(URL::current()); ?>" method="get" class="d-flex justify-content-between">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.input','data' => ['name' => 'name','type' => 'text','placeholder' => 'Search','value' => request('name')]]); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'name','type' => 'text','placeholder' => 'Search','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request('name'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> 
    <br>
    <select name="status" class="form-control" style="width: 150px">
        <option value="">All</option>
        <option value="active" <?php if(request('status') == 'active'): ?> selected <?php endif; ?>>Active</option>
        <option value="archived" <?php if(request('status') == 'archived'): ?> selected <?php endif; ?>>Archived</option>
    </select>
    <button class="btn btn-dark">Filter</button>
</form>

<br>
<br>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Store</th>
            <th>Status</th>
            <th>Craeted At</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><img src="<?php echo e(asset('storage/'.$product->product_image)); ?>" alt="" height="50"></td>
                <td><?php echo e($product->id); ?></td>
                <td><?php echo e($product->name); ?></td>
                <!-- SELECT * FROM categories WHERE id = $product->categroy_id; just at used relation method-->
                <td><?php echo e($product->category->name); ?></td>
                <!-- SELECT * FROM stores WHERE id = $product->store_id; just at used relation method -->
                <td><?php echo e($product->store->name); ?></td>
                <td><?php echo e($product->status); ?></td>
                <td><?php echo e($product->created_at); ?></td>
                <td>
                    <a href="<?php echo e(route('dashboard.products.edit', $product->id)); ?>" class="btn btn-sm btn-outline-success">Edit</a>
                </td>
                <td>
                    <form action="<?php echo e(route('dashboard.products.destroy', $product->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <!-- Form Method Spoofing -->
                        <input type="hidden" name="_method" value="delete">
                        <!-- or using directive bt <?php echo method_field('delete/put/patch'); ?>-->
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <td colspan="7">No products defind.</td>
        <?php endif; ?>
    </tbody>
</table>

<?php echo e($products->withQueryString()->links()); ?>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd\resources\views/dashboard/products/index.blade.php ENDPATH**/ ?>