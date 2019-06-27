@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}}
 @if ($page->image)
<!--<img src="{{ $page->image }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->image }}" style="object-fit: cover;width: 100%;">
 @endif

@yield('postContent')


<h2 class="decorated d-table my-5">Subject Areas</h2>
@foreach($subject_areas->filter(function($subject_area) use ($page){
    return $subject_area->faculty == $page->title;
}) as $subject)

    <details>
        <summary>
            <h3 class="d-table">{{ $subject->title }}</h3>
        </summary>
        @php
            $subjectCourses  = $courses->filter(function($course) use ($subject){
                return $course->subject_area == $subject->title;
            });
        @endphp
        <ul>
        @foreach($subjectCourses as $course)
        <li>
            <a href="{{$course->getPath()}}">{{ $course->level }} {{ $course->name }}</a>
        </li>
        @endforeach
        </ul>

        <a href="{{$subject->getPath()}}" class="btn btn-light mb-5">More information</a>
    </details>

@endforeach


@include('_partials.lastReviewed')

@endsection