<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-45972373-5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-45972373-5');
</script>
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
    @include('_partials.cms.identity_widget')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/gotham/gotham-light/font.css" />
    <link rel="stylesheet" href="/assets/fonts/gotham/gotham-book/font.css" />
    <link rel="stylesheet" href="/assets/css/customisations.css">
    <link rel="stylesheet" href="{{mix('/css/main.css', 'assets/build')}}">
</head>

<body>



  @include('_partials.banner.standard-main')
  
  @include('_partials.nav.main')


  {{-- @include('_partials.announcement.main')--}}


<div class="houses">
  <div class="container pt-5">
    <div class="row">
      <div class="col">

        @yield('content')
        
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
    
  @include('_partials.footer.main')

</body>

</html>