
<?php $__env->startSection('title', 'Categories'); ?>
<?php $__env->startSection('breadcrumb'); ?>
  <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
  <li class="breadcrumb-item active">Categories</li>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="mb-5">
    <a class="btn btn-sm btn-outline-primary mr-2" href="<?php echo e(route('dashboard.categories.create')); ?>">
        Create
    </a>

    <a class="btn btn-sm btn-outline-dark" href="<?php echo e(route('dashboard.categories.trash')); ?>">
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
            <th>Parent</th>
            <th>Products #</th>
            <th>Status</th>
            <th>Craeted At</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><img src="<?php echo e(asset('storage/'.$category->category_image)); ?>" alt="" height="50"></td>
                <td><?php echo e($category->id); ?></td>
                <td><a href="<?php echo e(route('dashboard.categories.show', $category)); ?>"><?php echo e($category->name); ?></a></td>
                <td><?php echo e($category->parent->name); ?></td>
                <td><?php echo e($category->products_count); ?></td>
                <td><?php echo e($category->status); ?></td>
                <td><?php echo e($category->created_at); ?></td>
                <td>
                    <a href="<?php echo e(route('dashboard.categories.edit', $category->id)); ?>" class="btn btn-sm btn-outline-success">Edit</a>
                </td>
                <td>
                    <form action="<?php echo e(route('dashboard.categories.destroy', $category->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <!-- Form Method Spoofing -->
                        <input type="hidden" name="_method" value="delete">
                        <!-- or using directive bt <?php echo method_field('delete/put/patch'); ?>-->
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <td colspan="9">No Categories defind.</td>
        <?php endif; ?>
    </tbody>
</table>

<?php echo e($categories->withQueryString()->links()); ?>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd\resources\views\dashboard\categories\index.blade.php ENDPATH**/ ?>