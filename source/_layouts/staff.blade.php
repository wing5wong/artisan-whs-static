@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->image }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')


<?php
foreach([
"Art",
"Associate Principal",
"Board of Trustees",
"Deans",
"Deputy Principal",
"Digital Technology",
"English",
"Faculty Heads",
"Guidance Counsellors",
"Instrumental Music Tutors",
"International",
"Languages",
"Learning Support Centre",
"Librarians",
"Mathematics",
"Physical Education and Health",
"Principal",
"Science",
"Social Sciences",
"Sports",
"Study / External Studies",
"Support and Ancilliary",
"Te Atawhai (Special Needs)",
"Technology",
"Vocational Studies / Gateway"
] as $dept){

$filteredStaff = $staff->filter(function($s) use ($dept){
return in_array($dept,$s->departments);
})
->map(function($person){
return $person->title;
})->toArray();
if(!empty($filteredStaff)){
echo "<h2>" . $dept . "</h2>";


echo implode(", ", $filteredStaff);
echo "<hr />";
}

}
?>



    <p>
        <strong>{{ date('F j, Y', $page->date) }}</strong><br> @foreach ($page->tags as $tag)
        <a href="/tags/{{ $tag }}">{{ $tag }}</a> {{ $loop->last ? '' : '-' }} @endforeach
    </p>


    <blockquote data-phpdate="{{ $page->date }}">
        <em>WARNING: This post is over a year old. Some of the information this contains may be outdated.</em>
    </blockquote>



    @if ($page->comments)
    @include('_partials.comments') @else
    <p>Comments are not enabled for this post.</p>
    @endif
@endsection