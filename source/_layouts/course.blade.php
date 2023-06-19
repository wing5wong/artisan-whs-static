@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }} - {{ $page->name }}</h1>

@php
$subject = $subject_areas->firstWhere('title', $page->subject_area);
$faculty = $faculties->firstWhere('title',$subject->faculty);
@endphp

<ul class="nav">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/curriculum/course-options/">Course Selections</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{$faculty->getPath()}}">{{$faculty->title}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{$subject->getPath()}}">{{$subject->title}}</a>
            </li>
        </ol>
    </nav>
</ul>

<table class="my-5 table table table-bordered table-striped table-hover">
    @if($page->entry_requirements)
    <tr>
        <td colspan='4' class="bg-success text-white">
            <strong>Entry Requirements:</strong> <br>
            {{ $page->entry_requirements }}
        </td>
    </tr>
    @endif
    <tr>
        <td>
            <strong>Level:</strong> <br>
            {{ $page->course_level }}
        </td>
        <td>
            <strong>Type:</strong> <br>
            {{ $page->type }}
        </td>
        <td>
            <strong>Duration:</strong> <br>

            {{ $page->course_duration }}
        </td>
        <td>
            <strong>Invitation Only:</strong> <br>
            {{$page->invitation_only ? "Yes" : "No"}}
        </td>
    </tr>
    @if($page->assessment_type)
    <tr>
        <td>
            <strong>Assessment:</strong> <br>
            {{ $page->assessment_type ?: "-" }}
        </td>
        <td>
            <strong>Credits:</strong> <br>
            {{$page->getAvailableCredits($assessments)}}
        </td>
        <td>
            <strong>Endorsement:</strong> <br>
            {{$page->endorsement ? "Yes" : "No"}}
        </td>
        <td>
            @if($page->ue_approved)
            <strong>U.E. Approved:</strong> <br>
            {{$page->ue_approved ? "Yes" : "No"}}
            @endif
        </td>
        
    </tr>
    @endif

    @if(($page->leads_to) and(is_array($page->leads_to)))
    <tr>
        <td colspan='4'><strong>Leads To:</strong> <br>
            @foreach($courses->whereIn('code', $page->leads_to) as $leads)
            <a href="{{$leads->getPath()}}">{{ $leads->name }} ({{$leads->course_level}})</a>@if(!$loop->last), @endif
            @endforeach
        </td>
    </tr>
    @endif

    @if($page->course_fees)
    <tr>
        <td colspan='4'>
            <strong>Contribution:</strong> <br>
            {{ $page->course_fees }}
        </td>
    </tr>
    @endif

    @if($page->notes)
    <tr>
        <td colspan='4'><strong>Notes:</strong> <br>
            {{ $page->notes }}
        </td>
    </tr>
    @endif
</table>




{!! $page !!}



<?php
if($page->standards and is_array($page->standards))
{
    $courseAssessments = collect($page->standards)->map(function($s) use ($assessments){
        return $assessments->firstWhere('title', $s);
    });
}
else {
    $courseAssessments = $assessments->filter(function ($assessment) use ($page) {
        if (!is_array($assessment->categories)) {
            return false;
        }
        foreach ($assessment->categories as $c) {
            if (strtolower($c) == strtolower($page->title ?? '')) {
                return true;
            }
        }
        return false;
    });
}

?>
@if(count($courseAssessments)>0)
<section class="my-5">
    <h3 class="d-inline">Available Standards:</h3>
    Some or all of the following will be offered

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Level</th>
                <th>Credits</th>
                <th>Assessment</th>
                <th>U.E. Reading</th>
                <th>U.E. Writing</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courseAssessments as $assessment)
            <tr>
                <td>
                    <a href="{{ $assessment->pdf }}">{{ $assessment->title }}</a>
                </td>
                <td>
                    {{ $assessment->description }}
                </td>
                <td>
                    {{ $assessment->level }}
                </td>
                <td>
                    {{ $assessment->credits }}
                </td>
                <td>
                    {{ $assessment->assessment }}
                </td>
                <td>
                    {{ $assessment->ue_lit_reading ? "Yes" : "No"}}
                </td>
                <td>
                    {{ $assessment->ue_lit_writing ? "Yes" : "No"}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endif

@php
$otherCourses = $courses
->where('subject_area', $page->subject_area)
->where('title','<>', $page->title)
    @endphp
    @if(count($otherCourses))
    <section class="mt-5">
        Other courses in {{ $page->subject_area }}:
        <ul>
            @foreach($otherCourses as $c)
            <li>
                <a href="{{$c->getPath()}}">{{ $c->name }} ({{$c->course_level}})</a>
            </li>
            @endforeach
        </ul>
    </section>
    @endif

    @include('_partials.lastReviewed')

    @endsection
