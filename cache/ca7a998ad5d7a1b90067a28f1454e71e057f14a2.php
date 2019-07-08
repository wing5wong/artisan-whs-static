---
title: Student Experiences
students:
  - title: Kazu
    body: "My name is Kazuaki Katsurada. Everyone called me Kazu. I am 16 years old and from Tokyo in Japan. I came to New Zealand last April.  
    

    I was surprised at the town because in Japan there are many shops but in Wanganui there is only one main street and all shops close at 5 o'clock everyday.  
    

    My school life is very good. It is better than last year because I can speak English more than last year and my rugby skill is getting better.  
    

    This year's host family have two brothers and one sister, they are very kind people.  
    

    My hobbies are listening to music, playing sports and talking with my friends on the phone. I have been playing rugby since I was 6 years old and I was a member of a best Tokyo rugby team when I was junior high school student. When I played first match in N.Z I couldn't play very well because I was nervous and I couldn't communicate with my team members. I really realized that communication is very important for people. However I can communicate with my team members this year. I am enjoying playing rugby more than when I played in Japan because New Zealand is a kingdom of rugby. I am proud of playing rugby in New Zealand.  "

    image: >-
      https://res.cloudinary.com/whanganuihigh/image/upload/v1554243763/Oliver_Keelty_won_Male_Instructor_award.jpg
---
<?php $__currentLoopData = $page->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<article class="py-3">
        <h2 class="decorated py-3 mb-4">
               <?php echo e($student["title"]); ?>

          <span class="text-muted"><?php echo e($student["city_country"]); ?></span>
            </h2>
        <div class="row">
          <div class="col">
            <img src="<?php echo e($student->image); ?>" width="140" height="186" alt="">
          </div>
          <div class="col">
            <?php echo $student["body"]; ?>

          </div>
        </div>
      </article>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\whs-webiste\cache/b29f359aeb177810e6f4a15cc295f16a2696e11e.blade.md ENDPATH**/ ?>