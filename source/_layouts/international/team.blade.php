@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')



@foreach($staff->filter(function ($s) {
    return in_array("International",$s->departments);
    })
    ->sortBy(function($st){
        return array_reverse(explode(" ", $st->title));
    })
    ->sortBy(function($st){
        return $st->position ?: "ZZZZZZZZZZZZZZZZZZZZZZ";
    }) as $person)
    <article class="py-3">
    <h3 class="decorated py-3 mb-4">
    {{$person->title}}
    <span class="text-muted">
    {{ $person->position }}
    </span>
    </h3>
    <div class="row">
    <div class="col">
        @if($person->image)
            <img src="{{$person->image }}" width="255" />
        @endif
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


      @include('_partials.lastReviewed')
      
@endsection
