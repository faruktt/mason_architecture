
<?php $__env->startSection('title', 'News | Bjarke Ingels Group'); ?>

<?php $__env->startSection('content'); ?>
<style>/* ===== NEWS ===== */
        .news-grid {
            padding: 0 60px 80px;
        }

        .news-featured {
            display: flex;
            gap: 40px;
            padding: 40px 0;
            border-bottom: 1px solid #e8e8e8;
            margin-bottom: 40px;
            text-decoration: none;
            color: #000;
        }

        .news-featured-img {
            width: 50%;
            flex-shrink: 0;
            aspect-ratio: 16/9;
            object-fit: cover;
            background: #f0f0f0;
        }

        .news-featured-info { flex: 1; padding-top: 8px; }

        .news-cat-label {
            font-size: 11px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #999;
            margin-bottom: 10px;
        }

        .news-featured-title {
            font-size: 20px;
            font-weight: 400;
            line-height: 1.3;
            color: #000;
            margin-bottom: 12px;
        }

        .news-featured-excerpt {
            font-size: 13px;
            line-height: 1.65;
            color: #555;
        }

        .news-featured-date {
            font-size: 11px;
            color: #999;
            margin-top: 16px;
        }

        .news-list { }

        .news-list-row {
            display: flex;
            gap: 24px;
            padding: 20px 0;
            border-bottom: 1px solid #e8e8e8;
            text-decoration: none;
            color: #000;
            align-items: flex-start;
        }

        .news-list-row:hover { opacity: 0.7; }

        .news-list-thumb {
            width: 120px;
            height: 80px;
            object-fit: cover;
            flex-shrink: 0;
            background: #f0f0f0;
            display: block;
        }

        .news-list-title {
            font-size: 13px;
            font-weight: 400;
            line-height: 1.4;
            margin-bottom: 6px;
        }

        .news-list-date {
            font-size: 11px;
            color: #999;
        } </style>
<div class="news-grid" style="padding-top:40px;">

<?php $first = $news->first(); ?>

<?php if($first): ?>

<a href="<?php echo e(route('news.show', $first->slug)); ?>" class="news-featured">
    <?php if($first->cover_image): ?>
        <img class="news-featured-img" src="<?php echo e(asset('storage/'.$first->cover_image)); ?>" alt="<?php echo e($first->title); ?>">
    <?php else: ?>
        <div class="news-featured-img" style="background:#f0f0f0;display:flex;align-items:center;justify-content:center;font-size:11px;color:#ccc;letter-spacing:2px;text-transform:uppercase;">BIG</div>
    <?php endif; ?>
    <div class="news-featured-info">
        <div class="news-cat-label"><?php echo e($first->category ?? 'News'); ?></div>
        <div class="news-featured-title"><?php echo e($first->title); ?></div>
        <?php if($first->excerpt): ?>
        <div class="news-featured-excerpt"><?php echo e(\Illuminate\Support\Str::limit($first->excerpt, 140)); ?></div>
        <?php endif; ?>
        <div class="news-featured-date"><?php echo e($first->published_at?->format('d M Y')); ?></div>
    </div>
</a>
<?php endif; ?>


<div class="news-list">
    <?php $__currentLoopData = $news->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('news.show', $article->slug)); ?>" class="news-list-row">
        <?php if($article->cover_image): ?>
            <img class="news-list-thumb" src="<?php echo e(asset('storage/'.$article->cover_image)); ?>" alt="<?php echo e($article->title); ?>">
        <?php else: ?>
            <div class="news-list-thumb" style="display:flex;align-items:center;justify-content:center;font-size:10px;color:#ccc;">BIG</div>
        <?php endif; ?>
        <div>
            <div class="news-cat-label" style="margin-bottom:5px;"><?php echo e($article->category ?? 'News'); ?></div>
            <div class="news-list-title"><?php echo e($article->title); ?></div>
            <div class="news-list-date"><?php echo e($article->published_at?->format('d M Y')); ?></div>
        </div>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php if($news->isEmpty()): ?>
<div class="empty-msg">No news articles published yet.</div>
<?php endif; ?>

<?php if($news->hasPages()): ?>
<div style="padding:30px 0;"><?php echo e($news->links()); ?></div>
<?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/frontend/news/index.blade.php ENDPATH**/ ?>