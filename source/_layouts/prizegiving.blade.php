@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


@yield('postContent')


<table>
    <thead>
        <tr>
            <th>Year</th>
            <th>Download Booklet</th>
        </tr>
    </thead>
@foreach ($prizegiving_booklets as $booklet)
<tr>
        <td width="30%">{{ date('F j, Y', $booklet->date) }}</td>
        <td>
            <a href="{{$booklet->file}}" download>{{$booklet->title}}</a>
        </td>
    
    </tr>
@endforeach
</table>


@include('_partials.lastReviewed')

@endsection