@extends('_layouts.standard') 

@section('title', $page->title) 

@section('content')
    <h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

    {{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}}
    @if ($page->image)
    <!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
    <img src="{{ $page->image }}"  style="object-fit: cover; max-width:100%; display: block;">
    @endif
    
    @yield('postContent')

    @if(is_array($page->image_gallery))
        @foreach($page->image_gallery as $image)
        <a href="{{$image["image"]}}">
            <img src="{{ str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_scale,q_80,w_300/",$image["image"])}}" alt="{{$image["description"]}}" title="{{$image["title"]}}">
        </a>
        @endforeach
    @endif

 
    @include('_partials.lastReviewed')
    
@endsection