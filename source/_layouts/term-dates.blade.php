@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')

@foreach($term_dates as $td)
<h2>{{$td->title}}</h2>

{!! $td !!}

<h3>Start Dates</h3>
<table>
    @foreach($td->start_dates as $date)
        <tr>
            <td>{{ $date->body }}</td>
            <td>{{ $date->date }}</td>
        </tr>
    @endforeach
</table>

<h3>End Dates</h3>
<table>
    @foreach($td->end_dates as $date)
        <tr>
            <td>{{ $date->body }}</td>
            <td>{{ $date->date }}</td>
        </tr>
    @endforeach
</table>
@endforeach

@include('_partials.lastReviewed')

@endsection