<?php $attributes = $attributes->exceptProps(['
    id' => ''
]); ?>
<?php foreach (array_filter((['
    id' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<label for="<?php echo e($id); ?>"><?php echo e($slot); ?></label><?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd\resources\views\components\form\label.blade.php ENDPATH**/ ?>