<hr>


    <p>
        <strong>Last Reviewed: <?php if($page->date): ?> <?php echo e(date('F j, Y', $page->date)); ?> <?php else: ?> Not yet reviewed. <?php endif; ?></strong><br>
        
    </p>

    
    <blockquote data-phpdate="<?php echo e($page->date); ?>">
        <em>WARNING: This post is over a year old. Some of the information this contains may be outdated.</em>
    <p>Please <a href="mailto:office@whs.ac.nz?subject=<?php echo e($page->title); ?>&body=The following page has not been reviewed recently.%0D%0A<?php echo e($page->getUrl()); ?>%0D%0APlease can it be reviewed and updated.%0D%0AThanks!">email the office</a> to request an updated review.</p>
    </blockquote><?php /**PATH C:\whs-webiste\source/_partials/lastReviewed.blade.php ENDPATH**/ ?>