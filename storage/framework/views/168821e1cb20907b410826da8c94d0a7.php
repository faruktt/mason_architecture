<?php $__env->startSection('title', $article->title . ' — BIG'); ?>

<?php $__env->startSection('content'); ?>

<!-- Article Hero -->
<div style="background:var(--black);padding:80px 0 60px;">
    <div class="container">
        <a href="<?php echo e(route('news.index')); ?>" style="color:rgba(255,255,255,0.5);text-decoration:none;font-size:13px;"><i class="bi bi-arrow-left me-1"></i>All News</a>
        <div style="margin-top:20px;">
            <span style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:var(--accent);font-weight:600;"><?php echo e($article->category ?? 'News'); ?></span>
        </div>
        <h1 style="font-size:clamp(28px,5vw,56px);font-weight:900;letter-spacing:-2px;line-height:1.1;color:#fff;margin:12px 0;max-width:800px;"><?php echo e($article->title); ?></h1>
        <div style="font-size:13px;color:#555;"><?php echo e($article->published_at?->format('d M Y')); ?></div>
    </div>
</div>

<?php if($article->cover_image): ?>
<div style="background:#111;">
    <div class="container" style="padding-top:0;padding-bottom:0;">
        <img src="<?php echo e(asset('storage/'.$article->cover_image)); ?>" style="width:100%;max-height:520px;object-fit:cover;border-radius:0 0 16px 16px;" alt="<?php echo e($article->title); ?>">
    </div>
</div>
<?php endif; ?>

<!-- Article Content -->
<section class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <?php if($article->excerpt): ?>
                <p style="font-size:19px;line-height:1.7;color:#333;font-weight:400;margin-bottom:28px;padding-bottom:28px;border-bottom:1px solid var(--border);">
                    <?php echo e($article->excerpt); ?>

                </p>
                <?php endif; ?>

                <?php if($article->content): ?>
                <div style="font-size:16px;line-height:1.9;color:#444;">
                    <?php echo nl2br(e($article->content)); ?>

                </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-4">
                <div style="position:sticky;top:80px;">
                    <div style="background:#f8f8f8;border-radius:12px;padding:24px;margin-bottom:20px;">
                        <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#bbb;font-weight:600;margin-bottom:16px;">Article Info</div>
                        <div style="font-size:13px;color:#555;line-height:1.8;">
                            <div><strong>Published:</strong> <?php echo e($article->published_at?->format('d M Y')); ?></div>
                            <?php if($article->category): ?>
                            <div class="mt-1"><strong>Category:</strong> <?php echo e($article->category); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if($recent->count()): ?>
                    <div>
                        <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#bbb;font-weight:600;margin-bottom:16px;">More News</div>
                        <div class="d-flex flex-column gap-3">
                            <?php $__currentLoopData = $recent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('news.show', $r->slug)); ?>" style="text-decoration:none;color:inherit;display:flex;gap:12px;align-items:flex-start;">
                                <div style="width:8px;height:8px;border-radius:50%;background:var(--black);margin-top:6px;flex-shrink:0;"></div>
                                <div>
                                    <div style="font-size:13px;font-weight:600;color:var(--black);line-height:1.3;"><?php echo e($r->title); ?></div>
                                    <div style="font-size:11px;color:#bbb;margin-top:3px;"><?php echo e($r->published_at?->format('d M Y')); ?></div>
                                </div>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/frontend/news/show.blade.php ENDPATH**/ ?>