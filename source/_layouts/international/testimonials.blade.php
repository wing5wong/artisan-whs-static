@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

@if($page->image)
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;">
@endif


@yield('postContent')

@foreach($testimonials->where('international', true) as $student)
<article class="py-3">
        <h2 class="decorated py-3 mb-4">
               {{ $student->title}}
          <span class="text-muted">{{ $student->place ?? ""}}</span>
            </h2>
        <div class="row">
          <div class="col-sm-12 col-md-4 col-lg-4">
            <img src="{{ $student->image }}" width="140" height="186" alt="">
          </div>
          <div class="col-sm-12 col-md-8 col-lg-8">
            {!! $student !!}
          </div>
        </div>
      </article>

@endforeach


@include('_partials.lastReviewed')

@endsection