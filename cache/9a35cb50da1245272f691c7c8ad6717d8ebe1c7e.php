<?php $__env->startSection('title', $page->title); ?>

<?php $__env->startSection('content'); ?>
<h1 class="decorated py-3 mb-4"><?php echo e($page->title); ?></h1>

<?php echo $page; ?>


<?php if($page->type): ?>
<h3 class="d-inline">Course Type:</h3> <?php echo e($page->type); ?> <br><br>
<?php endif; ?>

<?php if($page->credits): ?>
<h3 class="d-inline">Credits:</h3> <?php echo e($page->credits); ?> <br><br>
<?php endif; ?>

<?php if($page->course_level): ?>
<h3 class="d-inline">Level:</h3> <?php echo e($page->course_level); ?> <br><br>
<?php endif; ?>

<?php if($page->course_duration): ?>
<h3 class="d-inline">Duration:</h3> <?php echo e($page->course_duration); ?> <br><br>
<?php endif; ?>

<?php if($page->background): ?>
<h3 class="d-inline">Purpose:</h3> <?php echo e($page->background); ?> <br><br>
<?php endif; ?>

<?php if($page->entry_requirements): ?>
<h3 class="d-inline">Entry Requirements:</h3> <?php echo e($page->entry_requirements); ?> <br><br>
<?php endif; ?>

<?php if($page->course_fees): ?>
<h3 class="d-inline">Course Contribution:</h3> <?php echo e($page->course_fees); ?> <br><br>
<?php endif; ?>

<?php if($page->assessment_type): ?>
<h3 class="d-inline">Assessment:</h3> <?php echo e($page->assessment_type); ?> <br><br>
<?php endif; ?>

<?php if(($page->leads_to) and(is_array($page->leads_to))): ?>
<h3 class="d-inline">Leads To:</h3> <?php $__currentLoopData = $page->leads_to; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="/courses/<?php echo e(trim($leads)); ?>/"><?php echo e(trim($leads)); ?></a> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  <br><br>
<?php endif; ?>


<?php if($page->ue_approved): ?>
<h3 class="d-inline">U.E. Approved:</h3> <?php echo e($page->ue_approved ? "Yes" : "No"); ?> <br><br> 
<?php endif; ?>

<?php if($page->endorsement): ?>
<h3 class="d-inline">Endorsement:</h3> <?php echo e($page->endorsement ? "Yes" : "No"); ?> <br><br> 
<?php endif; ?>

<?php if($page->invitation_only): ?>
<h3 class="d-inline">Invitation Only:</h3> <?php echo e($page->invitation_only ? "Yes" : "No"); ?> <br><br> 
<?php endif; ?>

<?php
$courseAssessments = $assessments->filter(function($assessment) use ($page){
    if(!is_array($assessment->categories)){ return false; }
    foreach($assessment->categories as $c){
        if(strtolower($c) == strtolower($page->title)){
            return true;
        }
    }
    return false;
});
?>
<?php if(count($courseAssessments)>0): ?>
<h3 class="d-inline">Available Standards:</h3>
Some or all of the following will be offered

<table class="table">
<thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Level</th>
        <th>Credits</th>
        <th>Assessment</th>
    </tr>
</thead>
<tbody>
<?php $__currentLoopData = $courseAssessments->sortBy('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assessment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td>
        <a href="<?php echo e($assessment->pdf); ?>"><?php echo e($assessment->title); ?></a>
    </td>
    <td>
            <?php echo e($assessment->description); ?>

    </td>
    <td>
            <?php echo e($assessment->level); ?>

    </td>
    <td>
            <?php echo e($assessment->credits); ?>

    </td>
    <td>
            <?php echo e($assessment->assessment); ?>

    </td>
    
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
<br><br>
<?php endif; ?>

<?php if($page->notes): ?>
<h3 class="d-inline">Notes:</h3> <?php echo e($page->notes); ?> <br><br>
<?php endif; ?>


Other courses in <?php echo e($page->subject_area); ?>:

<?php
$subjectAreaCourses = $courses->filter(function($c) use ($page){
    return $c->subject_area == $page->subject_area;
});
?>

<ul>
<?php $__currentLoopData = $subjectAreaCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li>
<a href="<?php echo e($c->getPath()); ?>"><?php echo e($c->title); ?></a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>


<?php echo $__env->make('_partials.lastReviewed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\whs-webiste\source/_layouts/course.blade.php ENDPATH**/ ?>