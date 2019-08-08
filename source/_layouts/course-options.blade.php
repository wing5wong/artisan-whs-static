@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{!! $page !!}

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
<details class="mb-4">
    <summary>
        <h2 class="decorated d-table">{{ $levelTitle }}
    </summary>
    @php
    $mapped = $faculties->map(function($faculty) use ($level, $subject_areas, $courses){
        $subjectAreas = $subject_areas
            ->where('faculty', $faculty->title)
            ->sortBy('title')
            ->map(function($subject) use ($level, $courses){
                $subjectCourses = $courses->filter(function($course) use ($level, $subject){
                    return $course->year == $level && $course->subject_area == $subject->title;
                });
            return ['subjectArea' => $subject, 'courses' => $subjectCourses];
        })
        ->filter(function($sa){
            return $sa['courses']->isNotEmpty();
        });

        return ['faculty'=>$faculty, 'subjectAreas'=>$subjectAreas];
    })->filter( function($f){
        return $f['subjectAreas']->isNotEmpty();
    });
    @endphp

<div class="row">
    @foreach($mapped as $faculty)
    <div class="col-6">
        <h3 class="d-table mt-3">
            {{ $faculty['faculty']->title}}
            @if($faculty['faculty']->maori_title)<br><small class="text-muted">{{$faculty['faculty']->maori_title}}</small>@endif
        </h3>


        @if(count($faculty['faculty']->vocational_pathways))
        <ul class="list-inline">
        @foreach($faculty['faculty']->vocational_pathways as $vp)
        <li class="list-inline-item">
            <a href="{{ $page['vp'][$vp]['url']}}" class="text-white px-2 py-1 badge badge-vp-{{$vp}}" target="_BLANK">&nbsp;</a>
        </li>
        @endforeach
        </ul>
    @endif


        @if($faculty['faculty']->intro)
        <br>
        {{ $faculty['faculty']->intro }}
        <hr>
    @endif
        <ul>
        @foreach($faculty['subjectAreas'] as $subjectArea)
                @foreach($subjectArea['courses'] as $course)
                <li>
                    <a href="{{$course->getPath()}}">{{ $course->name }}</a>
                </li>
                @endforeach
        @endforeach
        </ul>
    </div>
    @endforeach
</div>

</details>
@endforeach



@endsection