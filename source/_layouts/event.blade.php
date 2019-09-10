@extends('_layouts.standard') 

@section('title', $page->title) 

@section('content')
<main>
    <h1 class="decorated py-3 mb-4">{{ $page->title }} 
    <br><small>{{ date('F j, Y', $page->date) }}</small></h1>


    @if ($page->image)
        
        <a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
            <img src="{{ $page->image }}" class="featured-image"  style="object-fit: cover; max-width:100%; display: block; object-fit: contain; max-width: 100%; display: block; width: 100%; height: 400px;">
        </a>
        @if($page->image_credit)
        <div class="image-credit">
            <em>Photo / {{$page->image_credit}}</em>
        </div>
        @endif

    @endif
    @yield('postContent')

    @if(is_array($page->image_gallery))
    <div class="image-gallery row">
        @foreach($page->image_gallery as $image)
        <div class="col-sm-6 col-md-4 col-lg-4">
        <img src="{{ str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_scale,q_80,w_300/",$image["image"])}}" @isset($image["description"])alt="{{$image["description"]}}"@endisset @isset($image["description"])title="{{$image["description"]}}"@endisset data-image-url="{{$image["image"]}}">
        </div>
        @endforeach
    </div>
    @endif
     </main>
    @include('_partials.lastReviewed')
@endsection