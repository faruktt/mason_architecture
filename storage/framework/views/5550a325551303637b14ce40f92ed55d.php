
<?php $__env->startSection('title', 'About | Bjarke Ingels Group'); ?>

<?php $__env->startSection('content'); ?>
<style> .about-text-cols {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            padding: 0 60px 60px;
            border-bottom: 1px solid #e8e8e8;
        }

        .about-text-col {
            padding-right: 40px;
        }

        .about-text-col:last-child { padding-right: 0; }

        .about-text-col p {
            font-size: 13px;
            line-height: 1.65;
            color: #000;
            margin-bottom: 16px;
        }

        .about-text-col .author {
            font-size: 12px;
            color: #000;
            margin-top: 20px;
            line-height: 1.5;
        }

        .about-image-strip {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            height: 200px;
            overflow: hidden;
        }

        .about-image-strip .strip-item {
            background: #e0e0e0;
            border-right: 1px solid #fff;
            overflow: hidden;
        }

        .about-image-strip .strip-item:last-child { border-right: none; }

        .about-image-strip .strip-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
         /* ===== BIG PAGE HEADINGS (About, Sustainability, People, Careers) ===== */
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
        }</style>
<div class="page-big-heading">
    <h1>About</h1>
</div>

<div class="about-text-cols">
    <div class="about-text-col">
        <p>The escalating complexity of the world and the accelerating speed of change exceed any individual's capacity to comprehend. For architects operating today, the Golden Ratio is no longer the standard — rather, the UN's 17 Sustainable Development Goals are. From a single elegant equation, architects are now held to multidimensional success criteria with almost infinite variables.</p>
        <p>Since sustainability is inherently a question of complex systems, circular design, and holistic thinking, no single person holds the solution. As architects and urbanists, we must team with scientists, engineers with biologists, politicians with entrepreneurs, to combine skill sets and perspectives, knowledge and sensibility, to match the complexity of the challenges we face. As future formgivers, we aren't defined by our individual talents or singular skill sets — but rather by our capacity to pool the skills of the many to give our future form.</p>
    </div>
    <div class="about-text-col">
        <p>BIG has grown organically over the last two decades from a founder, to a family, to a force of 700. Our latest transformation is the BIG LEAP: Bjarke Ingels Group of Landscape, Engineering, Architecture, Planning, and Products. A plethora of in-house perspectives allows us to see what none of us would be able to see on our own. The sum of our individual talents becomes our collective creative genius. A small step for each of us becomes a BIG LEAP for all of us.</p>
        <div class="author">
            Bjarke Ingels<br>
            Founder &amp; Creative Director
        </div>
    </div>
</div>

<div class="about-image-strip">
    <?php for($i = 0; $i < 6; $i++): ?>
    <div class="strip-item" style="background: hsl(<?php echo e($i * 30); ?>, 5%, <?php echo e(85 - $i * 3); ?>%);"></div>
    <?php endfor; ?>
</div>

<div style="padding:48px 60px 60px;">
    <div style="font-size:11px;letter-spacing:.08em;text-transform:uppercase;color:#999;margin-bottom:24px;">Offices</div>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:32px 40px;">
        <?php $__currentLoopData = ['Copenhagen · 2005','New York · 2010','London · 2016','Barcelona · 2019','Los Angeles · 2022','Shanghai','Zürich','Riyadh']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="font-size:13px;color:#000;"><?php echo e($office); ?></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/frontend/about.blade.php ENDPATH**/ ?>