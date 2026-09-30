<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel">
        <h1 class="post-title"><?php echo e($post->title); ?></h1>
        <p class="post-meta">
            Dibuat pada <?php echo e($post->created_at->format('d/m/Y H:i')); ?>

            &middot;
            Diperbarui pada <?php echo e($post->updated_at->format('d/m/Y H:i')); ?>

        </p>

        <div class="post-body"><?php echo e($post->body); ?></div>

        <div class="form-actions">
            <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-secondary">Kembali</a>
            <a href="<?php echo e(route('posts.edit', $post)); ?>" class="btn btn-warning">Edit</a>
            <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\TugasWeb-P10-BlogCRUD\resources\views/posts/show.blade.php ENDPATH**/ ?>