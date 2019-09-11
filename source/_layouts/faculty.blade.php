@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


 @if ($page->image)
    <a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
        <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_500,h_300,c_lfill,g_auto/", $page->image)}}"
        srcset="
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_950,h_300,c_lfill,g_auto/", $page->image)}} 950w,
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_500,h_300,c_lfill,g_auto/", $page->image)}} 500w
        "
        sizes="(min-width: 800px) 950px, 500px"
        alt="" style="max-width: 100%">
    </a>
@endif

@yield('postContent')

<hr class="my-5">

<div class="row">
    @foreach($page->getFacultySubjectAreas($page, $subject_areas) as $subject)
    @php
        $subjectCourses = $page->getSubjectAreaCourses($subject, $courses) 
    @endphp
    @if(count($subjectCourses))
    <div class="col-sm-12 col-md-6 col-lg-6">
        <h3 class="d-table mt-3">
            {{ $subject->title}}
            @if($subject->maori_title)<br><small
                class="text-muted">{{$subject->maori_title}}</small>
            @endif
        </h3>


        <div class="list-group my-4">
            @foreach($subjectCourses as $course)
            <a class="list-group-item list-group-item-action"
                href="{{$course->getPath()}}">{{$course->course_level}} - {{ $course->name }} </a>
            @endforeach
        </div>

        <a href="{{$subject->getPath()}}" class="btn btn-light mb-5">More information</a>
    </div>
    @endif
    @endforeach
</div>

@php
$recentNews = $news->filter(function($article) use ($page){
    return in_array($page->title, $article->faculties ?? []);
})
->take(6);
@endphp
@if(count($recentNews))

<h3>Recently in the news</h3>
<div class="row">
    @foreach($recentNews as $n)
    <div class="col-sm-12 col-md-6 col-lg-4">
        <a href="{{$n->getPath()}}">
            <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/",  $page->featureImageSrc($n))}}"
srcset="
{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_400,h_360/",  $page->featureImageSrc($n))}} 400w,
{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/",  $page->featureImageSrc($n))}} 250w
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