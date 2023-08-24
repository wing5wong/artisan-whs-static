@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">Enrolments and Prospectus</h1>

 @if ($page->image)

<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif

@yield('postContent')
@php
$prospectus = $school_documents->filter(function($doc){
    return strpos($doc->title, "Prospectus") >= -1;
})->first();
@endphp
<h2>Prospectus</h2>
<table>
    <tr>
        <td width="35%">
                {{ date('Y', $prospectus->date) }}
        </td>
        <td>
                <a href="{{ $prospectus->file}}">{{ str_replace("Enrolments - ", "", $prospectus->title) }}</a>
        </td>
    </tr>
</table>


{{--

@php
    $enrolmentForms = $school_documents->filter(function($doc){
        return strpos($doc->title, "Enrolments") >= -1;
    })->sort(function($a, $b){
        if(date('Y', $a->date) === date('Y', $b->date)){
            return -($a->title <=> $b->title);
        }
        return -($a->date <=> $b->date);
    });
@endphp

<h2>Enrolment Application Forms</h2>
<table>
    <tr>
        <th width="35%">Year of Enrolment</th>
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

--}}

@include('_partials.lastReviewed')



@endsection
