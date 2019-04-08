<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('title') {{ !empty($__env->yieldContent('title')) ? ' | ' : '' }} {{ $page->site->title }}
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>

</head>

<body>
    @include('_partials.nav.main')
    @include('_partials.announcement.main')
    @include('_partials.banner.standard-main')




    <div class="houses bg-green text-center text-yellow row no-gutters">
        <div class="col p-5 bg-green text-white shadow-right-inset d-flex flex-column justify-content-around align-items-center">
                <h2 class="mb-5">
                    About Whanganui High School
                </h2>
                p about WHS
                <a class="btn btn-outline-light mt-5" href="<pop:permalink />">Read our full story</a>
        </div>
        <div class="col p-5 bg-white text-green d-flex flex-column justify-content-around align-items-center">
                <h2 class="mb-5">
                    Principals Message
                </h2>
                p principals message welcome
                <a class="btn btn-outline-dark mt-5" href="<pop:permalink />">See what I have to say</a>
        </div>
    </div>

    @include('_partials.banner.feature-image')

    <div class=" bg-white text-green row no-gutters">
        <div class="col p-5 bg-yellow text-dark shadow-right-inset d-flex flex-column justify-content-around align-items-center">
            <h2 class="mb-5">Facilities</h2>
            p Facilities description
            <a class="btn btn-outline-dark mt-5" href="<pop:permalink />">More information</a>
        </div>

        <div class="col p-5 bg-white text-dark shadow-right-inset d-flex flex-column justify-content-around align-items-center">
            <h2 class="mb-5">History</h2>
            History Description
            <a class="btn btn-outline-dark mt-5" href="<pop:permalink />">More information</a>
        </div>
    </div>



    <div class="row no-gutters houses">
        <div class="col bg-white d-flex flex-column justify-content-center align-items-center">
            <div class="p-5 text-center text-green d-flex flex-column justify-content-center align-items-center">
                <h2 class="mb-5">Houses</h2>
                <p class="lead">Our communities play an important role in the school community</p>


                Main body about houses

                <!-- <a class="btn btn-outline-dark mt-5" href="">Our House Story</a> -->
            </div>
        </div>
        <div class="col text-center text-white d-flex flex-wrap">
            <div class="p-5 bg-awa d-flex justify-content-center align-items-center w-50">
                <h2 class="mb-0">Awa</h2>
            </div>
            <div class="p-5 bg-maunga d-flex justify-content-center align-items-center w-50">
                <h2 class="mb-0">Maunga</h2>
            </div>
            <div class="p-5 bg-moana d-flex justify-content-center align-items-center w-50">
                <h2 class="mb-0">Moana</h2>
            </div>
            <div class="p-5 bg-whenua d-flex justify-content-center align-items-center w-50">
                <h2 class="mb-0">Whenua</h2>
            </div>
        </div>
    </div>



    <div class="row no-gutters houses">
        <div class="col p-5 bg-green text-center text-yellow d-flex flex-column justify-content-between align-items-center">
            <h2 class="mb-0">head-prefects,staff,board-of-trustees-2,working-at-whs</h2>
            <a class="btn btn-outline-light mt-5" href="<pop:permalink />">More information</a>
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