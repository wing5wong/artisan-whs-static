@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


@if($page->image)

<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; max-width:100%"> @endif

@yield('postContent')



<div class="row">

    <div class="col-12 col-lg-6">

        Courses in the {{ $page->title }} Subject Area:

        <div class="list-group my-4">
            @foreach($courses->where('subject_area', $page->title) as $c)
            <a class="list-group-item list-group-item-action" href="{{$c->getPath()}}">
                {{$c->course_level}} - {{ $c->name }}
            </a>
            @endforeach
        </div>

    </div>
    <div class="col-12 col-lg-6">

        Other Subject Areas in the {{ $page->faculty }} faculty:

        <div class="list-group my-4">
            @foreach($subject_areas->where('faculty', $page->faculty) as $other)
            <a class="list-group-item list-group-item-action" href="{{$other->getPath()}}">{{ $other->title }}</a>
            @endforeach
        </div>

    </div>
</div>


@php
$recentNews = $news->filter(function($article) use ($page){
    return in_array($page->title, $article->subject_areas ?? []);
})
->take(6);
@endphp
@if(count($recentNews))

<h3>Recently in the news</h3>
<div class="row">
    @foreach($recentNews as $n)
    <div class="col-sm-12 col-md-6 col-lg-4">
        <a href="{{$n->getPath()}}">
            <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/", $page->featureImageSrc($n))}}"
srcset="
{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_400,h_360/", $page->featureImageSrc($n))}} 400w,
{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/", $page->featureImageSrc($n))}} 250w
"
sizes="(min-width: 800px) 400px, 250px"
width="600" alt="{{ $page->featureImageAlt($n)}}" title="{{ $page->featureImageDescription($n)}}" style="max-width: 100%">
            {{$n->title}}
        </a>
    </div>
    @endforeach
</div>
@endif


@include('_partials.lastReviewed')

@endsection