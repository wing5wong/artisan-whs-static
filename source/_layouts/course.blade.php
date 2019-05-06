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

<h3 class="d-inline">Leads to:</h3> {{ $page->leads_to }} <br>

<h3 class="d-inline">Available Standards:</h3>
Some or all of the following will be offered


@foreach($assessments->filter(function($assessment) use ($page){
    if(!is_array($assessment->categories)){ return false; }
    foreach($assessment->categories as $c){
        if($c == $page->title){
            return true;
        }
    }
    return false;
}) as $assessment)
{{$assessment->title }}
@endforeach


<br>

<h3 class="d-inline">Notes:</h3> {{ $page->notes }}

<hr>

<p>
    <strong>Last Reviewed: {{ date('F j, Y', $page->date) }}</strong>

    <br>

@if($page->tags)
    @foreach ($page->tags as $tag)
    <a href="/tags/{{ $tag }}">{{ $tag }}</a> {{ $loop->last ? '' : '-' }} @endforeach
    @endif
</p>


<blockquote data-phpdate="{{ $page->date }}">
    <em>WARNING: This post is over a year old. Some of the information this contains may be outdated.</em>
</blockquote>
@endsection