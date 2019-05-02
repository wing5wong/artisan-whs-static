@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{!! $page !!}

Course Type: {{ $page->type }}
Course credits: {{ $page->credits }}
Course duration: {{ $page->duration }}

Purpose:
{{ $page->purpose }}

Entry Requirements: {{ $page->requirements }}
Course Contribution: {{ $page->contribution }}
Course Assessment: {{ $page->assessment }}

Leads to: {{ $page->leads_to }}

Available Standards: {{ $page->standards }}

Notes: {{ $page->notes }}

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