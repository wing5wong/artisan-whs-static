@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
        <img src="{{ $page->image }}"  style="object-fit: cover; max-width:100%; display: block;">
    </a>
@endif @yield('postContent')

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
        <article class="col-sm-12 col-md-6 col-lg-6 p-5">
            <div class="row">    
            <div class="col-12">
                  <h3>{{$person->title}}</h3>
                      <p class="lead">{{$person->position}}</p>
                </div>
                <div class="col-12">
                        <img src="{{$person->image}}" alt="" width="600" alt="{{$person->title}}" style="max-width: 100%">
                </div>
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
"Te Atawhai Special Needs"
] as $dept){

$filteredStaff = $staff->filter(function($s) use ($dept){
return in_array($dept,$s->departments);
})
->sortBy(function($st){
    return array_reverse(explode(" ", $st->title));
})
->map(function($person){
    $string = $person->title;
    if($person->position){
        $string .= " - " . $person->position;
    }
return $string;
})->toArray();
    ?>

@if(!empty($filteredStaff))
<details>
    <summary>
    <h2 class='d-table decorated mt-5 mb-2'>{{ $dept }}</h2>
    </summary>
    <table class="table table-striped table-borderless table-hover">
    @foreach($filteredStaff as $member)
        <tr>
            <td>
                {{ $member }}
            </td>
        </tr>
    @endforeach
    </table>
</details>
@endif


<?php
}
?>

@include('_partials.lastReviewed')

@endsection