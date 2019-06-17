@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


@yield('postContent')

<ul>
@foreach ($honours as $h)
<li>
    <h2>{{ date('Y', $h->date) }} {{$h->title}}</h2>
</li>
@endforeach
</ul>

@include('_partials.lastReviewed')

@endsection