@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

@yield('postContent')

@php
    $applicationForm = $school_documents->filter(function($doc){
        return strpos($doc->title, "Edith Wheal") >= -1;
    });
@endphp

<a href="{{ $applicationForm->file }}" class="btn btn-light">Download the application form</a>

@include('_partials.lastReviewed')



@endsection