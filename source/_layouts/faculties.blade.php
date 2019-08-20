@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')



@foreach($page->getTeachingFaculties($faculties) as $faculty)
<details>
<summary>
    <h2 class="decorated d-table my-5">{{ $faculty->title }}
    @if($faculty->maori_title)<br><small class="text-muted">{{$faculty->maori_title}}</small>@endif</h2>
    @if($faculty->intro)
    <br>
    {{ $faculty->intro }}
    <hr>
    @endif

</summary>

<div class="row">
    
<div class="col-12">
    @include('_partials.vocational-pathways.list', ['pathways' => $faculty->vocational_pathways])

    </div>
    @foreach($page->getFacultySubjectAreas($faculty, $subject_areas) as $subject )
    @php
    $facultyCourses = $page->getSubjectAreaCourses($subject, $courses)
    @endphp
    @if(count($facultyCourses))
    <div class="col col-md-6 col-lg-6">
    <details open class="mt-4">
            
            <summary><h5 class="d-table">{{ $subject->title }}</h5></summary>
        <div class="list-group">
        @foreach($facultyCourses as $course)
            <a class="list-group-item list-group-item-action" href="{{$course->getPath()}}">{{$course->course_level}} - {{ $course->name }}</a>
        @endforeach
        </div>
    </details>
    </div>
    @endif
    @endforeach
</div>

<br>
<a href="{{$faculty->getPath()}}" class="btn btn-light mb-5">Faculty Information</a>
</details>
@endforeach

@include('_partials.lastReviewed')

@endsection