 
<?php $__env->startSection('title', $page->title); ?> 
<?php $__env->startSection('content'); ?>
<h1 class="decorated py-3 mb-4"><?php echo e($page->title); ?></h1>

 <?php if($page->image): ?>
<!--<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover;width: 100%;"> <?php endif; ?> <?php echo $__env->yieldContent('postContent'); ?>


<h2 class="decorated d-table mt-5 mb-2">Current Vacancies</h2>
<?php $__empty_1 = true; $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$vacancy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <h3><?php echo e($k); ?><?php echo e($vacancy->title); ?></h3>
        <p>Applications close: <?php echo e(date('F j, Y', $vacancy->date)); ?></p>

    </div>
    <div class="col-sm-12 col-md-6">
        <a href="mailto:<?php echo e($vacancy->email ?: " principal@whs.ac.nz "); ?>?subject=Application:<?php echo e($vacancy->title); ?>" class="btn btn-light mb-5">Apply for this position.</a>
    </div>
    <div class="col-12">
        <?php echo $vacancy; ?>

    </div>
</div>

<hr >

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<strong>SORRY, BUT THERE ARE CURRENTLY NO VACANCIES.</strong>
<hr> <?php endif; ?>


<?php echo $__env->make('_partials.lastReviewed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\whs-webiste\source/_layouts/working-at-whs.blade.php ENDPATH**/ ?>