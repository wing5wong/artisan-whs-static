<!-- search/social -->
<meta name="referrer" content="always">
<link rel="canonical" href="<?php echo e($page->getUrl()); ?>">

<meta property="og:title" content="<?php echo e($page->title ?: $page->site->title); ?>">
<meta property="og:image" content="<?php echo e($page->imageCdn($page->image ? $page->image : $page->site->image)); ?>">
<meta property="og:type" content="<?php echo e($page->isPost ? 'article' : 'website'); ?>">
<meta property="og:url" content="<?php echo e($page->getUrl()); ?>">

<meta name="twitter:title" content="<?php echo e($page->title ?: $page->site->title); ?>">
<meta name="twitter:image" content="<?php echo e($page->imageCdn($page->image ? $page->image : $page->site->image)); ?>">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="<?php echo e("@{$page->owner->twitter}"); ?>">
<meta name="twitter:creator" content="<?php echo e("@{$page->owner->twitter}"); ?>">
<!-- end search/social -->
<?php /**PATH C:\whs-webiste\source/_partials/head/meta.blade.php ENDPATH**/ ?>