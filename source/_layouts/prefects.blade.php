@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

@if ($page->image)

<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')


<div class="row">
    @foreach($prefects->groupBy('category') as $these=>$people)
    <div class="col-sm-12 col-md-4 col-lg-4 mb-5">
        <h3>{!! $these !!}</h3>
        {!! $people->last()->title !!}

        <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_320,h_320,c_lfill,g_auto/", $people->last()->image)}}"
            srcset="
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_320,h_320,c_lfill,g_auto/", $people->last()->image)}}
        " alt="{{ $these }} - {{ $people->last()->title }}" style="max-width: 100%">


    </div>
    @endforeach
</div>




@foreach(["Heads of School", "Deputy Heads of School"] as $headGroup)
<div class="row">
    @if($loop->first)
    <div class="col-sm-12">
        <h2>{{$headGroup}}</h2>
    </div>
    @endif
    @foreach($school_leaders->where('category',$headGroup) as $role )
    <div class="col-sm-12 col-md-4 col-lg-4 mb-5">
        <h3>{{ $role->title }}</h3>

        {!! $role->getContent() !!}

        <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_320,h_320,c_lfill,g_auto/", $role->image)}}"
            srcset="
                {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_320,h_320,c_lfill,g_auto/", $role->image)}}
                " alt="{{ $role->title }} - {{ $role->body }}" style="max-width: 100%">


    </div>
    @endforeach
</div>
@endforeach

@foreach(["Prefects", "Heads of House"] as $headGroup)
<div class="row">
    <div class="col-sm-12">
        <h2>{{$headGroup}}</h2>
    </div>
    @foreach($school_leaders->where('category',$headGroup) as $role )
    <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
        <h3>{{ $role->title }}</h3>

        {!! $role->getContent() !!}

        <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_320,h_320,c_lfill,g_auto/", $role->image)}}"
            srcset="
                {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_320,h_320,c_lfill,g_auto/", $role->image)}}
                " alt="{{ $role->title }} - {{ $role->body }}" style="max-width: 100%">


    </div>
    @endforeach
</div>
@endforeach


@include('_partials.lastReviewed')

@endsection