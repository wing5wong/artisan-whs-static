@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">International</h1>


<div style="height: 0; position: relative; padding-bottom: 56.25%">
  <iframe style="position: absolute; top:0; left: 0; " width="100%" height="100%" src="https://www.youtube.com/embed/mKJynLxG79k"
    frameborder="0" allowfullscreen></iframe>
</div>
  @include('_international-content')


<?php
$internationalStaff = $staff->filter(function ($s) {
return in_array("International",$s->departments);
}); ?>

  @foreach($internationalStaff as $person)
  <article class="py-3">
    <h3 class="decorated py-3 mb-4">
      {{$person->title}}
      <span class="text-muted">
        {{ $person->position }}
      </span>
    </h3>
    <div class="row">
      <div class="col">
        <img src="{{$person->image ?: "https://www.gravatar.com/avatar/" . md5($person->email ?: "user@example.com") . "?s=255"       }}" width="255" />
      </div>
      <div class="col">
        {!! $person !!}
        @if(!empty($person->email))
          <a href="mailto:{{$person->email}}" class="button button--green">
              {{$person->email}}
          </a>
        @endif
      </div>
    </div>
  </article>

  @endforeach

  @include('static/term-dates')

@endsection