
<?php $__env->startSection('page-title', 'Write Article'); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><span class="card-title">Article Details</span></div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.news.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Article Title *</label>
                            <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>" placeholder="Enter headline..." required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option value="">Select category...</option>
                                <?php $__currentLoopData = ['News','Project','Award','Event','Press','Announcement']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat); ?>" <?php echo e(old('category') == $cat ? 'selected' : ''); ?>><?php echo e($cat); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Excerpt / Summary</label>
                            <textarea name="excerpt" class="form-control" rows="3" placeholder="Short summary shown in listings..."><?php echo e(old('excerpt')); ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Full Content</label>
                            <textarea name="content" class="form-control" rows="12" placeholder="Full article content..."><?php echo e(old('content')); ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4"><i class="bi bi-check-lg me-1"></i> Publish Article</button>
                        <a href="<?php echo e(route('admin.news.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body" style="font-size:13px;color:#666;line-height:1.7;">
                <p>• Use a compelling headline</p>
                <p>• Keep the excerpt under 200 characters</p>
                <p>• Recommended image: 1200×630px</p>
                <p>• Draft articles are not shown publicly</p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/admin/news/create.blade.php ENDPATH**/ ?>