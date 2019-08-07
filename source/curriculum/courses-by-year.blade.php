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
        @foreach($subject_areas->where('faculty', $faculty->title)->sortBy('title') as $subject )
            @php
                $subjectCourses = $courses->filter(function($course) use ($level, $subject){
                    return $course->year == $level && $course->subject_area == $subject->title;
                });
            @endphp
            @if($subjectCourses->isNotEmpty())
            <details>
                <summary>
                    <h4 class="decorated d-table my-5">{{ $faculty->title }}</h4>
                </summary>


                <div class="col col-md-6 col-lg-6">
                    <details open>
                        <summary>
                            <h5 class="d-table">{{ $subject->title }}</h5>
                        </summary>
                        <ul>
                            @foreach($subjectCourses as $course)
                            <li>
                                <a href="{{$course->getPath()}}">{{$course->course_level}} - {{ $course->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </details>
                </div>
            </details>
            @endif
        @endforeach
    @endforeach
</details>
@endforeach



@endsection