<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">
  <link href="../../../../favicon.ico" rel="icon">
  <title>Whanganui High School</title><!-- Bootstrap core CSS -->
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ mix('css/bootstrap.min.css') }}">
    {{-- <pop:stylesheet name="/fonts/gotham/gotham-light/font.css" />
    <pop:stylesheet name="/fonts/gotham/gotham-book/font.css" /> --}}
    <link rel="stylesheet" href="{{ mix('css/customisations.css') }}">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>

</head>
  
  <body> 
  
    
  <pop:include template="includes/_partials/headers/home" />

<div class="row no-gutters">
    <div class="col p-5 bg-white d-flex flex-column justify-content-around align-items-center triangle-right triangle-white">
        <h1 class="mb-5">Enrolments</h1>
        <pop:content from="info-for-parents">
          <pop:intro_text wrap="p" />
        <a class="mt-5 btn btn-outline-dark" href="<pop:permalink />">More information.</a>
        </pop:content>
      </div>
    <div class="col p-5 bg-green text-white d-flex flex-column justify-content-around align-items-center triangle-left triangle-green triangle-low">
    <h1 class="mb-5">About</h1>
      <pop:content from="about-wanganui-high-school">
      <p class="text-center"><pop:intro_text /></p>
        <a class="mt-5 btn btn-outline-warning" href="<pop:permalink />">Read more.</a>
        </pop:content>
    </div>
  </div>
             
<div class="row no-gutters">   <pop:content>     <div class="col p-5 d-none d-md-block bg-attached" <pop:feature_image> style="min-height:45vh; background-image: url(<pop:value.src />)"</pop:feature_image>>   </div>   </pop:content>   </div>

        
  <div class="row no-gutters">
      <div class="col p-5 bg-green text-white d-flex flex-column justify-content-around align-items-center triangle-right triangle-green">
      <h1 class="mb-5">International</h1>
      <pop:content from="international">
          <pop:intro_text wrap="p" />
        <a class="mt-5 btn btn-outline-warning" href="<pop:permalink />">More information.</a>
        </pop:content>
    </div>
      <div class="col p-5 bg-yellow text-black d-flex flex-column justify-content-around align-items-center triangle-left triangle-yellow triangle-low">
        <h1 class="mb-5">Learning</h1>
        <pop:content from="curriculum">
          <pop:intro_text wrap="p" />
        <a class="mt-5 btn btn-outline-dark" href="<pop:permalink />">More information.</a>
          </pop:content>
      </div>
  </div>
             
<div class="row no-gutters">   <pop:content>     <div class="col p-5 d-none d-md-block bg-attached" <pop:feature_image> style="min-height:45vh; background-image: url(<pop:value.src />)"</pop:feature_image>>   </div>   </pop:content>   </div>

  <pop:include template="includes/_partials/pages/home/news" />
        

     <pop:include template="/includes/_partials/footers/main" />   
      
    <pop:include template="includes/_partials/scripts/main" />
  </body>
</html>