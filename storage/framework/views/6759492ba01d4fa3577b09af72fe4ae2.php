
<?php $__env->startSection('page-title', 'Edit Article'); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><span class="card-title">Edit: <?php echo e(\Illuminate\Support\Str::limit($news->title, 50)); ?></span></div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.news.update', $news)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Article Title *</label>
                            <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $news->title)); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <?php $__currentLoopData = ['News','Project','Award','Event','Press','Announcement']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat); ?>" <?php echo e(old('category', $news->category) == $cat ? 'selected' : ''); ?>><?php echo e($cat); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="published" <?php echo e(old('status', $news->status) == 'published' ? 'selected' : ''); ?>>Published</option>
                                <option value="draft" <?php echo e(old('status', $news->status) == 'draft' ? 'selected' : ''); ?>>Draft</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Excerpt / Summary</label>
                            <textarea name="excerpt" class="form-control" rows="3"><?php echo e(old('excerpt', $news->excerpt)); ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Full Content</label>
                            <textarea name="content" class="form-control" rows="12"><?php echo e(old('content', $news->content)); ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Cover Image</label>
                            <?php if($news->cover_image): ?>
                            <div class="mb-2"><img src="<?php echo e(asset('storage/'.$news->cover_image)); ?>" style="height:80px;border-radius:8px;object-fit:cover;" alt="Cover"></div>
                            <?php endif; ?>
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4"><i class="bi bi-check-lg me-1"></i> Update Article</button>
                        <a href="<?php echo e(route('admin.news.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div style="font-size:12px;color:#999;margin-bottom:6px;">Published</div>
                <div style="font-size:14px;"><?php echo e($news->published_at ? $news->published_at->format('d M Y') : 'Not published'); ?></div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <form action="<?php echo e(route('admin.news.destroy', $news)); ?>" method="POST" onsubmit="return confirm('Delete this article?')">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-outline-danger w-100"><i class="bi bi-trash me-1"></i> Delete Article</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/admin/news/edit.blade.php ENDPATH**/ ?>