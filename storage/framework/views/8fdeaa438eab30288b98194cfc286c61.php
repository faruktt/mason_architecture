
<?php $__env->startSection('page-title', 'Team Members'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="bi bi-people-fill me-2"></i>Team Members (<?php echo e($team->total()); ?>)</span>
        <a href="<?php echo e(route('admin.team.create')); ?>" class="btn btn-accent">
            <i class="bi bi-plus-lg me-1"></i> Add Member
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Member</th>
                    <th>Role / Title</th>
                    <th>Office</th>
                    <th>Partner</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <?php if($member->photo): ?>
                                <img src="<?php echo e(asset('storage/'.$member->photo)); ?>" style="width:40px;height:40px;border-radius:50%;object-fit:cover;" alt="<?php echo e($member->name); ?>">
                            <?php else: ?>
                                <div style="width:40px;height:40px;border-radius:50%;background:#0a0a0a;color:#e8ff00;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:15px;"><?php echo e(strtoupper(substr($member->name,0,1))); ?></div>
                            <?php endif; ?>
                            <strong><?php echo e($member->name); ?></strong>
                        </div>
                    </td>
                    <td>
                        <div style="font-size:13px;"><?php echo e($member->role); ?></div>
                        <div style="font-size:11px;color:#999;"><?php echo e($member->title); ?></div>
                    </td>
                    <td style="font-size:13px;"><?php echo e($member->office ?? '—'); ?></td>
                    <td>
                        <?php if($member->is_partner): ?>
                            <span class="badge-status badge-published">Yes</span>
                        <?php else: ?>
                            <span style="color:#ccc;font-size:13px;">No</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($member->is_active): ?>
                            <i class="bi bi-check-circle-fill" style="color:#10b981;"></i>
                        <?php else: ?>
                            <i class="bi bi-x-circle-fill" style="color:#ef4444;"></i>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="action-btns">
                            <a href="<?php echo e(route('admin.team.edit', $member)); ?>" class="btn-edit"><i class="bi bi-pencil"></i></a>
                            <form action="<?php echo e(route('admin.team.destroy', $member)); ?>" method="POST" onsubmit="return confirm('Remove this team member?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="6" class="text-center py-4 text-muted">No team members found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($team->hasPages()): ?>
    <div class="card-body pt-0"><?php echo e($team->links()); ?></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/admin/team/index.blade.php ENDPATH**/ ?>