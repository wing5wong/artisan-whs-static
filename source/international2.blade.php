@extends('_layouts.standard') 
@section('title', "International") 
@section('content')
<h1 class="decorated py-3 mb-4">International</h1>


<div style="height: 0; position: relative; padding-bottom: 56.25%">
  <iframe style="position: absolute; top:0; left: 0; " width="100%" height="100%" src="https://www.youtube.com/embed/mKJynLxG79k"
    frameborder="0" allowfullscreen></iframe>
</div>
  @include('_international-content')


  @include('_partials.term-dates')

@endsection