
<?php $__env->startSection('title', $career->title . ' — BIG Careers'); ?>

<?php $__env->startSection('content'); ?>
<style> .detail-top {
            padding: 48px 60px 36px;
            border-bottom: 1px solid #e8e8e8;
        }

        .detail-back {
            font-size: 11px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #999;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 24px;
        }

        .detail-back:hover { color: #000; }

        .detail-top h1 {
            font-size: 28px;
            font-weight: 400;
            letter-spacing: -0.02em;
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .detail-top .detail-sub {
            font-size: 11px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #999;
        }

        .detail-cover {
            width: 100%;
            display: block;
        }

        .detail-cover img {
            width: 100%;
            aspect-ratio: 16/9;
            object-fit: cover;
            display: block;
        }

        .detail-cover-placeholder {
            width: 100%;
            aspect-ratio: 16/9;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ccc;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .detail-body {
            display: flex;
            border-top: 1px solid #e8e8e8;
        }

        .detail-body-content {
            flex: 1;
            padding: 40px 60px 60px;
            border-right: 1px solid #e8e8e8;
            max-width: 720px;
        }

        .detail-body-content p {
            font-size: 14px;
            line-height: 1.7;
            color: #000;
            margin-bottom: 16px;
        }

        .detail-body-content h3 {
            font-size: 11px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #999;
            font-weight: 400;
            margin: 28px 0 10px;
        }

        .detail-sidebar {
            width: 260px;
            flex-shrink: 0;
            padding: 40px 30px;
        }

        .detail-meta {
            margin-bottom: 22px;
        }

        .detail-meta-label {
            font-size: 10px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #999;
            margin-bottom: 4px;
        }

        .detail-meta-val {
            font-size: 13px;
            color: #000;
        }

        .btn-apply {
            display: block;
            background: #000;
            color: #fff;
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 14px 20px;
            text-align: center;
            margin-top: 28px;
            transition: opacity 0.15s;
        }

        .btn-apply:hover { opacity: 0.7; color: #fff; }
</style>
<div class="detail-top">
    <a href="<?php echo e(route('careers.index')); ?>" class="detail-back">← Careers</a>
    <div class="detail-sub">
        <?php echo e(strtoupper($career->department)); ?> · <?php echo e(strtoupper($career->location)); ?> · <?php echo e(strtoupper($career->type)); ?>

    </div>
    <h1><?php echo e($career->title); ?></h1>
</div>

<div class="detail-body">
    <div class="detail-body-content">
        <?php if($career->description): ?>
        <p style="font-size:15px;line-height:1.65;margin-bottom:24px;"><?php echo e($career->description); ?></p>
        <?php endif; ?>

        <?php if($career->responsibilities): ?>
        <h3>Responsibilities</h3>
        <?php $__currentLoopData = explode("\n", $career->responsibilities); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(trim($line)): ?><p><?php echo e(trim($line)); ?></p><?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <?php if($career->requirements): ?>
        <h3>Requirements</h3>
        <?php $__currentLoopData = explode("\n", $career->requirements); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(trim($line)): ?><p><?php echo e(trim($line)); ?></p><?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>

    <div class="detail-sidebar">
        <div class="detail-meta">
            <div class="detail-meta-label">Position</div>
            <div class="detail-meta-val"><?php echo e($career->title); ?></div>
        </div>
        <div class="detail-meta">
            <div class="detail-meta-label">Department</div>
            <div class="detail-meta-val"><?php echo e($career->department); ?></div>
        </div>
        <div class="detail-meta">
            <div class="detail-meta-label">Location</div>
            <div class="detail-meta-val"><?php echo e($career->location); ?></div>
        </div>
        <div class="detail-meta">
            <div class="detail-meta-label">Type</div>
            <div class="detail-meta-val"><?php echo e($career->type); ?></div>
        </div>
        <?php if($career->deadline): ?>
        <div class="detail-meta">
            <div class="detail-meta-label">Deadline</div>
            <div class="detail-meta-val"><?php echo e($career->deadline->format('d M Y')); ?></div>
        </div>
        <?php endif; ?>

        <?php if($career->status === 'open'): ?>
            <?php if($career->apply_url): ?>
            <a href="<?php echo e($career->apply_url); ?>" target="_blank" class="btn-apply">Apply Now →</a>
            <?php else: ?>
            <a href="mailto:jobs@big.dk?subject=<?php echo e(urlencode('Application: '.$career->title)); ?>" class="btn-apply">Apply via Email →</a>
            <?php endif; ?>
        <?php else: ?>
        <div style="font-size:12px;color:#999;margin-top:20px;padding:14px;border:1px solid #e8e8e8;text-align:center;">
            This position is no longer open.
        </div>
        <?php endif; ?>

        <div style="font-size:11px;color:#999;margin-top:14px;text-align:center;">
            Questions? <a href="mailto:jobs@big.dk" style="color:#000;">jobs@big.dk</a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/frontend/careers/show.blade.php ENDPATH**/ ?>