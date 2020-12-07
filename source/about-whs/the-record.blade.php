---
pagination:
    collection: the_record
    perPage: 25
---
@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated">{{ $page->title }}</h1>

@yield('postContent')


<ul>
    @foreach($pagination->items as $record)
    <li>
        {{$record->title}}
        <a href="{{$record->file}}">Download</a>
    </li>
    @endforeach
</ul>

@if ($previous = $pagination->previous)
<a href="{{ $page->baseUrl }}{{ $pagination->first }}">&lt;&lt;</a>
<a href="{{ $page->baseUrl }}{{ $previous }}">&lt;</a>
@endif

@foreach ($pagination->pages as $pageNumber => $path)
@if($pagination->currentPage == $pageNumber)
{{ $pageNumber }}
</a>
@else
@if( ($pagination->currentPage - $pageNumber <=5) or ($pageNumber - $pagination->currentPage <= 5)) <a
        href="{{ $page->baseUrl }}{{ $path }}">
        {{ $pageNumber }}
        </a>
        @endif
        @endif
        @endforeach

        @if ($next = $pagination->next)
        <a href="{{ $page->baseUrl }}{{ $next }}">&gt;</a>
        <a href="{{ $page->baseUrl }}{{ $pagination->last }}">&gt;&gt;</a>
        @endif
        @endsection