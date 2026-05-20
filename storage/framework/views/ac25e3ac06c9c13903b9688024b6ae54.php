
<?php $__env->startSection('page-title', 'Add New Project'); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <span class="card-title"><i class="bi bi-building me-2"></i>Project Details</span>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.projects.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Project Title *</label>
                            <input type="text" name="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title')); ?>" placeholder="e.g. CopenHill" required>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" value="<?php echo e(old('location')); ?>" placeholder="e.g. Copenhagen">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control" value="<?php echo e(old('country')); ?>" placeholder="e.g. Denmark">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Category *</label>
                            <select name="category" class="form-select" required>
                                <option value="">Select category...</option>
                                <option value="Architecture" <?php echo e(old('category') == 'Architecture' ? 'selected' : ''); ?>>Architecture</option>
                                <option value="Landscape" <?php echo e(old('category') == 'Landscape' ? 'selected' : ''); ?>>Landscape</option>
                                <option value="Planning" <?php echo e(old('category') == 'Planning' ? 'selected' : ''); ?>>Planning</option>
                                <option value="Products" <?php echo e(old('category') == 'Products' ? 'selected' : ''); ?>>Products</option>
                                <option value="Interiors" <?php echo e(old('category') == 'Interiors' ? 'selected' : ''); ?>>Interiors</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Year</label>
                            <input type="number" name="year" class="form-control" value="<?php echo e(old('year')); ?>" placeholder="e.g. 2024" min="1990" max="2099">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Short Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Brief description for listing pages..."><?php echo e(old('description')); ?></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Full Content</label>
                            <textarea name="full_content" class="form-control" rows="8" placeholder="Detailed project content..."><?php echo e(old('full_content')); ?></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4">
                            <i class="bi bi-check-lg me-1"></i> Save Project
                        </button>
                        <a href="<?php echo e(route('admin.projects.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <span class="card-title">Publish Settings</span>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" form="project-form" class="form-select">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" form="project-form">
                    <label class="form-check-label" for="featured">
                        <strong>Feature this project</strong>
                        <div style="font-size:12px;color:#888;">Show on homepage hero section</div>
                    </label>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header"><span class="card-title">Tips</span></div>
            <div class="card-body" style="font-size:13px;color:#666;line-height:1.7;">
                <p>• Use a high-quality cover image (1920×1080 recommended)</p>
                <p>• Featured projects appear on the homepage</p>
                <p>• Draft projects are only visible to admins</p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
// Add status select to the same form
document.querySelector('form').id = 'project-form';
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/admin/projects/create.blade.php ENDPATH**/ ?>