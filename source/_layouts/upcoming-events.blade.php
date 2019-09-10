---
pagination:
    collection: events
    perPage: 5
---
@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated">{{ $page->title }}</h1>

 
@if($page->image)

<a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
        <img src="{{ $page->image }}"  style="object-fit: cover; max-width:100%; display: block;">
    </a>
@endif 

@yield('postContent')


<table class="table table-striped table-borderless table-hover">
    <thead>
        <tr>
            <td>Date</td>
            <td>Event</td>
            <td></td>
        </tr>
    </thead>
@foreach($pagination->items as $event)
<tr>
    <td>{{ date('F j, Y', $event->date) }}</td>
    <td>{{$event->title}}</td>
    <td><a href="{{$event->getPath()}}">Read More</a></td>
</tr>
@endforeach
</table>


@if ($previous = $pagination->previous)
<a href="{{ $page->baseUrl }}{{ $pagination->first }}">&lt;&lt;</a>
<a href="{{ $page->baseUrl }}{{ $previous }}">&lt;</a>
@endif

@foreach ($pagination->pages as $pageNumber => $path)
@if($pagination->currentPage == $pageNumber)
{{ $pageNumber }}
</a>
@else
    @if( ($pagination->currentPage - $pageNumber <=5) or ($pageNumber - $pagination->currentPage <= 5))
    <a href="{{ $page->baseUrl }}{{ $path }}">
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