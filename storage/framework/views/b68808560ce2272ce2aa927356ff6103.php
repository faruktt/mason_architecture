<?php $__env->startSection('page-title', 'Edit Team Member'); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><span class="card-title">Edit: <?php echo e($team->name); ?></span></div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.team.update', $team)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $team->name)); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Role *</label>
                            <select name="role" class="form-select" required>
                                <?php $__currentLoopData = ['Partner','Associate','Director','Senior Architect','Architect']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role); ?>" <?php echo e(old('role', $team->role) == $role ? 'selected' : ''); ?>><?php echo e($role); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Title / Position</label>
                            <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $team->title)); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Office</label>
                            <select name="office" class="form-select">
                                <?php $__currentLoopData = ['Copenhagen','New York','London','Barcelona','Los Angeles','Shanghai','Zürich']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($office); ?>" <?php echo e(old('office', $team->office) == $office ? 'selected' : ''); ?>><?php echo e($office); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $team->email)); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">LinkedIn URL</label>
                            <input type="url" name="linkedin" class="form-control" value="<?php echo e(old('linkedin', $team->linkedin)); ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Bio</label>
                            <textarea name="bio" class="form-control" rows="5"><?php echo e(old('bio', $team->bio)); ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Photo</label>
                            <?php if($team->photo): ?>
                            <div class="mb-2"><img src="<?php echo e(asset('storage/'.$team->photo)); ?>" style="height:70px;border-radius:50%;object-fit:cover;" alt="<?php echo e($team->name); ?>"></div>
                            <?php endif; ?>
                            <input type="file" name="photo" class="form-control" accept="image/*">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_partner" id="is_partner" value="1" <?php echo e($team->is_partner ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="is_partner"><strong>Mark as Partner</strong></label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4"><i class="bi bi-check-lg me-1"></i> Update Member</button>
                        <a href="<?php echo e(route('admin.team.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('admin.team.destroy', $team)); ?>" method="POST" onsubmit="return confirm('Remove this team member?')">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-outline-danger w-100"><i class="bi bi-trash me-1"></i> Remove Member</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/admin/team/edit.blade.php ENDPATH**/ ?>