@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif

@yield('postContent')


@php
    $enrolmentForms = $school_documents->filter(function($doc){
        return strpos($doc->title, "Enrolments") >= -1;
    })->sortBy('-title')->sortBy('-date');
@endphp

<table>
    <tr>
        <th>Year of Enrolment</th>
        <th>Enrolment Form</th>
    </tr>
@foreach($enrolmentForms as $form)
    <tr>
        <td>
                {{ date('Y', $form->date) }}
        </td>
        <td>
                <a href="{{ $form->file}}">{{ str_replace("Enrolments - ", "", $form->title) }}</a>
        </td>
    </tr>
@endforeach
</table>

@include('_partials.lastReviewed')



@endsection