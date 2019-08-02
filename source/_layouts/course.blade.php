@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }} - {{ $page->name }}</h1>

{!! $page !!}

@if($page->entry_requirements)
<div class="card text-white bg-success my-5">
    <h3 class="card-header">Entry Requirements:</h3>
    <div class="card-body">
        <p class="card-text">{{ $page->entry_requirements }}</p>
    </div>
</div>
@endif

<table class="my-5">
    <tr>
        <th>Assessment</th>
        <th>Level</th>
        <th>Duration</th>
    </tr>
    <tr>
        <td>
                {{ $page->assessment_type }}
        </td>
        <td>
                {{ $page->course_level }}
        </td>
        <td>
                {{ $page->course_duration }}
        </td>
    </tr>
    <tr>
        <th>Credits</th>
        <th>Type</th>
        <th>Contribution</th>
    </tr>
    <tr>
        <td>
                {{ $page->credits }}
        </td>
        <td>
                {{ $page->type }} 
        </td>
        <td>
                {{ $page->course_fees }}
        </td>
    </tr>
    <tr>
        <th>U.E. Approved</th>
        <th>Endorsement</th>
        <th>Invitation Only</th>
    </tr>
    <tr>
        <td>
                {{$page->ue_approved ? "Yes" : "No"}}
        </td>
        <td>
                {{$page->endorsement ? "Yes" : "No"}}
        </td>
        <td>
                {{$page->invitation_only ? "Yes" : "No"}}
        </td>
    </tr>
</table>


@if($page->background)
<h3 class="d-inline">Purpose:</h3> {{ $page->background }} <br><br>
@endif


@if(($page->leads_to) and(is_array($page->leads_to)))
<h3 class="d-inline">Leads To:</h3> @foreach($courses->whereIn('code', $page->leads_to)->all() as $leads)
<a href="{{$leads->getPath()}}">{{ $leads->code }}</a>@if(!$loop->last), @endif
@endforeach  <br><br>
@endif


<?php
$courseAssessments = $assessments->filter(function($assessment) use ($page){
    if(!is_array($assessment->categories)){ return false; }
    foreach($assessment->categories as $c){
        if(strtolower($c) == strtolower($page->title)){
            return true;
        }
    }
    return false;
});
?>
@if(count($courseAssessments)>0)
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
    </tr>
</thead>
<tbody>
@foreach($courseAssessments->sortBy('title') as $assessment)
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
    
</tr>
@endforeach
</tbody>
</table>
@endif

@if($page->notes)
<h3 class="d-inline">Notes:</h3> {{ $page->notes }} <br><br>
@endif


Other courses in {{ $page->subject_area }}:
<ul>
@foreach($courses
->where('subject_area', $page->subject_area)
->where('title','<>',  $page->title)
->all() as $c)
<li>
    <a href="{{$c->getPath()}}">{{ $c->name }} ({{$c->course_level}})</a>
</li>
@endforeach
</ul>


@include('_partials.lastReviewed')

@endsection