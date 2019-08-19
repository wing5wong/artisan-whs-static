@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}}
 @if ($page->image)
<!--<img src="{{ $page->image }}" class="featured-image" style="object-fit: cover; height: 250px; width: 100%;">-->
<a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
        <img src="{{ $page->image }}"  style="object-fit: cover; max-width:100%; display: block;">
    </a>
 @endif

@yield('postContent')


<h2 class="decorated d-table my-5">Subject Areas</h2>



<div class="row">
    @foreach($page->getFacultySubjectAreas($page, $subject_areas) as $subject)
    <div class="col-6">
        <h3 class="d-table mt-3">
            {{ $subject->title}}
            @if($subject->maori_title)<br><small
                class="text-muted">{{$subject->maori_title}}</small>
            @endif
        </h3>


        <div class="list-group my-4">
            @foreach($page->getSubjectAreaCourses($subject, $courses)  as $course)
            <a class="list-group-item list-group-item-action"
                href="{{$course->getPath()}}">{{ $course->name }}</a>
            @endforeach
        </div>
        
        <a href="{{$subject->getPath()}}" class="btn btn-light mb-5">More information</a>
    </div>
    @endforeach
</div>





@foreach($subject_areas->where('faculty', $page->title) as $subject)
    <details>
        <summary>
            <h3 class="d-table">{{ $subject->title }}</h3>
        </summary>
        <ul>
        @foreach( $courses->where('subject_area', $subject->title) as $course)
        <li>
            <a href="{{$course->getPath()}}">{{ $course->level }} {{ $course->name }} ({{ $course->course_level }})</a>
        </li>
        @endforeach
        </ul>

        <a href="{{$subject->getPath()}}" class="btn btn-light mb-5">More information</a>
    </details>

@endforeach


@include('_partials.lastReviewed')

@endsection