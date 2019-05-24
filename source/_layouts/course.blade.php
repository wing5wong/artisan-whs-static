@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{!! $page !!}

<h3 class="d-inline">Course Type:</h3> {{ $page->type }} <br>
<h3 class="d-inline">Course credits:</h3> {{ $page->credits }} <br>
<h3 class="d-inline">Course duration:</h3> {{ $page->duration }} <br>

<h3 class="d-inline">Purpose:</h3> {{ $page->purpose }} <br>

<h3 class="d-inline">Entry Requirements:</h3> {{ $page->requirements }} <br>
<h3 class="d-inline">Course Contribution:</h3> {{ $page->contribution }} <br>
<h3 class="d-inline">Course Assessment:</h3> {{ $page->assessment }} <br>

<h3 class="d-inline">Leads to:</h3> @foreach(explode(",", $page->leads_to) as $leads)<a href="/courses/{{ trim($leads) }}/">{{ trim($leads) }}</a> @endforeach  <br>

<?php
$courseAssessments = $assessments->filter(function($assessment) use ($page){
    if(!is_array($assessment->categories)){ return false; }
    foreach($assessment->categories as $c){
        if($c == $page->title){
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
        <th>Level</th>
        <th>Credits</th>
        <th>Assessment</th>
    </tr>
</thead>
<tbody>
@foreach($courseAssessments as $assessment)
<tr>
    <td>
        <a href="{{ $assessment->pdf }}">{{ $assessment->title }}</a>
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
<br>
@endif

<h3 class="d-inline">Notes:</h3> {{ $page->notes }}


<br>
Other courses in {{ $page->subject_area }}:

<?php
$subjectAreaCourses = $courses->filter(function($c) use ($page){
    return $c->subject_area == $page->subject_area;
});
?>

<ul>
@foreach($subjectAreaCourses as $c)
<li>
<a href="{{$c->getPath()}}">{{ $c->title }}</a>
</li>
@endforeach
</ul>


@include('_partials.lastReviewed')

@endsection