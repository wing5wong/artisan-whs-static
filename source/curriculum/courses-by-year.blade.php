@extends('_layouts.standard')

@section('title', "Courses by Year")

@section('content')
<h1 class="decorated py-3 mb-4">Courses By Level</h1>

@php
$levels = [
    "9" => "Year 9",
    "10" => "Year 10",
    "11" => "Level 1",
    "12" => "Level 2",
    "13" => "Level 3"
];
@endphp

@foreach($levels as $level=>$levelTitle)
    <details>
        <summary>
            <h2 class="decorated d-table my-5">{{ $levelTitle }}
        </summary>
        @foreach($faculties as $faculty)

            <details>
                <summary>
                    <h2 class="decorated d-table my-5">{{ $faculty->title }}
                </summary>
                @foreach($subject_areas->where('faculty', $faculty->title)->sortBy('title') as $subject )
                    <div class="col col-md-6 col-lg-6">
                    <details open>
                            <summary><h5 class="d-table">{{ $subject->title }}</h5></summary>
                        <ul>
                        @foreach($courses->filter(function($course) use ($level, $subject){
                            return $course->year == $level && $course->subject_area == $subject->title;
                        }) as $course)
                        <li>
                            <a href="{{$course->getPath()}}">{{$course->course_level}} - {{ $course->name }}</a>
                        </li>
                        @endforeach
                        </ul>
                    </details>
                    </div>
                @endforeach
            </details>
        @endforeach
    </details>
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