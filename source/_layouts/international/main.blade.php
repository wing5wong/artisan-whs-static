@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

@if($page->image)
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;">
@endif


@yield('postContent')

@if($page->blocks)
@foreach($page->blocks as $block)
    @include('_partials.blocks.' . $block["type"], ['block'=>$block])
@endforeach
@endif

@include('_partials.lastReviewed')

@endsection