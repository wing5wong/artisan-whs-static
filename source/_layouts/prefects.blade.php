@extends('_layouts.standard') 

@section('title', $page->title) 

@section('content')
    <h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

    {{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
    <!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
    <img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')


    <div class="row">
@foreach($prefects->groupBy('category') as $these=>$people)
<div class="col-sm-12 col-md-4 col-lg-4 mb-5">
<h3>{!! $these !!}</h3>
{!! $people->last()->title !!}

<img src="{{$people->last()->image}}" />

<img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_320,h_320,c_lfill,g_auto/", $people->last()->image)}}"
        srcset="
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_320,h_320,c_lfill,g_auto/", $people->last()->image)}}
        "
alt="{{{$these} - {$people->last()->title} }}" style="max-width: 100%">


</div>
@endforeach
    </div>
    

    @include('_partials.lastReviewed')
    
@endsection