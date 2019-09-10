@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

 @if ($page->image)

<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif

@yield('postContent')


@php
    $lists = $school_documents->filter(function($doc){
        return strpos($doc->title, "Stationery") >= -1;
    })->sort(function($a, $b){
        if(date('Y', $a->date) === date('Y', $b->date)){
            return -($a->title <=> $b->title);
        }
        return -($a->date <=> $b->date);
    });
@endphp

<h2>Stationery Lists</h2>
<table>
    <tr>
        <th width="35%">Year</th>
        <th>Stationery List</th>
    </tr>
@foreach($lists as $list)
    <tr>
        <td>
                {{ date('Y', $list->date) }}
        </td>
        <td>
                <a href="{{ $list->file}}">{{ $list->title }}</a>
        </td>
    </tr>
@endforeach
</table>

@include('_partials.lastReviewed')



@endsection