
<?php $__env->startSection('title', 'Sustainability | Bjarke Ingels Group'); ?>

<?php $__env->startSection('content'); ?>
<style>.sust-section {
            padding: 0 60px 60px;
        }

        .sust-image {
            width: 100%;
            max-width: 700px;
            margin: 0 auto 20px;
            display: block;
            aspect-ratio: 4/3;
            object-fit: cover;
        }

        .sust-section-label {
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #000;
            margin-bottom: 14px;
        }

        .sust-section p {
            font-size: 13px;
            line-height: 1.65;
            color: #000;
            margin-bottom: 12px;
            max-width: 700px;
        }</style>
<div class="page-big-heading">
    <h1>Sustainability</h1>
</div>


<div class="sust-section">
    <div style="max-width:700px;margin:0 auto 20px;aspect-ratio:4/3;background:#e8e8e8;display:flex;align-items:center;justify-content:center;">
        <span style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:#999;">The Plus · Norway</span>
    </div>
    <div class="sust-section-label">Sustainable Manufacturing</div>
    <p>The Plus is the first factory building in the world that meets the BREEAM Outstanding certification's strict environmental requirements for safe, healthy, and good physical working environments. Constructed in just 18 months, the 7,000 m² production facility is made of local PEFC-certified cross-laminated timber (CLT) and glued-laminated timber (glulam), low-carbon concrete, and recycled steel.</p>
    <p>The square roof above the office area is one of only two concrete elements in the building alongside the foundation, both made from a mixture of high-strength and low-carbon concrete to minimize emissions and material use.</p>
</div>

<div style="border-top:1px solid #e8e8e8;">
    <?php $__currentLoopData = [
        ['Google Bay View','Net Zero Campus','The world\'s largest net-zero carbon campus, featuring 50,000 dragonscale solar panels and a geothermal pile field providing 90% of heating and cooling needs.','Mountain View, United States'],
        ['CopenHill','Waste to Energy','The cleanest waste-to-energy plant in the world, designed as a social infrastructure that doubles as a recreational landmark — with a ski slope, hiking trail, and climbing wall on its façade.','Copenhagen, Denmark'],
        ['Gelephu Mindfulness City','Carbon Negative City','A 2,500 km² special administrative region in Bhutan guided by the country\'s Gross National Happiness principles — designed to be carbon negative, biodiversity positive, and culturally rooted.','Gelephu, Bhutan'],
        ['BIG HQ','Low Carbon Construction','BIG\'s new headquarters uses Uni-Green, a novel type of recycled-content concrete, reducing embodied carbon by 40% compared to conventional concrete construction.','Copenhagen, Denmark'],
    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="sust-section" style="padding-top:40px;border-bottom:1px solid #e8e8e8;">
        <div class="sust-section-label"><?php echo e($p[1]); ?></div>
        <div style="font-size:11px;color:#999;letter-spacing:.06em;text-transform:uppercase;margin-bottom:14px;"><?php echo e($p[0]); ?> · <?php echo e($p[3]); ?></div>
        <p><?php echo e($p[2]); ?></p>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/frontend/sustainability.blade.php ENDPATH**/ ?>