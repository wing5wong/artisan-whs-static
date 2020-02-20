---
pagination:
    collection: news
    perPage: 15
---
@extends('_layouts.standard')
@section('title', "News")
@section('content')
<h1 class="decorated py-3 mb-4">News Articles</h1>

 @if ($page->image)

<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')

@foreach ($pagination->items as $n)
<div class="row mb-5">
    <div class="col-2">
        <img src="{{ $page->featureImageSrc($n) ? str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_160,h_140,c_thumb,g_auto/", $page->featureImageSrc($n)) : "https://res.cloudinary.com/whanganuihigh/image/upload/v1554149869/logo_vertical_t.png" }}" style="object-fit: cover;width: 100%;">
    </div>
    <div class="col-10">
        <h3>{{$n->title}}<br>
            @if($n->date)<small class="text-muted">{{ date('F j, Y', $n->publishedDate()) }} </small>@endif
        </h3>
        <div class="row">
            <div class="col-10">
                {!! $n->test() !!}
                <a href="{{$n->getPath()}}">Read More</a>
            </div>
        </div>
    </div>
</div>
@endforeach


@if ($previous = $pagination->previous)
<a href="{{ $page->baseUrl }}{{ $pagination->first }}">&lt;&lt;</a>
<a href="{{ $page->baseUrl }}{{ $previous }}">&lt;</a>
@endif

@foreach ($pagination->pages as $pageNumber => $path)
@if($pagination->currentPage == $pageNumber)
{{ $pageNumber }}
</a>
@else
    @if( ($pagination->currentPage - $pageNumber <=5) or ($pageNumber - $pagination->currentPage <= 5))
    <a href="{{ $page->baseUrl }}{{ $path }}">
        {{ $pageNumber }}
    </a>
    @endif
@endif
@endforeach

@if ($next = $pagination->next)
<a href="{{ $page->baseUrl }}{{ $next }}">&gt;</a>
<a href="{{ $page->baseUrl }}{{ $pagination->last }}">&gt;&gt;</a>
@endif
@endsection