<select
    name="<?php echo e($name); ?>"
    <?php echo e($attributes->class([
        'form-control',
        'form-select',
        'is-invalid' =>$errors->has($name)
    ])); ?>

>
    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($value); ?>" <?php if($value == $selected): ?> selected <?php endif; ?>> <?php echo e($text); ?> </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd\resources\views\components\form\select.blade.php ENDPATH**/ ?>