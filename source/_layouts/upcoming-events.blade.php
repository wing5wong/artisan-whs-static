---
pagination:
    collection: events
    perPage: 5
---
@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} 
@if($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->image }}" style="object-fit: cover;width: 100%;">
@endif 

@yield('postContent')


<table class="table table-striped table-borderless table-hover">
@foreach($pagination->items as $event)
<tr>
    <td>{{$event->title}}</td>
    <td>{{ date('F j, Y', $event->date) }}</td>
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