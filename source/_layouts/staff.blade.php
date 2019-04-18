@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->image }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')

<h2 class="d-inline-block decorated">Senior Leadership Team</h2>
<div class="row">
<?php
foreach([
    "Principal",
    "Associate Principal",
    "Deputy Principal"] as $dept){
    $slt = $staff->filter(function($s) use ($dept){
        return in_array($dept,$s->departments);
    });

    foreach($slt as $person){
        ?>
        <article class="col-12 p-5 d-flex justify-content-around align-items-center">
                <div class="col">
                  <h2>{{$person->title}}</h2>
                      <p class="lead">{{$person->position}}</p>
                </div>
                <div class="col">
                        <img src="{{$person->image}}" alt="" width="600" alt="{{$person->title}}" style="max-width: 100%">
                </div>
              </article>
    <?php
    }
}
?>
</div>

        <?php
foreach([
"Art",
"Deans",
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
"Science",
"Social Sciences",
"Sports",
"Study / External Studies",
"Support and Ancilliary",
"Te Atawhai (Special Needs)",
"Technology",
"Vocational Studies / Gateway",
"Board of Trustees",
] as $dept){

$filteredStaff = $staff->filter(function($s) use ($dept){
return in_array($dept,$s->departments);
})
->map(function($person){
    $string = $person->title;
    if($person->position){
        $string .= " (" . $person->position . ")";
    }
return $string;
})->toArray();
if(!empty($filteredStaff)){
echo "<h2 class='d-table decorated mt-5 mb-2'>" . $dept . "</h2>";


echo implode(", ", $filteredStaff);

}

}
?>



            <p>
                <strong>Last Reviewed: {{ date('F j, Y', $page->date) }}</strong><br> @foreach ($page->tags as $tag)
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