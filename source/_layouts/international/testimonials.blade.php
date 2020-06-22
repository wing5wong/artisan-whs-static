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
  
  <div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4">
      {{-- <img src="{{ $student->image }}" width="140" height="186" alt=""> --}}
      <img src="{{ $student->image }}" height="186" alt="">
    </div>
    <div class="col-sm-12 col-md-8 col-lg-8">
      <details>
        <summary>
          <h2 class="decorated d-table my-5">{{ $student->title}}
            <br><small class="text-muted">{{ $student->place ?? ""}}</small>
          </h2>
        </summary>


        {!! $student !!}

      </details>

    </div>
  </div>
</article>

@endforeach


@include('_partials.lastReviewed')

@endsection