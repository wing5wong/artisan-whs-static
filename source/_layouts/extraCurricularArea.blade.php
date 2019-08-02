@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

@if ($page->image)
<!--<img src="{{ $page->image }}" class="featured-image" style="object-fit: cover; height: 250px; width: 100%;">-->
<a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
        <img src="{{ $page->image }}"  style="object-fit: cover; max-width:100%; display: block;">
    </a>
 @endif

@yield('postContent')


    @foreach( 
        $extracurricular_activities->where('extracurricular_area', $page->title)->all() as $ec_activity
    )
    <h3>{{$ec_activity->title}}</h3>
    {!! $ec_activity !!}
    @endforeach

@include('_partials.lastReviewed')

@endsection
