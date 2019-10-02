@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
<main>
    <h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


    @yield('postContent')

    @foreach($scholarships as $scholarship)
    <details>
        <summary>
            <h2 class="decorated d-table my-5">{{ $scholarship->title }}
                <br><small class="text-muted">Eligibility:{{ $scholarship->eligible}}</small>
            </h2>
        </summary>

        {!! $scholarship !!}

        @if($scholarship->url)<a href="{{ $scholarship->url }}" class="btn btn-light">Apply online</a>@endif
        @if($scholarship->file)<a href="{{ $scholarship->file }}" class="btn btn-light">Download an application form</a>@endif
    </details>
    @if(!$loop->last)<hr>@endif
    @endforeach

</main>

@include('_partials.lastReviewed')
@endsection