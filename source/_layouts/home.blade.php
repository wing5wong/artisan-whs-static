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
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    {{-- <pop:stylesheet name="/fonts/gotham/gotham-light/font.css" />
    <pop:stylesheet name="/fonts/gotham/gotham-book/font.css" /> --}}
    <link rel="stylesheet" href="/assets/css/customisations.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>

</head>
  
  <body> 
  
    







<nav class="site-header home-header">
  <div class="navbar navbar-expand-lg navbar-dark py-0 px-lg-0" style="background-color: #111;">
    <!--<div class="d-flex flex-column flex-md-row justify-content-around site-navigation">-->
    <button class="navbar-toggler my-3" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle main navigation">
      <span class="navbar-toggler-icon"></span> Menu
    </button>
    
      <button class="navbar-toggler my-3" type="button" data-toggle="collapse" data-target="#contactNavDropdown" aria-controls="contactNavDropdown" aria-expanded="false" aria-label="Toggle contact navigation">
      Contact <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-center align-items-center text-light flex-wrap" id="contactNavDropdown">
        
      <div class="contact navbar-nav w-100 justify-content-center ">
        <a class="mx-3 p-3 p-sm-1" href="/about-wanganui-high-school">General Enquiries: (06) 349-0178</a>
        <a class="mx-3 p-3 p-sm-1" href="/about-wanganui-high-school">Attendance: (06) 349-0177</a>
        <a class="mx-3 p-3 p-sm-1" href="/about-wanganui-high-school">International Enquiries: +64-6-349-1181</a>
        <a class="mx-3 p-3 p-sm-1" href="/payment-information">Payments</a>
        <a class="mx-3 p-3 p-sm-1" href="/contact">Contact</a>
      </div>
      <div class="social navbar-nav ">
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="/about-wanganui-high-school">Facebook</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1 " href="/about-wanganui-high-school">Youtube</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1 " href="/about-wanganui-high-school">Google+</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1 " href="/contact">Twitter</a>
      </div>
      <div class="navbar-nav">
        <a class="mx-3 p-3 p-sm-1 " href="http://library.whs.ac.nz">Library</a>
        <a class="mx-3 p-3 px-5 p-sm-1 px-md-3 bg-white text-dark" href="http://kamar.whs.ac.nz">Kamar</a>
      </div>
    </div>
    
  </div>


  <div class="navbar navbar-expand-lg navbar-light navbar-bg-light py-0" style="box-shadow: 0 -8px 8px -6px;">

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav w-100 justify-content-center">
        <pop:content from="about-wanganui-high-school, info-for-parents, curriculum, news,international, media">
          <li class="nav-item dropdown px-3">
            <a class="mb-0 p-2 nav-link dropdown-toggle nav-item <pop:active>active</pop:active>" href="<pop:permalink />" id="navId-<pop:id />" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <pop:title />
            </a>
            <div class="dropdown-menu" aria-labelledby="navId-<pop:id />">
              <a class="dropdown-item <pop:active>active</pop:active>" href="<pop:permalink />"><pop:title /></a>
              <pop:sections published="true">
                <pop:hide_from_nav>
                </pop:hide_from_nav>
                <pop:no_hide_from_nav>
                  <pop:current>
                    
                  </pop:current>
                  <pop:no_current>
                    <a class="dropdown-item <pop:active>active</pop:active>" href="<pop:alt_url><pop:value/></pop:alt_url><pop:no_alt_url><pop:permalink /></pop:no_alt_url>"><pop:title /></a>
                    </pop:no_current>
                  </pop:no_hide_from_nav>
              </pop:sections>
            </div>
          </li>
        </pop:content>
       </ul>
    </div>
    
    
  </div>
</nav>



   <style>
     .emergency {
       background: #b00
     }
   </style>
 <pop:content from="green-box">

   <div class="decorated wrap wrap--notification <pop:emergency>emergency</pop:emergency>" style="padding: 1em 0; position: relative; z-index: 99; box-shadow: 0 8px 6px -6px #111">
  <div class="row column" style="display: flex; align-items:center; justify-content: center; text-align: center;flex-wrap: wrap">

    <pop:announcement wrap="p" editable="true" />
    	<a class="btn" href="<pop:permalink />">Read the full announcement</a>
    

    
	</div>
</div>
</pop:content>




<div class="site-banner w-100 position-relative 
  text-center 
  d-flex flex-column 
  justify-content-between align-items-between">
     <picture>
      <source srcset="<pop:asset name='logo_vertical_t.png' />" media="(max-width: 750px)" />
       <img alt="" class="p-5 site-banner-img img-fluid position-absolute" style="top:0; right: 0; width: 250px;" src="<pop:asset name='logo_vertical_t.png' />">
  </picture>
   
  <!--<a class="mb-5 btn btn-light" href="#">Enrol today!</a>-->

</div>












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