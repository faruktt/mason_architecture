<?php $__env->startSection('title', 'Projects — BIG'); ?>

<?php $__env->startSection('content'); ?>


<section class="section">
    <div class="container mx-auto w-6/12 mb-16">
        <div class="carousel w-full rounded">
             <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div id="slide1" class="carousel-item relative w-full">
                <img src="<?php echo e(asset('storage/'.$project->cover_image)); ?>" alt="<?php echo e($project->title); ?>" class="w-full h-[500px]" />
                <div class="absolute left-0 bottom-0 bg-[#354E4A] text-center p-3 w-full">
                    <h1 class="text-2xl text-white font-medium"><?php echo e($project->title); ?> at <?php echo e($project->location); ?><?php echo e($project->country ? ', '.$project->country : ''); ?></h1>
                </div>
                <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                    <a href="#slide4" class="btn btn-circle">❮</a>
                    <a href="#slide2" class="btn btn-circle">❯</a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">No projects found.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/frontend/projects/index.blade.php ENDPATH**/ ?>