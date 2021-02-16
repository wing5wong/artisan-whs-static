@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
@if ($page->image)

<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')

<div class="row">
@foreach(["Heads of School", "Deputy Heads of School"] as $headGroup)

    @if($loop->first)
    <div class="col-sm-12">
        <h1 class="decorated py-3 mb-4">{{$headGroup}}</h1>
    </div>
    @endif
    @foreach($school_leaders->where('category',$headGroup) as $role )
    <div class="col-sm-12 col-md-4 col-lg-4 mb-5">
        <h2>{{ $role->title }}</h2>

        {!! $role->getContent() !!}

        <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_320,h_320,c_lfill,g_auto/", $role->image)}}"
            srcset="
                {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_320,h_320,c_lfill,g_auto/", $role->image)}}
                " alt="{{ $role->title }} - {{ $role->body }}" style="max-width: 100%">


    </div>
    @endforeach

@endforeach
</div>


@foreach(["Prefects", "Heads of House"] as $headGroup)
<div class="row">
    <div class="col-sm-12">
        <h1 class="decorated py-3 mb-4">{{$headGroup}}</h1>
    </div>
    @foreach($school_leaders->where('category',$headGroup)->sortBy('title') as $role )
    <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
        <h2 class="school-leader-{{$role->title}}">{{ $role->title }}</h2>

        {!! $role->getContent() !!}

        <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_320,h_320,c_lfill,g_auto/", $role->image)}}"
            srcset="
                {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_320,h_320,c_lfill,g_auto/", $role->image)}}
                " alt="{{ $role->title }} - {{ $role->body }}" style="max-width: 100%">


    </div>
    @endforeach
</div>
@endforeach



<style>
    .school-leader-Awa {
        color: #1a3663;
    }
    .school-leader-Maunga {
        color: #a41e21;
    }
    .school-leader-Moana {
        color: #e4a025;
    }
    .school-leader-Whenua {
        color: #1c6c37;
    }
   </style>
@include('_partials.lastReviewed')

@endsection