@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')


@foreach($subject_areas->filter(function($subject_area) use ($page){
    return $subject_area->faculty == $page->title;
}) as $subject)
<div class="mb-5">
    <h2><a href="{{$subject->getPath()}}">{{ $subject->title }}</a></h2>
    @php
        $subjectCourses  = $courses->filter(function($course) use ($subject){
            return $course->subject_area == $subject->title;
        });
    @endphp
    @foreach($subjectCourses as $course)

    <a href="{{$course->getPath()}}">{{ $course->title }}</a>
    @endforeach
</div>

@endforeach


@include('_partials.lastReviewed')

@endsection