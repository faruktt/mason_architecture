<?php $__env->startSection('page-title', 'News Articles'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="bi bi-newspaper me-2"></i>News Articles (<?php echo e($news->total()); ?>)</span>
        <a href="<?php echo e(route('admin.news.create')); ?>" class="btn btn-accent"><i class="bi bi-plus-lg me-1"></i> Write Article</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Published</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <strong><?php echo e($article->title); ?></strong>
                        <?php if($article->excerpt): ?>
                        <div style="font-size:12px;color:#999;margin-top:2px;"><?php echo e(\Illuminate\Support\Str::limit($article->excerpt, 80)); ?></div>
                        <?php endif; ?>
                    </td>
                    <td><span style="font-size:12px;background:#f0f0f0;padding:3px 8px;border-radius:20px;"><?php echo e($article->category ?? 'Uncategorized'); ?></span></td>
                    <td style="font-size:12px;color:#888;"><?php echo e($article->published_at ? $article->published_at->format('d M Y') : '—'); ?></td>
                    <td><span class="badge-status badge-<?php echo e($article->status); ?>"><?php echo e(ucfirst($article->status)); ?></span></td>
                    <td>
                        <div class="action-btns">
                            <a href="<?php echo e(route('admin.news.edit', $article)); ?>" class="btn-edit"><i class="bi bi-pencil"></i></a>
                            <form action="<?php echo e(route('admin.news.destroy', $article)); ?>" method="POST" onsubmit="return confirm('Delete this article?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="5" class="text-center py-4 text-muted">No news articles found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($news->hasPages()): ?>
    <div class="card-body pt-0"><?php echo e($news->links()); ?></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/admin/news/index.blade.php ENDPATH**/ ?>