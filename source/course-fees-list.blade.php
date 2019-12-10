@extends('_layouts.standard')
@section('title', "Course Contributions")
@section('content')



@section('content')

<h1 class="decorated py-3 mb-4">Course Contributions</h1>

@php
$levels = [
"11" => "Level 1",
"12" => "Level 2",
"13" => "Level 3",
"9" => "Year 9",
"10" => "Year 10",
];
@endphp

<ul class="nav nav-tabs" id="myTab" role="tablist">

    @foreach($levels as $level=>$levelTitle)
    <li class="nav-item">
        <a class="nav-link @if($loop->first) active @endif" id="year-{{$level}}-tab" data-toggle="tab"
            href="#year-{{$level}}" role="tab" aria-controls="year-{{$level}}"
            @if($loop->first)aria-selected="true"@endif>{{ $levelTitle }}</a>
    </li>
    @endforeach
</ul>
<div class="tab-content" id="myTabContent">

    @foreach($levels as $level=>$levelTitle)
    <div class="tab-pane fade @if($loop->first) show active @endif" id="year-{{$level}}" role="tabpanel"
        aria-labelledby="year-{{$level}}-tab">

        @php
        $mapped = $page->getTeachingFaculties($faculties)
        ->map(function($faculty) use ($page, $level, $subject_areas, $courses)
        {
        return [
        'faculty'=> $faculty,
        'courses' => $page->getFacultyCoursesForLevel($faculty, $subject_areas, $courses, $level),
        ];
        })->filter( function($f){
        return $f['courses']->isNotEmpty();
        });
        @endphp

        <div class="row">
            @foreach($mapped as $faculty)
            <div class="col-12">

                <div class="list-group my-4">
                    @foreach($faculty['courses'] as $course)
                        @if($course->course_fees)
                        <h4>{{ $course->name }} - {{ $course->code }}</h4>
                        - {{ $course->course_fees }}
                        @endif
                    @endforeach
                </div>

            </div>
            @endforeach
        </div>

    </div>
    @endforeach

</div>


@endsection