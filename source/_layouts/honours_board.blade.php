@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


@yield('postContent')

<ul>
@foreach ($honours->groupBy('award') as $category)
<li>
    <h2>{{$category->first()->award}}</h2>

    <h2>{{ date('Y', $category->first()->date) }} {{$category->first()->title}}</h2>
</li>
@endforeach
</ul>

@include('_partials.lastReviewed')

@endsection