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

<table class="my-5 table table-bordered">
    <tr>
        <td class="table-secondary"><strong>Level:</strong> 
            {{ $page->course_level }}
        </td>
        <td class="table-light"><strong>Type:</strong> 
        
            {{ $page->type }} 
        </td>
        <td class="table-light"><strong>Duration:</strong> 
        
            {{ $page->course_duration }}
        </td>
    </tr>
    <tr>
        <td class="table-light"><strong>Assessment:</strong> 
        
            {{ $page->assessment_type }}
        </td>
        <td class="table-secondary"><strong>Credits:</strong> 
        
            {{ $page->credits }}
        </td>
        <td class="table-light"><strong>U.E. Approved:</strong> 
        
            {{$page->ue_approved ? "Yes" : "No"}}
        </td>
        <td class="table-secondary"><strong>Endorsement:</strong> 
        
            {{$page->endorsement ? "Yes" : "No"}}
        </td>
    </tr>
    <tr>
        <td class="table-light"><strong>Invitation Only:</strong> 
        
            {{$page->invitation_only ? "Yes" : "No"}}
        </td>
        <td class="table-secondary"><strong>Contribution:</strong> 
            {{ $page->course_fees }}
        </td>
    </tr>

    @if(($page->leads_to) and(is_array($page->leads_to)))
    <tr>
        <td><strong>Leads To:</strong>
            @foreach($courses->whereIn('code', $page->leads_to) as $leads)
                <a href="{{$leads->getPath()}}">{{ $leads->code }}</a>@if(!$loop->last), @endif
            @endforeach
        </td>
    </tr>
    @endif
    
    @if($page->notes)
    <tr>
        <td><strong>Notes:</strong>
        {{ $<strong>page->notes }}
        
        </td>
    </tr>
    @endif
</table>



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
        <th>U.E. Reading</th>
        <th>U.E. Writing</th>
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
@endif


Other courses in {{ $page->subject_area }}:
<ul>
@foreach($courses
->where('subject_area', $page->subject_area)
->where('title','<>',  $page->title) as $c)
<li>
    <a href="{{$c->getPath()}}">{{ $c->name }} ({{$c->course_level}})</a>
</li>
@endforeach
</ul>


@include('_partials.lastReviewed')

@endsection