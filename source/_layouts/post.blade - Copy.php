@extends('_layouts.standard') 

@section('title', $page->title) 

@section('content')
<main>
    <h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


    @if ($page->image or $page->feature_image)
        <a href="{{ $page->feature_image["image"] ?? $page->image }}"
         @if($page->image_title or data_get($page,"feature_image.description"))title="{{data_get($page,"feature_image.description") ?? $page->image_title}}"@endif 
         @if($page->image_alt or data_get($page,"feature_image.alt"))alt="{{data_get($page,"feature_image.alt") ?? $page->image_alt}}"@endif 
         class="featured">
                <img class="featured-image"  style="object-fit: cover; max-width:100%; display: block; object-fit: contain; max-width: 100%; display: block;" 
                src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,h_400,c_lfill,g_auto/", $page->feature_image["image"] ?? $page->image)}}"
                srcset="
                {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,h_400,c_lfill,g_auto/", $page->feature_image["image"] ?? $page->image)}}
                "
        alt="" style="max-width: 100%">
        </a>
        @if($page->image_credit or ($page->feature_image and array_key_exists('credit',$page->feature_image)))
        <div class="image-credit">
            <em>Photo / {{$page->feature_image["credit"] ?? $page->image_credit}}</em>
        </div>
        @endif

    @endif

    @yield('postContent')

    @if($page->news_author)
        <p>
            <em>
                @if($page->news_author and array_key_exists('name',$page->news_author)){{$page->news_author["name"]}} <br>@endif
                @if($page->news_author and array_key_exists('publication',$page->news_author)){{ $page->news_author["publication"]}}@endif @if($page->news_author and array_key_exists('date',$page->news_author)){{ date('j/n/y', $page->news_author["date"]) }}@endif
            </em>
        </p>

    @endif

    @if(is_array($page->image_gallery))
    <div class="image-gallery row">
        @foreach($page->image_gallery as $image)
        <div class="col-sm-6 col-md-4 col-lg-4">
        <img src="{{ str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_lfill,q_80,w_300,h_300/",$image["image"] ?? '')}}" @isset($image["description"])alt="{{$image["description"]}}"@endisset @isset($image["description"])title="{{$image["description"]}}"@endisset data-image-url="{{$image["image"]}}">
        </div>
        @endforeach
    </div>
    @endif
     </main>
    @include('_partials.lastReviewed')
@endsection