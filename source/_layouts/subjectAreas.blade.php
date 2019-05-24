@extends('_layouts.standard') 

@section('title', $page->title) 

@section('content')
    <h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

    {{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
    <!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
    <img src="{{ $page->imageCdn($page->image) }}"  style="object-fit: cover; max-width:100%"> @endif @yield('postContent')


    Courses in the {{ $page->title }} Subject Area:

    <?php
    $subjectAreaCourses = $courses->filter(function($c) use ($page){
        return $c->subject_area == $page->title;
    });
    ?>

<ul>
    @foreach($subjectAreaCourses as $c)
<li>
    <a href="{{$c->getPath()}}">{{ $c->title }}</a>
</li>
    @endforeach
</ul>




    Other Subject Areas in the {{ $page->faculty }} faculty:

    <?php
    $otherSubjectAreas = $subject_areas->filter(function($sa) use ($page){
        return $sa->faculty == $page->faculty;
    });
    ?>

<ul>
    @foreach($otherSubjectAreas as $other)
<li>
        <a href="{{$other->getPath()}}">{{ $other->title }}</a>
</li>
    @endforeach
</ul>
    
    @include('_partials.lastReviewed')

    @if ($page->comments)
        @include('_partials.comments')
    @else
        <p>Comments are not enabled for this post.</p>
    @endif
@endsection