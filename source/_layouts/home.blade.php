<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">
  <link href="../../../../favicon.ico" rel="icon">

  <title>Whanganui High School</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/fonts/gotham/gotham-light/font.css" />
  <link rel="stylesheet" href="/assets/fonts/gotham/gotham-book/font.css" />
  <link rel="stylesheet" href="/assets/css/customisations.css">
  <link rel="stylesheet" href="{{mix('/css/main.css', 'assets/build')}}">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>

</head>

<body>


  @include('_partials.nav.main')


  @include('_partials.announcement.main')
  

  @include('_partials.banner.home-main')


  <div class="row no-gutters">

    <div class="col p-5 bg-white d-flex flex-column justify-content-around align-items-center triangle-right triangle-white">
      <h1 class="mb-5">Enrolments</h1>
      <p class="text-center">
        Whanganui High School will provide a future-focused education which promotes success for all students.
      </p>
      <a class="mt-5 btn btn-outline-dark" href="/enrolments">More information.</a>
    </div>


    <div class="col p-5 bg-green text-white d-flex flex-column justify-content-around align-items-center triangle-left triangle-green triangle-low">
      <h1 class="mb-5">About</h1>

      <p class="text-center">
        Whanganui High School is a modern, state funded, co-educational school of approximately 1500 students and over 160 staff,
        which prides itself on caring for individual students in a quality academic environment. The school provides a balanced
        education for its students from Year 9 through to Year 13.
      </p>
      <a class="mt-5 btn btn-outline-warning" href="/about-whs">Read more.</a>
    </div>

  </div>


  @include('_partials.banner.feature-image')


  <div class="row no-gutters">

    <div class="col p-5 bg-green text-white d-flex flex-column justify-content-around align-items-center triangle-right triangle-green">
      <h1 class="mb-5">International</h1>
      <p class="text-center">
        International students select Whanganui High School for their education when they want to be away from the distractions of
        the big cities and concentrate on learning English and studying to qualify for university. Whanganui High School
        limits the number of students from any one country so that students can have more opportunities to speak English.
      </p>
      <a class="mt-5 btn btn-outline-warning" href="/international">More information.</a>
    </div>


    <div class="col p-5 bg-yellow text-black d-flex flex-column justify-content-around align-items-center triangle-left triangle-yellow triangle-low">
      <h1 class="mb-5">Learning</h1>
      <p class="text-center">
        Whanganui High School has a large number of subjects to choose from with specialist teachers in each department.
      </p>
      <a class="mt-5 btn btn-outline-dark" href="/curriculum">More information.</a>
    </div>

  </div>


  @include('_partials.banner.feature-image')


  <div class="row no-gutters">

    <div class="col">
      <div class="p-5 bg-white text-center text-green d-flex flex-column justify-content-around align-items-center">
        <h1 class="mb-5">News &amp; Events</h1>
        <p class="text-center">
          Keep up to date with what's going on at WHS.
        </p>
        <a class="mt-5 btn btn-outline-dark" href="/news">Read more.</a>
      </div>
    </div>

    <!-- Slider main container -->
    <div class="d-none col d-md-flex swiper-container bg-white text-center text-green flex-column justify-content-around align-items-center triangle triangle-right triangle-white">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide p-5 d-flex align-items-center justify-content-center" style="background-image: url(/images/news-image-width-936-height-500); background-size: cover; width: 100%; height: 500px;">
          <a href="<pop:permalink />" class="btn btn-light">News Articles 1</a>
        </div>
        <div class="swiper-slide p-5 d-flex align-items-center justify-content-center" style="background-image: url(/images/news-image-width-936-height-500); background-size: cover; width: 100%; height: 500px;">
          <a href="<pop:permalink />" class="btn btn-light">News Articles 2</a>
        </div>
        <div class="swiper-slide p-5 d-flex align-items-center justify-content-center" style="background-image: url(/images/news-image-width-936-height-500); background-size: cover; width: 100%; height: 500px;">
          <a href="<pop:permalink />" class="btn btn-light">News Articles 3</a>
        </div>

      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
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
    
  @include('_partials.footer.main')






</body>

</html>