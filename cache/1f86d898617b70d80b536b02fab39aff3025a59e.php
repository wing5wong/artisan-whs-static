<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?php echo $__env->yieldContent('title'); ?>
        <?php echo e(!empty($__env->yieldContent('title')) ? ' | ' : ''); ?>

        <?php echo e($page->site->title); ?>

    </title>

    <?php echo $__env->make('_partials.head.favicon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('_partials.head.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('_partials.cms.identity_widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/gotham/gotham-light/font.css" />
    <link rel="stylesheet" href="/assets/fonts/gotham/gotham-book/font.css" />
    <link rel="stylesheet" href="/assets/css/customisations.css">
    <link rel="stylesheet" href="<?php echo e(mix('/css/main.css', 'assets/build')); ?>">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>

</head>

<body>



  <?php echo $__env->make('_partials.banner.standard-main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <?php echo $__env->make('_partials.nav.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  


<div class="houses">
  <div class="container pt-5">
    <div class="row">
      <div class="col">

        <?php echo $__env->yieldContent('content'); ?>
        
      </div>
    </div>
  </div>
</div>
 
  

  <script>
      var mySwiper = new Swiper ('.swiper-container', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  autoplay: true,
  effect: 'fade',
  navigation: {
  nextEl: '.swiper-button-next',
  prevEl: '.swiper-button-prev',
  },
  })
    </script>
    
  <?php echo $__env->make('_partials.footer.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html><?php /**PATH C:\whs-webiste\source/_layouts/standard.blade.php ENDPATH**/ ?>