<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['type' => 'info']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['type' => 'info']); ?>
<?php foreach (array_filter((['type' => 'info']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    switch ($type) {
        case 'info':
            $clases = 'bg-blue-100 border-blue-500 text-blue-700';
            break;

        case 'danger':
            $clases = 'bg-red-100 border-red-500 text-red-700';
            break;

        default:
            $clases = 'bg-blue-100 border-blue-500 text-blue-700';
            break;
    }
?>

<article <?php echo e($attributes->merge(['class' => "border-l-4 p-4  $clases", "role" =>"alert" ])); ?> >
    <h1 class="font-bold"><?php echo e($title); ?></h1>
    <?php echo e($slot); ?>

</article>
<?php /**PATH C:\xampp\htdocs\ANDF\jetStream\resources\views\components\alert.blade.php ENDPATH**/ ?>