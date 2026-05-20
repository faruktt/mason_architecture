
<?php $__env->startSection('title', 'People — BIG'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .partner-item { cursor: pointer; border-bottom: 1px solid #ddd; padding: 15px 0; transition: 0.3s; }
    .partner-item:hover { color: var(--accent); }
    .details-box { display: none; padding: 20px 0; background: #fafafa; }
    .profile-img { width: 15%; height: auto; object-fit: cover; }
    .name-text { font-weight: bold; font-size: 1.2rem; }
    .role-text { color: #666; font-size: 0.9rem; }
    .page-big-heading {
            padding: 60px 60px 48px;
        }

        .page-big-heading h1 {
            font-size: clamp(64px, 10vw, 120px);
            font-weight: 400;
            letter-spacing: -0.02em;
            line-height: 0.95;
            color: #000;
            text-transform: uppercase;
        }
</style>

<div class="container py-5 p-10">
    <div class="page-big-heading">
    <h1>PEOPLE</h1>
</div>
    
    <div class="row mt-5">
        <!-- বাম পাশের পার্টনার লিস্ট -->
        <div class="col-md-6" x-data="{ selected: null }">
            <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="partner-item" @click="selected = (selected === <?php echo e($index); ?> ? null : <?php echo e($index); ?>)">
                    <span>+</span> <?php echo e($person->name); ?>

                </div>

                <!-- ক্লিক করলে এই অংশটি দেখাবে (মোবাইল বা ডেস্কটপ যেখানেই হোক) -->
                <div class="d-md-none" x-show="selected === <?php echo e($index); ?>">
                    <div class="p-3">
                        <img src="<?php echo e(asset('storage/'.$person->photo)); ?>" class="profile-img mb-3">
                        <p><?php echo e($person->bio); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- ডান পাশের ডিটেইলস প্যানেল (শুধুমাত্র ডেস্কটপের জন্য) -->
        <div class="col-md-6 d-none d-md-block">
            <div x-data="{ selected: null }" @change-person.window="selected = $event.detail">
                <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div x-show="selected === <?php echo e($index); ?>">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1 pe-4">
                                <h3><?php echo e($person->name); ?></h3>
                                <p class="text-muted"><?php echo e($person->title); ?></p>
                                <p><?php echo e($person->bio); ?></p>
                            </div>
                            <div style="width: 300px;">
                                <img src="<?php echo e(asset('storage/'.$person->photo)); ?>" class="profile-img" alt="<?php echo e($person->name); ?>">
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/frontend/people.blade.php ENDPATH**/ ?>