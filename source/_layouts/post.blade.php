@extends('_layouts.standard') 

@section('title', $page->title) 

@section('content')
    <h1 class="decorated">{{ $page->title }}</h1>

    {{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
    <!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
    <img src="{{ $page->image }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')

    <p>
        <strong>{{ date('F j, Y', $page->date) }}</strong><br> @foreach ($page->tags as $tag)
        <a href="/tags/{{ $tag }}">{{ $tag }}</a> {{ $loop->last ? '' : '-' }} @endforeach
    </p>

    @if($page->date - date() > 365)
    <blockquote data-phpdate="{{ $page->date }}">
        <em>WARNING: This post is over a year old. Some of the information this contains may be outdated.</em>
    </blockquote>
    @endif


    @if ($page->comments)
        @include('_partials.comments')
    @else
        <p>Comments are not enabled for this post.</p>
    @endif
@endsection