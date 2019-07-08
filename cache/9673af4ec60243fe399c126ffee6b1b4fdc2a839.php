 
<?php $__env->startSection('title', $page->title); ?> 
<?php $__env->startSection('content'); ?>
<h1 class="decorated"><?php echo e($page->title); ?></h1>

 <?php if($page->image): ?>
<!--<img src="<?php echo e($page->imageCdn($page->image)); ?>" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="<?php echo e($page->image); ?>" style="object-fit: cover;width: 100%;"> <?php endif; ?> <?php echo $__env->yieldContent('postContent'); ?>

<h2 class="d-inline-block decorated">Senior Leadership Team</h2>
<div class="row">
<?php
foreach([
    "Principal",
    "Associate Principal",
    "Deputy Principal"] as $dept){
    $slt = $staff->filter(function($s) use ($dept){
        return in_array($dept,$s->departments);
    });

    foreach($slt as $person){
        ?>
        <article class="col-sm-12 col-md-6 col-lg-6 p-5">
            <div class="row">    
            <div class="col-12">
                  <h3><?php echo e($person->title); ?></h3>
                      <p class="lead"><?php echo e($person->position); ?></p>
                </div>
                <div class="col-12">
                        <img src="<?php echo e($person->image); ?>" alt="" width="600" alt="<?php echo e($person->title); ?>" style="max-width: 100%">
                </div>
            </div>
              </article>
    <?php
    }
}
?>
</div>

        <?php
foreach([
"Art",
"Deans",
"Digital Technology",
"English",
"Faculty Heads",
"Guidance Counsellors",
"Instrumental Music Tutors",
"International",
"Languages",
"Learning Support Centre",
"Librarians",
"Mathematics",
"Physical Education and Health",
"Science",
"Social Sciences",
"Sports",
"Study / External Studies",
"Support and Ancilliary",
"Te Atawhai (Special Needs)",
"Technology",
"Vocational Studies / Gateway",
"Board of Trustees",
] as $dept){

$filteredStaff = $staff->filter(function($s) use ($dept){
return in_array($dept,$s->departments);
})
->map(function($person){
    $string = $person->title;
    if($person->position){
        $string .= " (" . $person->position . ")";
    }
return $string;
})->toArray();
    ?>

<?php if(!empty($filteredStaff)): ?>
<details>
    <summary>
    <h2 class='d-table decorated mt-5 mb-2'><?php echo e($dept); ?></h2>
    </summary>
    <table class="table table-striped table-borderless table-hover">
    <?php $__currentLoopData = $filteredStaff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <?php echo e($member); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</details>
<?php endif; ?>


<?php
}
?>

<?php echo $__env->make('_partials.lastReviewed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\whs-webiste\source/_layouts/staff.blade.php ENDPATH**/ ?>