<nav class="page-header home-header">
  <div class="navbar navbar-expand-lg navbar-dark py-0 px-lg-0" style="background-color: #111;">

    <button class="navbar-toggler my-3" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
      aria-expanded="false" aria-label="Toggle main navigation">
        <span class="navbar-toggler-icon"></span>
         Menu 
        </button>
    <button class="navbar-toggler my-3" type="button" data-toggle="collapse" data-target="#contactNavDropdown" aria-controls="contactNavDropdown"
      aria-expanded="false" aria-label="Toggle contact navigation">
        Contact 
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse justify-content-center align-items-center text-light flex-wrap" id="contactNavDropdown">
      <div class="contact navbar-nav w-100 justify-content-center ">
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="tel:06-3490178">General Enquiries: <?php echo e($page->phone->general->display); ?></a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="tel:06-349-0177">Attendance: <?php echo e($page->phone->attendance->display); ?></a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="tel:+64-6-349-1181">International Enquiries: <?php echo e($page->phone->international->display); ?></a>

      </div>

      <div class="navbar-nav">
        <a class="nav-item nav-link mx-3 p-3 p-sm-1 " href="https://library.whs.ac.nz">Library</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="/payments">Payments</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="/contact">Contact</a>
        <a class="nav-item nav-link mx-3 p-3 px-5 p-sm-1 px-md-3 bg-white text-dark" href="http://kamar.whs.ac.nz">Kamar</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="<?php echo e($page->social->facebook); ?>">Facebook</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1 " href="<?php echo e($page->social->youtube); ?>">Youtube</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1 " href="<?php echo e($page->social->twitter); ?>">Twitter</a>
      </div>
    </div>
  </div>

  

  <div class="navbar navbar-expand-lg navbar-light navbar-bg-light py-0" style="box-shadow: 0 -8px 8px -6px;">
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav w-100 justify-content-center">
  
          <?php $__currentLoopData = $page->navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
          <li class="nav-item dropdown px-3">
            <a class="mb-0 p-2 nav-link dropdown-toggle nav-item" href="<?php echo e($values['url']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo e($values['title']); ?>

                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo e($values['url']); ?>"><?php echo e($values['title']); ?></a> 
                    <?php $__currentLoopData = $values['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thePage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a class="dropdown-item" href="<?php echo e($thePage['url']); ?>"><?php echo e($thePage['title']); ?> </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($$key): ?>
                      <?php $__currentLoopData = $$key; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thePage2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="dropdown-item" href="<?php echo e($thePage2->getPath()); ?>"><?php echo e($thePage2->title); ?> </a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </div>
               
          </li>
  
  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
        </ul>
      </div>
    </div>

</nav><?php /**PATH C:\whs-webiste\source/_partials/nav/main.blade.php ENDPATH**/ ?>