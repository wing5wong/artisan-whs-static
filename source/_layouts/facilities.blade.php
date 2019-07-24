@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')




@foreach($facilities as $facility)
<details>
<summary>
    <h2 class="decorated d-table mt-5 mb-2">{{$facility->title}}</h2> 
</summary>

{!! $facility !!}

@if(is_array($facility->image_gallery))
    <div class="image-gallery">
        @foreach($facility->image_gallery as $image)
        <a href="{{$image["image"]}}" class="featured">
            <img src="{{ str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_scale,q_80,w_300/",$image["image"])}}" @isset($image["description"])alt="{{$image["description"]}}"@endisset @isset($image["title"])title="{{$image["title"]}}"@endisset>
        </a>
        @endforeach
    </div>
    @endif
</details>
@endforeach

@include('_partials.lastReviewed')


@endsection
