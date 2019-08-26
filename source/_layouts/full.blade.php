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

    <link href="/assets/fonts/gotham/gotham-light/font.css" rel="stylesheet" />
<link href="/assets/fonts/gotham/gotham-book/font.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{mix('/css/main.css', 'assets/build')}}">
</head>

<body>
    @include('_partials.nav.main')
    @include('_partials.announcement.main')
    @include('_partials.banner.standard-main')


    @yield('content')


    @include('_partials.footer.main')
    
</body>

</html>