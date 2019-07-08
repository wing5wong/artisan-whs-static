 
<?php $__env->startSection('title', $page->title); ?> 
<?php $__env->startSection('content'); ?>
<h1 class="decorated py-3 mb-4"><?php echo e($page->title); ?></h1>

 <?php if($page->image): ?>
<!--<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover;width: 100%;"> <?php endif; ?> <?php echo $__env->yieldContent('postContent'); ?>



<?php $__currentLoopData = $staff->filter(function ($s) {
    return in_array("International",$s->departments);
    }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <article class="py-3">
    <h3 class="decorated py-3 mb-4">
    <?php echo e($person->title); ?>

    <span class="text-muted">
    <?php echo e($person->position); ?>

    </span>
    </h3>
    <div class="row">
    <div class="col">
        <?php if($person->image): ?>
            <img src="<?php echo e($person->image); ?>" width="255" />
        <?php endif; ?>
    </div>
    <div class="col">
    <?php echo $person; ?>

    <?php if(!empty($person->email)): ?>
    <a href="mailto:<?php echo e($person->email); ?>" class="button button--green">
    <?php echo e($person->email); ?>

    </a>
    <?php endif; ?>
    </div>
    </div>
    </article>
    
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


      <?php echo $__env->make('_partials.lastReviewed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('_layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\whs-webiste\source/_layouts/international/team.blade.php ENDPATH**/ ?>