<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('title')
        {{ !empty($__env->yieldContent('title')) ? ' | ' : '' }}
        {{ $page->site->title }}
    </title>

    @include('_partials.head.favicon')
    @include('_partials.head.meta')

    <link href="/assets/fonts/gotham/gotham-light/font.css" rel="stylesheet" />
<link href="/assets/fonts/gotham/gotham-book/font.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{mix('/css/main.css', 'assets/build')}}">
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
      <a class="mt-5 btn btn-light" href="/info-for-parents">More information.</a>
    </div>


    <div class="col p-5 bg-green text-white d-flex flex-column justify-content-around align-items-center triangle-left triangle-green triangle-low">
      <h1 class="mb-5">About</h1>

      <p class="text-center">
        Whanganui High School is a modern, state funded, co-educational school of approximately 1500 students and over 160 staff,
        which prides itself on caring for individual students in a quality academic environment. The school provides a balanced
        education for its students from Year 9 through to Year 13.
      </p>
      <a class="mt-5 btn btn-light" href="/about-whs">Read more.</a>
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
      <a class="mt-5 btn btn-light" href="/international">More information.</a>
    </div>


    <div class="col p-5 bg-yellow text-black d-flex flex-column justify-content-around align-items-center triangle-left triangle-yellow triangle-low">
      <h1 class="mb-5">Learning</h1>
      <p class="text-center">
        Whanganui High School has a large number of subjects to choose from with specialist teachers in each department.
      </p>
      <a class="mt-5 btn btn-light" href="/curriculum">More information.</a>
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
        <a class="mt-5 btn btn-light" href="/news-and-events">Read more.</a>
      </div>
    </div>

    <!-- Slider main container -->
    <div class="d-none col d-md-flex swiper-container bg-white text-center text-green flex-column justify-content-around align-items-center triangle triangle-right triangle-white">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach($news->where('show_in_slider', true)->take(5) as $article)
        <div class="swiper-slide p-5 d-flex align-items-center justify-content-center" style="background: #fff; background-image: url({{ str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_950,h_300,c_crop,g_auto/", $article->feature_image["image"] ?? $article->image) }}); background-size: cover; width: 100%; height: 300px;">
        <a href="{{$article->getPath()}}" class="btn btn-light">{{$article->title}}</a>
        </div>
        @endforeach

      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

  </div>



  @include('_partials.footer.main')

</body>

</html>