@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


@yield('postContent')


<table>
    <thead>
        <tr>
            <th>Year</th>
            <th>Download Achievers List</th>
        </tr>
    </thead>
    @foreach ($achievers_lists as $list)
    <tr>
        <td width="30%">{{ date('Y', $list->date) }}</td>
        <td>
            <a href="{{$list->file}}" download>{{$list->title}}</a>
        </td>

    </tr>
    @endforeach
</table>


@include('_partials.lastReviewed')

@endsection