
<?php $__env->startSection('page-title', 'Projects'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="bi bi-building me-2"></i>All Projects (<?php echo e($projects->total()); ?>)</span>
        <a href="<?php echo e(route('admin.projects.create')); ?>" class="btn btn-accent">
            <i class="bi bi-plus-lg me-1"></i> Add Project
        </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Year</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td style="color:#bbb;font-size:12px;"><?php echo e($project->id); ?></td>
                    <td>
                        <strong style="color:#1a1a1a;"><?php echo e($project->title); ?></strong>
                        <?php if($project->description): ?>
                        <div style="font-size:12px;color:#999;margin-top:2px;"><?php echo e(\Illuminate\Support\Str::limit($project->description, 60)); ?></div>
                        <?php endif; ?>
                    </td>
                    <td><span style="font-size:12px;background:#f0f0f0;padding:3px 8px;border-radius:20px;"><?php echo e($project->category); ?></span></td>
                    <td style="font-size:13px;color:#666;"><?php echo e($project->location); ?><br><span style="color:#999;font-size:11px;"><?php echo e($project->country); ?></span></td>
                    <td style="font-size:13px;"><?php echo e($project->year ?? '—'); ?></td>
                    <td>
                        <?php if($project->featured): ?>
                            <i class="bi bi-star-fill" style="color:#f59e0b;"></i>
                        <?php else: ?>
                            <i class="bi bi-star" style="color:#ccc;"></i>
                        <?php endif; ?>
                    </td>
                    <td><span class="badge-status badge-<?php echo e($project->status); ?>"><?php echo e(ucfirst($project->status)); ?></span></td>
                    <td>
                        <div class="action-btns">
                            <a href="<?php echo e(route('admin.projects.edit', $project)); ?>" class="btn-edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="<?php echo e(route('admin.projects.destroy', $project)); ?>" method="POST" onsubmit="return confirm('Delete this project?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="text-center py-4 text-muted">No projects found. <a href="<?php echo e(route('admin.projects.create')); ?>">Add one</a>.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($projects->hasPages()): ?>
    <div class="card-body pt-0">
        <?php echo e($projects->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/admin/projects/index.blade.php ENDPATH**/ ?>