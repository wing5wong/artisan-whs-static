---
pagination:
    collection: news
    perPage: 5
---
@extends('_layouts.standard')
@section('title', "News")
@section('content')
<h1 class="decorated py-3 mb-4">News Articles</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')
the news articles index
@endsection