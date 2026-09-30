<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['post']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['post']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<article class="card">
    <h2 class="card-title"><?php echo e($post->title); ?></h2>
    <p class="card-date">Dibuat pada <?php echo e($post->created_at->format('d/m/Y H:i')); ?></p>
    <p class="card-text"><?php echo e(str($post->body)->limit(120)); ?></p>
    <div class="card-actions">
        <a href="<?php echo e(route('posts.show', $post)); ?>" class="btn btn-primary btn-sm">Lihat</a>
        <a href="<?php echo e(route('posts.edit', $post)); ?>" class="btn btn-warning btn-sm">Edit</a>
        <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
        </form>
    </div>
</article>
<?php /**PATH C:\xampp\htdocs\TugasWeb-P10-BlogCRUD\resources\views/components/card.blade.php ENDPATH**/ ?>