<?php $__env->startSection('page-title', 'Add Team Member'); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><span class="card-title">Team Member Details</span></div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.team.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Role *</label>
                            <select name="role" class="form-select" required>
                                <option value="">Select role...</option>
                                <option value="Partner">Partner</option>
                                <option value="Associate">Associate</option>
                                <option value="Director">Director</option>
                                <option value="Senior Architect">Senior Architect</option>
                                <option value="Architect">Architect</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Title / Position</label>
                            <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>" placeholder="e.g. Founder & Creative Director">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Office</label>
                            <select name="office" class="form-select">
                                <option value="">Select office...</option>
                                <?php $__currentLoopData = ['Copenhagen','New York','London','Barcelona','Los Angeles','Shanghai','Zürich']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($office); ?>" <?php echo e(old('office') == $office ? 'selected' : ''); ?>><?php echo e($office); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">LinkedIn URL</label>
                            <input type="url" name="linkedin" class="form-control" value="<?php echo e(old('linkedin')); ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Bio</label>
                            <textarea name="bio" class="form-control" rows="5" placeholder="Professional biography..."><?php echo e(old('bio')); ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="<?php echo e(old('sort_order', 0)); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control" accept="image/*">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_partner" id="is_partner" value="1">
                                <label class="form-check-label" for="is_partner">
                                    <strong>Mark as Partner</strong>
                                    <div style="font-size:12px;color:#888;">Partners appear in the main People section</div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4"><i class="bi bi-check-lg me-1"></i> Save Member</button>
                        <a href="<?php echo e(route('admin.team.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/admin/team/create.blade.php ENDPATH**/ ?>