@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}}
 @if ($page->image)
<!--<img src="{{ $page->image }}" class="featured-image" style="object-fit: cover; height: 250px; width: 100%;">-->
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


<h2 class="decorated d-table my-5">Subject Areas</h2>



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


@include('_partials.lastReviewed')

@endsection