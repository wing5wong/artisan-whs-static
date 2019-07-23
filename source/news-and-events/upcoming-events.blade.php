---
pagination:
collection: events
perPage: 25
---
@extends('_layouts.standard')
@section('title', "Upcoming Events")
@section('content')
<h1 class="decorated py-3 mb-4">Upcoming Events</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if
($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->image }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')


<div class="row mb-5">
    <table class="table table-striped table-borderless table-hover">
        @foreach($pagination->items as $event)
        <tr>
            <td>{{$event->title}}</td>
            <td>{{ date('F j, Y', $event->date) }}</td>
            <td><a href="{{$event->getPath()}}">Read More</a></td>
        </tr>
        @endforeach
    </table>
    {{--
        @foreach($pagination->items as $event)
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card bg-light mb-3 mb-3" style="max-width: 18rem;">
            <img class="card-img-top"
                src="{{ $event->image ?: "https://res.cloudinary.com/whanganuihigh/image/upload/v1554149869/logo_vertical_t.png" }}"
                style="object-fit: contain; max-height: 200px">
            <div class="card-header">{{ date('F j, Y', $event->date) }}</div>
            <div class="card-body">
                <h5 class="card-title">{{$event->title}}</h5>
                <p class="card-text">
                    <a href="{{$event->getPath()}}">Event Details</a>
                </p>
            </div>
        </div>
    </div>
    @endforeach
    --}}
</div>


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