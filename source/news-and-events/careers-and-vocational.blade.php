---
pagination:
    collection: career_news
    perPage: 25
---
@extends('_layouts.standard')
@section('title', "Career and Vocational News")
@section('content')
<h1 class="decorated py-3 mb-4">Career and Vocational News</h1>

 
@if($page->image)

<a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
        <img src="{{ $page->image }}"  style="object-fit: cover; max-width:100%; display: block;">
    </a>
@endif

@yield('postContent')


<div class="row mb-5">
    <div class="col">
    <table class="table table-striped table-borderless table-hover">
        @foreach($pagination->items as $news)
        <tr>
            <td>{{$news->title}}</td>
            <td>{{ date('l, j F, Y', $news->date) }}</td>
            <td><a href="{{$news->getPath()}}">Read More</a></td>
        </tr>
        @endforeach
    </table>
</div>
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