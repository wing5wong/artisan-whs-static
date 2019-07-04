 
<?php $__env->startSection('title', $page->title); ?> 
<?php $__env->startSection('content'); ?>
<h1 class="decorated py-3 mb-4"><?php echo e($page->title); ?></h1>

 <?php if($page->image): ?>
<!--<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover;width: 100%;"> <?php endif; ?> <?php echo $__env->yieldContent('postContent'); ?>


<h2 class="decorated d-table">Board Members</h2>
<div class="row no-gutters">
    <?php $__currentLoopData = $board_members->filter(function($member){ return $member->category == "Board Member";}); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-12 col-md-4 p-5">
        <h3><?php echo e($member->title); ?> <br><small><?php echo e($member->position); ?></small></h3>
      <?php if($member->image): ?>  
    <img src="<?php echo e($member->image); ?>" alt="">
    <?php endif; ?>
    </div>
    <div class="col-12 col-md-8 p-5">
        <?php echo $member; ?>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<h2 class="decorated d-table">Co-opted Members</h2>
<div class="row no-gutters">
    <?php $__currentLoopData = $board_members->filter(function($member){ return $member->category == "Co-opted Member";}); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-12 col-md-4 p-5">
            <h3><?php echo e($member->title); ?> <br><small><?php echo e($member->position); ?></small></h3>
    
            <img src="<?php echo e($member->image); ?>" alt="">
        </div>
        <div class="col-12 col-md-8 p-5">
            <?php echo $member; ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<h2 class="decorated d-table">Also in Attendance</h2>
<div class="row no-gutters">
    <?php $__currentLoopData = $board_members->filter(function($member){ return $member->category == "Also in Attendance";}); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-12 col-md-4 p-5">
            <h3><?php echo e($member->title); ?> <br><small><?php echo e($member->position); ?></small></h3>
    
            <img src="<?php echo e($member->image); ?>" alt="">
        </div>
        <div class="col-12 col-md-8 p-5">
            <?php echo $member; ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php echo $__env->make('_partials.lastReviewed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\whs-webiste\source/_layouts/board_of_trustees.blade.php ENDPATH**/ ?>