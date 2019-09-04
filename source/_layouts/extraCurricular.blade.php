@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

@if ($page->image)
    <a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
            <img class="featured-image"  style="object-fit: cover; max-width:100%; display: block; object-fit: contain; max-width: 100%; display: block;" 
            src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,h_400,c_lfill,g_auto/", $page->image)}}"
            srcset="
            {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,h_400,c_lfill,g_auto/", $page->image)}}
            "
    alt="" style="max-width: 100%">
    </a>
    @if($page->image_credit)
    <div class="image-credit">
        <em>Photo / {{$page->image_credit}}</em>
    </div>
    @endif

@endif


@yield('postContent')

@foreach(["Performing Arts", "Sport", "Other"] as $area)
@php
$ec_area = $extracurricular_areas->firstWhere('title', $area);
@endphp
<details>
    <summary>
        <h2 class="decorated d-table mt-5 mb-2">{{$ec_area->title}}</h2>
    </summary>

    @if($ec_area->image)
    <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_500,h_300,c_lfill,g_auto/", $ec_area->image)}}"
        srcset="
            {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_950,h_300,c_lfill,g_auto/", $ec_area->image)}} 950w,
            {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_500,h_300,c_lfill,g_auto/", $ec_area->image)}} 500w
        " sizes="(min-width: 800px) 950px, 500px" alt="" style="max-width: 100%">
    @endif

    @php
        $personInCharge = $staff->firstWhere('title', $ec_area->person_in_charge);
    @endphp
    @if($personInCharge)
    <h3>Person in charge</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                @if($personInCharge->phone)
                <th>Phone</th>
                @endif
                @if($personInCharge->email)
                <th>Email</th>
                @endif
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $personInCharge->title ?? '' }}</td>
                @if($personInCharge->phone)<td>{{ $personInCharge->phone ?? '' }}</td>@endif
                @if($personInCharge->email)<td>{{ $personInCharge->email ?? '' }}</td>@endif
            </tr>
        </tbody>
    </table>
    @endif
    
    {!! $ec_area !!}


    <h3>Available activities</h3>
    <table>
        @foreach( $extracurricular_activities->where('extracurricular_area', $ec_area->title)
         as $ec_activity )

        <tr>
            <td>
                <a href="{{$ec_activity->getPath()}}">{{$ec_activity->title}}</a>
            </td>
        </tr>
        @endforeach

    </table>


    @php
    $recentNews = $news->filter(function($article) use ($ec_area){
        return in_array($ec_area->title, $article->extracurricular_areas ?? []);
    })->take(6);
    @endphp
    @if(count($recentNews))

    <h3>Recently in the news</h3>
    <div class="row"> 
        @foreach($recentNews as $n)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="{{$n->getPath()}}">
                    <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/", $page->featureImageSrc($n))}}"
        srcset="
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_400,h_360/", $page->featureImageSrc($n))}} 400w,
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/", $page->featureImageSrc($n))}} 250w
        "
        sizes="(min-width: 800px) 400px, 250px"
        width="600" alt="{{$page->featureImageDescription($n) ?? ''}}" title="{{ $page->featureImageDescription($n)}}" style="max-width: 100%">
                    {{$n->title}}
                </a>
            </div>
        @endforeach
    </div>
    @endif


    <a href="{{$ec_area->getPath()}}" class="btn btn-light my-5">See all {{$ec_area->title}} activities.</a>


</details>
@endforeach


@include('_partials.lastReviewed')

@endsection