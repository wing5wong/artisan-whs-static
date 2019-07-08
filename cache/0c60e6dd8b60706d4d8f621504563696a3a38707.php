 

<?php $__env->startSection('title', $page->title); ?> 

<?php $__env->startSection('content'); ?>
    <h1 class="decorated py-3 mb-4"><?php echo e($page->title); ?></h1>

    
    <?php if($page->image): ?>
    <!--<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover; height: 250px; width: 100%;">-->
    <img src="<?php echo e($page->image); ?>"  style="object-fit: cover; max-width:100%">
    <?php endif; ?>
    
    <?php echo $__env->yieldContent('postContent'); ?>

 
    <?php echo $__env->make('_partials.lastReviewed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\whs-webiste\source/_layouts/post.blade.php ENDPATH**/ ?>