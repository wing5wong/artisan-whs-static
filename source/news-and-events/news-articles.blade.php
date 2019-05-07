---
pagination:
    collection: news
    perPage: 15
---
@extends('_layouts.standard')
@section('title', "News")
@section('content')
<h1 class="decorated py-3 mb-4">News Articles</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')

@foreach ($pagination->items as $n)
<div class="row mb-5">
    <div class="col-2">
        <img src="{{ $n->featured_image ?: "https://res.cloudinary.com/whanganuihigh/image/upload/v1554149869/logo_vertical_t.png" }}" style="object-fit: cover;width: 100%;">
    </div>
    <div class="col-10">
        <h2>{{$n->title}}<br>
            <small>{{ date('F j, Y', $n->date) }} </small>
        </h2>
        <div class="row">
            <div class="col-10">
                {{ $n->excerpt}}
                <a href="{{$n->getPath()}}">Read More</a>
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