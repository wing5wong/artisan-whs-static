@extends('_layouts.full')
@section('title', 'News and Events')
@section('content')

<div class="houses bg-green text-center text-yellow row no-gutters">


    <div
        class="col-sm-12 col-md-6 col-lg-6 p-5 bg-green text-white shadow-right-inset d-flex flex-column justify-content-around align-items-center">
        <h2>News</h2>

        <!-- Slider main container -->
        <div class="swiper-container w-100">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach($news->where('show_in_slider', true)->take(5) as $article)
                <div class="swiper-slide p-5 d-flex align-items-center justify-content-center"
                    style="background: #fff; background-image: url({{ str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_950,h_300,c_crop,g_auto/", $article->feature_image["image"] ?? $article->image) }}); background-size: cover; width: 100%; height: 300px;">
                    <a href="{{$article->getPath()}}" class="btn btn-light">{{$article->title}}</a>
                </div>
                @endforeach

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <a href="/news-and-events/news/" class="btn btn-light mt-5">See All News</a>

    </div>


    <div class="col-sm-12 col-md-6 col-lg-6 p-5 bg-white text-green d-flex flex-column justify-content-start align-items-center">
        <h2>Events</h2>

        <table class="table table-striped table-borderless table-hover text-center">
            @foreach($events->filter(function($e){
            return true; //; $e->date and (strtotime($e->date) > strtotime(date()));
            })->take(5) as $event)
            <tr>
                <td width="35%">{{ date('l, j F, Y', $event->date) }}</td>
                <td><a href="{{$event->getPath()}}">{{ $event->title }}</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<div class="row no-gutters d-md-flex flex-equal flex-wrap">
    @foreach(['school-newsletters'=>"Newsletters",'achievers-list'=>"Achievers List",'honours-board'=>"Honours Board",'prizegiving'=>"Prizegiving"] as $col=>$title)
    <div
        class="col-sm-12 col-md-6 col-lg-3 bg-yellow text-green p-5 text-center d-flex flex-wrap justify-content-center align-items-center w-100">
        <h2 class="mb-2 w-100">
            {{ $title }}
        </h2>
        <a class="btn btn-light mt-2" href="/news-and-events/{{$col}}">More Information</a>
    </div>
    @endforeach
</div>


@endsection