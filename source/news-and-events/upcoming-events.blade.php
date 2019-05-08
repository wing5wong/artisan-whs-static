---
pagination:
    collection: events
    perPage: 5
---
@extends('_layouts.standard')
@section('title', "Upcoming Events")
@section('content')
<h1 class="decorated">Upcoming Events</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->image }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')


@foreach($pagination->items as $event)
<div class="row mb-5">
    <div class="col-2">
        <img src="{{ $event->image ?: "https://res.cloudinary.com/whanganuihigh/image/upload/v1554149869/logo_vertical_t.png" }}" style="object-fit: cover;width: 100%;">
    </div>
    <div class="col-10">
        <h2>{{$event->title}}<br>
            <small>{{ date('F j, Y', $event->date) }} </small>
        </h2>
        <div class="row">
            <div class="col-10">
                <a href="{{$event->getPath()}}">Read More</a>
            </div>
        </div>
    </div>
</div>
@endforeach


@if ($previous = $pagination->previous)
<a href="{{ $page->baseUrl }}{{ $pagination->first }}">&lt;&lt;</a>
<a href="{{ $page->baseUrl }}{{ $previous }}">&lt;</a>
@endif

@foreach ($pagination->pages as $pageNumber => $path)
@if($pagination->currentPage == $pageNumber)
{{ $pageNumber }}
</a>
@else
<a href="{{ $page->baseUrl }}{{ $path }}">
    {{ $pageNumber }}
</a>
@endif
@endforeach

@if ($next = $pagination->next)
<a href="{{ $page->baseUrl }}{{ $next }}">&gt;</a>
<a href="{{ $page->baseUrl }}{{ $pagination->last }}">&gt;&gt;</a>
@endif
@endsection