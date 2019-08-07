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
    @php
    $mapped = $faculties->map(function($faculty) use ($level){
        $subjectAreas = $subject_areas->where('faculty', $faculty->title)->sortBy('title')
        ->map(function($subject) use ($level){
            $subjectCourses = $courses->filter(function($course) use ($level, $subject){
                    return $course->year == $level && $course->subject_area == $subject->title;
                });
            return ['subjectArea' => $subject, 'courses' => $subjectCourses];
        });
        return ['faculty'=>$faculty, 'subjectAreas'=>$subjectAreas];
    });
    @endphp

    @foreach($mapped as $faculty)
    <h3>{{ $faculty['faculty']->title}}</h3>
        @foreach($faculty['subjectAreas'] as $subjectArea)
            <h4>{{ $subjectArea['subjectArea']->title }}</h4>
            @foreach($subjectArea->courses as $course)
            <a href="{{$course->getPath()}}">{{$course->course_level}} - {{ $course->name }}</a>
            @endforeach
        @endforeach
    @endforeach

</details>
@endforeach



@endsection