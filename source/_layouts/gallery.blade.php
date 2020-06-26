@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
<main>
    <h1 class="decorated py-3 mb-4">{{ $page->title }}
        <br><small>{{ date('F j, Y', $page->date) }}</small></h1>



</main>
@include('_partials.lastReviewed')
@endsection