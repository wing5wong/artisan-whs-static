@extends('_layouts.standard') 

@section('title', $page->title) 

@section('content')
<main>
    <h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

    @if($page->closing_date)
        {{ $page->closing_date }}
    @endif
    @yield('postContent')

    @if($page->file)
    <a href="{{$page->file}}" download class="btn btn-light mb-5">Download PDF</a>
    @endif

     </main>
    @include('_partials.lastReviewed')
@endsection