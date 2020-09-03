@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
<main>
    <h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

    @if($page->closing_date)
    <p>
        <strong> Closing Date:</strong> {{ date('F j, Y', $page->closing_date) }}
    </p>
    @endif

    @if($page->file)
    <a href="{{$page->file}}" download class="btn btn-light mb-5">Download PDF</a>
    @endif

    @if($page->closing_date or $page->file)
    <hr>
    @endif

    @yield('postContent')

</main>
@include('_partials.lastReviewed')
@endsection