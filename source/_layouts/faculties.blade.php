@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')



@foreach($faculties->sortBy('title') as $faculty)
<details>
<summary>
    <h2 class="decorated d-table my-5">{{ $faculty->title }}
    @if($faculty->maori_title)<br>{{$faculty->maori_title}}@endif</h2>
    @if($faculty->intro)
    <br>
    {{ $faculty->intro }}
    <hr>
    @endif

</summary>

<div class="row">


    @foreach(
        $subject_areas->where('faculty', $faculty->title)->sortBy('title')->all()
         as $subject
    )
    <div class="col col-md-6 col-lg-6">
    <details open>
            
            <summary><h5 class="d-table">{{ $subject->title }}</h5></summary>
        <ul>
        @foreach($courses->where('subject_area', $subject->title)->all() as $course)
        <li>
            <a href="{{$course->getPath()}}">{{$course->course_level}} - {{ $course->name }}</a>
        </li>
        @endforeach
        </ul>
    </details>
    </div>
    @endforeach
</div>

<br>
<a href="{{$faculty->getPath()}}" class="btn btn-light mb-5">Faculty Information</a>
</details>
@endforeach

@include('_partials.lastReviewed')

@endsection