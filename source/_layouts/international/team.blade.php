@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')



@foreach($staff->filter(function ($s) {
    return in_array("International",$s->departments);
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

<hr>

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
