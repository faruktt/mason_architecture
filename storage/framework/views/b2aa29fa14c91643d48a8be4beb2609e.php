<?php $__env->startSection('title', 'Careers — BIG'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="container">
        <div class="section-label" style="color:var(--accent);">Join Us</div>
        <h1>Careers</h1>
        <p><?php echo e($careers->count()); ?> open positions across our global studios.</p>
    </div>
</div>

<section class="section">
    <div class="container">

        <!-- Filters -->
        <div class="row g-3 mb-5">
            <div class="col-md-6">
                <div class="section-label">Filter by Department</div>
                <div class="filter-pills">
                    <a href="<?php echo e(route('careers.index')); ?>" class="filter-pill <?php echo e(!request('dept') ? 'active' : ''); ?>">All</a>
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('careers.index', ['dept' => $dept])); ?>" class="filter-pill <?php echo e(request('dept') == $dept ? 'active' : ''); ?>"><?php echo e($dept); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-label">Filter by Location</div>
                <div class="filter-pills">
                    <a href="<?php echo e(route('careers.index')); ?>" class="filter-pill <?php echo e(!request('loc') ? 'active' : ''); ?>">All</a>
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('careers.index', ['loc' => $loc])); ?>" class="filter-pill <?php echo e(request('loc') == $loc ? 'active' : ''); ?>"><?php echo e($loc); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <!-- Job Listings -->
        <div class="d-flex flex-column gap-3">
            <?php $__empty_1 = true; $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('careers.show', $career->id)); ?>" class="career-item">
                <div class="career-icon">
                    <i class="bi bi-briefcase"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="career-title"><?php echo e($career->title); ?></div>
                    <div class="career-meta"><?php echo e($career->department); ?></div>
                </div>
                <div class="career-tags">
                    <span class="career-tag loc"><i class="bi bi-geo-alt me-1"></i><?php echo e($career->location); ?></span>
                    <span class="career-tag type"><?php echo e($career->type); ?></span>
                </div>
                <i class="bi bi-arrow-right" style="color:#ccc;font-size:18px;"></i>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-5">
                <i class="bi bi-briefcase" style="font-size:48px;color:#ddd;"></i>
                <p class="mt-3 text-muted">No open positions at the moment. Check back soon.</p>
            </div>
            <?php endif; ?>
        </div>

        <!-- Info Strip -->
        <div class="row g-4 mt-5 pt-4" style="border-top:1px solid var(--border);">
            <div class="col-md-4">
                <i class="bi bi-globe" style="font-size:28px;color:var(--black);"></i>
                <h5 style="font-weight:700;margin:12px 0 6px;">Global Offices</h5>
                <p style="font-size:13px;color:#777;line-height:1.7;">Work from Copenhagen, New York, London, Barcelona or Los Angeles.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-people" style="font-size:28px;color:var(--black);"></i>
                <h5 style="font-weight:700;margin:12px 0 6px;">60+ Nationalities</h5>
                <p style="font-size:13px;color:#777;line-height:1.7;">A truly diverse team bringing perspectives from around the world.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-lightning" style="font-size:28px;color:var(--black);"></i>
                <h5 style="font-weight:700;margin:12px 0 6px;">Ambitious Work</h5>
                <p style="font-size:13px;color:#777;line-height:1.7;">Work on the most challenging and celebrated projects in the world.</p>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/frontend/careers/index.blade.php ENDPATH**/ ?>