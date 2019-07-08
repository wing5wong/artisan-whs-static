<?php $__env->startSection('title', $page->title); ?>
<?php $__env->startSection('content'); ?>
<h1 class="decorated py-3 mb-4"><?php echo e($page->title); ?></h1>

 <?php if($page->image): ?>
<!--<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover;width: 100%;"> <?php endif; ?> <?php echo $__env->yieldContent('postContent'); ?>



<?php $__currentLoopData = $faculties->sortBy('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<details>
<summary>
    <h2 class="decorated d-table my-5"><?php echo e($faculty->title); ?><?php if($page->maori_title): ?> | <?php echo e($page->maori_title); ?><?php endif; ?></h2>
    <?php if($faculty->intro): ?>
    <br>
    <?php echo e($faculty->intro); ?>

    <hr>
    <?php endif; ?>

</summary>

<div class="row">
    <?php $__currentLoopData = $subject_areas->filter(function($subject_area) use ($faculty){
    return $subject_area->faculty == $faculty->title;
    })->sortBy('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col col-md-6 col-lg-6">
    <details open>
            
            <summary><h5 class="d-table"><?php echo e($subject->title); ?></h5></summary>
        <?php
        $subjectCourses = $courses->filter(function($course) use ($subject){
        return $course->subject_area == $subject->title;
        });
        ?>
        <ul>
        <?php $__currentLoopData = $subjectCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e($course->getPath()); ?>"><?php echo e($course->course_level); ?> - <?php echo e($course->name); ?></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </details>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<br>
<a href="<?php echo e($faculty->getPath()); ?>" class="btn btn-light mb-5">Faculty Information</a>
</details>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $__env->make('_partials.lastReviewed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\whs-webiste\source/_layouts/faculties.blade.php ENDPATH**/ ?>