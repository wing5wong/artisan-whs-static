@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

 @if ($page->image)

<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')


<h2 class="decorated d-table mt-5 mb-2">Current Vacancies</h2>
@forelse($vacancies as $vacancy)
<div class="row">
    <div class="col-sm-12 col-md-6">
        <h3>{{$vacancy->title}}</h3>
        <p>Applications close: {{ date('F j, Y', $vacancy->date) }}</p>

    </div>
    <div class="col-sm-12 col-md-6">
        <a href="mailto:{{$vacancy->email ?: " principal@whs.ac.nz "}}?subject=Application:{{$vacancy->title}}" class="btn btn-light mb-5">Apply for this position.</a>
    </div>
    <div class="col-12">
        {!! $vacancy !!}
    </div>
</div>
@if(!$loop->last)
<hr >
@endif

@empty
<strong>SORRY, BUT THERE ARE CURRENTLY NO VACANCIES.</strong>
@endforelse


@include('_partials.lastReviewed')

@endsection