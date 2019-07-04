  
  <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  <script src="/assets/js/bootstrap.min.js"></script>

  
  <script src="<?php echo e(mix('js/main.js', 'assets/build')); ?>"></script>
  <?php echo $__env->renderWhen($page->production, '_partials.analytics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
  <?php echo $__env->make('_partials.cms.identity_redirect', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\whs-webiste\source/_partials/footer/scripts.blade.php ENDPATH**/ ?>