@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

@if ($page->image)
<a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif
    @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
    <img class="featured-image"
        style="object-fit: cover; max-width:100%; display: block; object-fit: contain; max-width: 100%; display: block;"
        src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,h_400,c_lfill,g_auto/", $page->image)}}"
        srcset="
            {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,h_400,c_lfill,g_auto/", $page->image)}}
            " alt="" style="max-width: 100%">
</a>
@if($page->image_credit)
<div class="image-credit">
    <em>Photo / {{$page->image_credit}}</em>
</div>
@endif

@endif



@php
    $personInCharge = $staff->firstWhere('title', $page->person_in_charge);
@endphp
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


    
@yield('postContent')


@php
$recentNews = $news->filter(function($article) use ($page){
    return in_array($page->title, $article->extracurricular_activities ?? []);
})
->take(5);
@endphp
@if(count($recentNews))

<h3>Recently in the news</h3>
<div class="row">
    @foreach($recentNews as $n)
    <div class="col-sm-12 col-md-6 col-lg-4">
        <a href="{{$n->getPath()}}">
            <h4>{{$n->title}}</h4>
        </a>
        <img src="{{$n->image}}" alt="">
    </div>
    @endforeach
</div>
@endif

@include('_partials.lastReviewed')

@endsection