@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

 
@if ($page->image)

<a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
        <img src="{{ $page->image }}"  style="object-fit: cover; max-width:100%; display: block;">
    </a>
@endif

@yield('postContent')


<ul>
@foreach ($news as $n)
<li>
    <h2>{{$n->title}} - {{ date('F j, Y', $n->date) }}</h2>
    {!! $n !!}
</li>
@endforeach
</ul>

@include('_partials.lastReviewed')

@endsection