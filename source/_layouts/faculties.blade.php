@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')



@foreach($faculties as $faculty)
<h2 class="decorated d-table mt-5 mb-2">{{ $faculty->title }}</h2>
{!! $faculty !!}


<div class="row">
    @foreach($subject_areas->filter(function($subject_area) use ($faculty){
    return $subject_area->faculty == $faculty->title;
    }) as $subject)
    <div class="col col-md-6 col-lg-6 mb-5">
    <details>
            
            <summary>{{ $subject->title }}</summary>
        @php
        $subjectCourses = $courses->filter(function($course) use ($subject){
        return $course->subject_area == $subject->title;
        });
        @endphp
        <ul>
        @foreach($subjectCourses as $course)
        <li>
            <a href="{{$course->getPath()}}">{{$course->course_level}} - {{ $course->title }}</a>
        </li>
        @endforeach
        </ul>
    </details>
    </div>
    @endforeach
</div>

<br>
<a href="{{$faculty->getPath()}}" class="btn btn-outline mb-5">More Information</a>
@endforeach

@include('_partials.lastReviewed')

@endsection