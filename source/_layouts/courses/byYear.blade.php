@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }} - {{ $page->name }}</h1>

{!! $page !!}

@foreach($courses as $course)
{{ $course->title }}
@endforeach

@foreach($courses->groupBy(['year','subject_area']) as $year=>$sa)
<details>
<summary>
    <h2 class="decorated d-table my-5">{{ $year }}
</summary>

<div class="row">
    @foreach($sa as $s=>$saCourses )
    <div class="col col-md-6 col-lg-6">
    <details open>
            <summary><h5 class="d-table">{{ $s }}</h5></summary>
        <ul>
        @foreach($saCourses as $course)
        <li>
            <a href="{{$course->getPath()}}">{{$course->course_level}} - {{ $course->name }}</a>
        </li>
        @endforeach
        </ul>
    </details>
    </div>
    @endforeach
</div>


</details>
@endforeach

@endsection