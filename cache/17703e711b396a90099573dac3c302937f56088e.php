 
<?php $__env->startSection('title', $page->title); ?> 
<?php $__env->startSection('content'); ?>
<h1 class="decorated py-3 mb-4"><?php echo e($page->title); ?></h1>

 <?php if($page->image): ?>
<!--<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover;width: 100%;"> <?php endif; ?> <?php echo $__env->yieldContent('postContent'); ?>




<?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<details>
<summary>
    <h2 class="decorated d-table mt-5 mb-2"><?php echo e($facility->title); ?></h2> 
</summary>

<?php echo $facility; ?>

</details>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $__env->make('_partials.lastReviewed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php if($page->comments): ?>
    <?php echo $__env->make('_partials.comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php else: ?>
<p>Comments are not enabled for this post.</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('_layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\whs-webiste\source/_layouts/facilities.blade.php ENDPATH**/ ?>