<?php if($announcement = $announcements->first()): ?>
<style>
  .emergency {
    background: #a41e21;
    color: #fff
  }
</style>

<div class="decorated wrap wrap--notification text-center <?php echo e($announcement->is_emergency ? "emergency" : ''); ?>"
  style="padding: 1em 0; position: relative; z-index: 99; box-shadow: 0 8px 6px -6px #111">

  <h2>
    <?php echo e($announcement->title); ?>

  </h2>
  <a class="btn btn-light" href="<?php echo e($announcement->getPath()); ?>">Read the full announcement</a>

</div>
<?php endif; ?><?php /**PATH C:\whs-webiste\source/_partials/announcement/main.blade.php ENDPATH**/ ?>