@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

@yield('postContent')

@php
    $applicationForm = $school_documents->filter(function($doc){
        return strpos($doc->title, "Edith Wheal Application") >= -1;
    })->first();

    $fullForm = $school_documents->filter(function($doc){
        return strpos($doc->title, "Edith Wheal Full") >= -1;
    })->first();
@endphp

<a href="{{ $applicationForm->file }}" class="btn btn-light">Download the application form</a>
<a href="{{ $fullForm->file }}" class="btn btn-light">Download all information</a>

@include('_partials.lastReviewed')



@endsection