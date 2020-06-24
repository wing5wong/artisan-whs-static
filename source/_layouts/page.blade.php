@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

@yield('postContent')

@if($page->blocks)
@foreach($page->blocks as $block)
    @include('_partials.blocks.' . $block["type"], ['block'=>$block])
@endforeach
@endif

@include('_partials.lastReviewed')

@endsection