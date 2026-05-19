<?php $__env->startSection('title', 'News — BIG'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="container">
        <div class="section-label" style="color:var(--accent);">Latest</div>
        <h1>News & Updates</h1>
        <p>Stories, announcements, and project updates from BIG.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <?php if($news->count()): ?>

        <!-- Featured first article -->
        <?php $first = $news->first(); ?>
        <a href="<?php echo e(route('news.show', $first->slug)); ?>" style="text-decoration:none;color:inherit;display:block;margin-bottom:48px;">
            <div class="row g-4 align-items-center">
                <div class="col-md-7">
                    <div style="aspect-ratio:16/9;border-radius:16px;overflow:hidden;background:linear-gradient(135deg,#1a1a2e,#16213e);">
                        <?php if($first->cover_image): ?>
                        <img src="<?php echo e(asset('storage/'.$first->cover_image)); ?>" style="width:100%;height:100%;object-fit:cover;transition:transform 0.4s;" alt="<?php echo e($first->title); ?>">
                        <?php else: ?>
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;"><i class="bi bi-newspaper" style="font-size:56px;color:rgba(255,255,255,0.1);"></i></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-5">
                    <span style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#bbb;font-weight:600;"><?php echo e($first->category ?? 'News'); ?></span>
                    <h2 style="font-size:clamp(22px,3vw,32px);font-weight:800;letter-spacing:-1px;line-height:1.2;margin:10px 0 12px;"><?php echo e($first->title); ?></h2>
                    <p style="font-size:15px;color:#777;line-height:1.7;"><?php echo e($first->excerpt); ?></p>
                    <div style="margin-top:16px;font-size:13px;color:#bbb;"><?php echo e($first->published_at?->format('d M Y')); ?></div>
                    <div style="margin-top:16px;" class="btn-big">Read More <i class="bi bi-arrow-right"></i></div>
                </div>
            </div>
        </a>

        <div class="divider"></div>

        <!-- Rest of articles -->
        <div class="row g-4">
            <?php $__currentLoopData = $news->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <a href="<?php echo e(route('news.show', $article->slug)); ?>" class="news-card">
                    <div class="news-img">
                        <?php if($article->cover_image): ?>
                        <img src="<?php echo e(asset('storage/'.$article->cover_image)); ?>" alt="<?php echo e($article->title); ?>">
                        <?php else: ?>
                        <div style="width:100%;height:100%;background:linear-gradient(135deg,#1a1a2e,#16213e);display:flex;align-items:center;justify-content:center;">
                            <i class="bi bi-newspaper" style="font-size:36px;color:rgba(255,255,255,0.1);"></i>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="news-body">
                        <div class="news-cat"><?php echo e($article->category ?? 'News'); ?></div>
                        <div class="news-title"><?php echo e($article->title); ?></div>
                        <div class="news-date"><?php echo e($article->published_at?->format('d M Y')); ?></div>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($news->hasPages()): ?>
        <div class="mt-5 d-flex justify-content-center">
            <?php echo e($news->links()); ?>

        </div>
        <?php endif; ?>

        <?php else: ?>
        <div class="text-center py-5">
            <i class="bi bi-newspaper" style="font-size:56px;color:#ddd;"></i>
            <p class="mt-3 text-muted">No news articles published yet.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/frontend/news/index.blade.php ENDPATH**/ ?>