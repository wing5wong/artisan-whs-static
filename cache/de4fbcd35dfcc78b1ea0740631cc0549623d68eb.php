 

<?php $__env->startSection('title', $page->title); ?> 

<?php $__env->startSection('content'); ?>
    <h1 class="decorated py-3 mb-4"><?php echo e($page->title); ?></h1>

     <?php if($page->image): ?>
    <!--<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover; height: 250px; width: 100%;">-->
    <img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover;width: 100%;"> <?php endif; ?> <?php echo $__env->yieldContent('postContent'); ?>


    <div class="row">
<?php $__currentLoopData = $prefects->groupBy('category'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $these=>$people): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-4">
<h3><?php echo $these; ?></h3>
<?php echo $people->last()->title; ?>

<img src="<?php echo e($people->last()->image); ?>" />
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    

    <?php echo $__env->make('_partials.lastReviewed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\whs-webiste\source/_layouts/prefects.blade.php ENDPATH**/ ?>