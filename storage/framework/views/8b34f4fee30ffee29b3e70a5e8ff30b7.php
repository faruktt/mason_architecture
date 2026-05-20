
<?php $__env->startSection('page-title', 'Careers / Jobs'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="bi bi-briefcase-fill me-2"></i>Job Postings (<?php echo e($careers->total()); ?>)</span>
        <a href="<?php echo e(route('admin.careers.create')); ?>" class="btn btn-accent"><i class="bi bi-plus-lg me-1"></i> Post a Job</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Location</th>
                    <th>Type</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><strong><?php echo e($career->title); ?></strong></td>
                    <td><span style="font-size:12px;background:#f0f0f0;padding:3px 8px;border-radius:20px;"><?php echo e($career->department); ?></span></td>
                    <td style="font-size:13px;"><?php echo e($career->location); ?></td>
                    <td style="font-size:13px;"><?php echo e($career->type); ?></td>
                    <td style="font-size:12px;color:#888;"><?php echo e($career->deadline ? $career->deadline->format('d M Y') : '—'); ?></td>
                    <td><span class="badge-status badge-<?php echo e($career->status); ?>"><?php echo e(ucfirst($career->status)); ?></span></td>
                    <td>
                        <div class="action-btns">
                            <a href="<?php echo e(route('admin.careers.edit', $career)); ?>" class="btn-edit"><i class="bi bi-pencil"></i></a>
                            <form action="<?php echo e(route('admin.careers.destroy', $career)); ?>" method="POST" onsubmit="return confirm('Delete this job posting?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="7" class="text-center py-4 text-muted">No job postings found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($careers->hasPages()): ?>
    <div class="card-body pt-0"><?php echo e($careers->links()); ?></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/admin/careers/index.blade.php ENDPATH**/ ?>