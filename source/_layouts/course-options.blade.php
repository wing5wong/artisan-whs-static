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




<ul class="nav nav-tabs" id="myTab" role="tablist">

    @foreach($levels as $level=>$levelTitle)
    <li class="nav-item">
        <a class="nav-link active" id="year-{{$level}}-tab" data-toggle="tab" href="#year-{{$level}}" role="tab"
            aria-controls="year-{{$level}}" @if($loop->first)aria-selected="true"@endif>{{ $levelTitle }}</a>
    </li>
    @endforeach
</ul>
<div class="tab-content" id="myTabContent">

    @foreach($levels as $level=>$levelTitle)
    <div class="tab-pane fade @if($loop->first) show active @endif" id="year-{{$level}}" role="tabpanel" aria-labelledby="year-{{$level}}-tab">

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
            <div class="col-6">
                <h3 class="d-table mt-3">
                    {{ $faculty['faculty']->title}}
                    @if($faculty['faculty']->maori_title)<br><small
                        class="text-muted">{{$faculty['faculty']->maori_title}}</small>@endif
                </h3>


                @if($page->yearLevelOffersVocationalPathways($level) and count($faculty['faculty']->vocational_pathways
                ?? []))
                <ul class="list-inline">
                    @foreach($faculty['faculty']->vocational_pathways as $vp)
                    <li class="list-inline-item">
                        <a href="{{ $page['vp'][$vp]['url']}}" class="text-white px-2 py-1 badge badge-vp-{{$vp}}"
                            title="{{ $page['vp'][$vp]['name']}}" target="_BLANK">{{$page['vp'][$vp]['code']}}</a>
                    </li>
                    @endforeach
                </ul>
                @endif


                @if($faculty['faculty']->intro)
                <br>
                {{ $faculty['faculty']->intro }}
                @endif



                <div class="list-group my-4">
                    @foreach($faculty['courses'] as $course)
                    <a class="list-group-item list-group-item-action"
                        href="{{$course->getPath()}}">{{ $course->name }}</a>
                    @endforeach
                </div>

            </div>
            @endforeach
        </div>

    </div>
    @endforeach

</div>



@foreach($levels as $level=>$levelTitle)
<details class="mb-4">
    <summary>
        <h2 class="decorated d-table">{{ $levelTitle }}
    </summary>
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
        <div class="col-6">
            <h3 class="d-table mt-3">
                {{ $faculty['faculty']->title}}
                @if($faculty['faculty']->maori_title)<br><small
                    class="text-muted">{{$faculty['faculty']->maori_title}}</small>@endif
            </h3>


            @if($page->yearLevelOffersVocationalPathways($level) and count($faculty['faculty']->vocational_pathways ??
            []))
            <ul class="list-inline">
                @foreach($faculty['faculty']->vocational_pathways as $vp)
                <li class="list-inline-item">
                    <a href="{{ $page['vp'][$vp]['url']}}" class="text-white px-2 py-1 badge badge-vp-{{$vp}}"
                        title="{{ $page['vp'][$vp]['name']}}" target="_BLANK">{{$page['vp'][$vp]['code']}}</a>
                </li>
                @endforeach
            </ul>
            @endif


            @if($faculty['faculty']->intro)
            <br>
            {{ $faculty['faculty']->intro }}
            @endif



            <div class="list-group my-4">
                @foreach($faculty['courses'] as $course)
                <a class="list-group-item list-group-item-action" href="{{$course->getPath()}}">{{ $course->name }}</a>
                @endforeach
            </div>

        </div>
        @endforeach
    </div>

</details>
@endforeach



@endsection