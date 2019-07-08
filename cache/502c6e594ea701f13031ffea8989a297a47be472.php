 
<?php $__env->startSection('title', $page->title); ?> 
<?php $__env->startSection('content'); ?>
<h1 class="decorated py-3 mb-4"><?php echo e($page->title); ?></h1>


 <?php if($page->image): ?>
<!--<img src="<?php echo e($page->image); ?>" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="<?php echo e($page->image); ?>" style="object-fit: cover;width: 100%;">
 <?php endif; ?>

<?php echo $__env->yieldContent('postContent'); ?>


<h2 class="decorated d-table my-5">Subject Areas</h2>
<?php $__currentLoopData = $subject_areas->filter(function($subject_area) use ($page){
    return $subject_area->faculty == $page->title;
}); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <details>
        <summary>
            <h3 class="d-table"><?php echo e($subject->title); ?></h3>
        </summary>
        <?php
            $subjectCourses  = $courses->filter(function($course) use ($subject){
                return $course->subject_area == $subject->title;
            });
        ?>
        <ul>
        <?php $__currentLoopData = $subjectCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e($course->getPath()); ?>"><?php echo e($course->level); ?> <?php echo e($course->name); ?></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <a href="<?php echo e($subject->getPath()); ?>" class="btn btn-light mb-5">More information</a>
    </details>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php echo $__env->make('_partials.lastReviewed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\whs-webiste\source/_layouts/faculty.blade.php ENDPATH**/ ?>