---
pagination:
    collection: news
    perPage: 2
---
@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')


<ul>
@foreach ($pagination->items as $n)
<li>
    <h2>{{$n->title}} - {{ date('F j, Y', $n->date) }}</h2>
    {!! $n !!}
</li>
@endforeach
</ul>

@if ($previous = $pagination->previous)
    <a href="{{ $page->baseUrl }}{{ $pagination->first }}">&lt;&lt;</a>
    <a href="{{ $page->baseUrl }}{{ $previous }}">&lt;</a>
@else
    &lt;&lt; &lt;
@endif

@foreach ($pagination->pages as $pageNumber => $path)
    <a href="{{ $page->baseUrl }}{{ $path }}"
        class="{{ $pagination->currentPage == $pageNumber ? 'selected' : '' }}">
        {{ $pageNumber }}
    </a>
@endforeach

@if ($next = $pagination->next)
    <a href="{{ $page->baseUrl }}{{ $next }}">&gt;</a>
    <a href="{{ $page->baseUrl }}{{ $pagination->last }}">&gt;&gt;</a>
@else
    &gt; &gt;&gt;
@endif

<hr>

<p>
    <strong>Last Reviewed: {{ date('F j, Y', $page->date) }}</strong><br> @foreach ($page->tags as $tag)
    <a href="/tags/{{ $tag }}">{{ $tag }}</a> {{ $loop->last ? '' : '-' }} @endforeach
</p>


<blockquote data-phpdate="{{ $page->date }}">
    <em>WARNING: This post is over a year old. Some of the information this contains may be outdated.</em>
</blockquote>


@if ($page->comments)
    @include('_partials.comments') @else
<p>Comments are not enabled for this post.</p>
@endif
@endsection