@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


@php
$ecArea = $extracurricular_areas->firstWhere('title', $page->extracurricular_area);
@endphp

<ul class="nav">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/curriculum/extracurricular/">Extracurricular</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{$ecArea->getPath()}}">{{$ecArea->title}}</a>
            </li>
        </ol>
    </nav>
</ul>


@include('_partials.page.feature-image')


@php
$personInCharge = $staff->firstWhere('title', $page->person_in_charge);
@endphp
@if(!($page->people) and $personInCharge)
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


<h3>Key Information</h3>

<table>
    <thead>
    </thead>
    <tbody>
        @if($page->people)
        @php
        $involvedStaff = collect($page->people)->map(function($person) use ($staff){
        return ['person' => $staff->firstWhere('title', $person["name"]), 'role' => $person["role"]];
        })->filter(function($st){
        return !is_null($st['person']);
        });
        @endphp
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        @foreach($involvedStaff as $involved)
        <tr>
            <td>{{ $involved["person"]["title"] }}</td>
            <td>{{ $involved["role"] }}</td>
            <td>{{ isset($involved["person"]["phone"]) ? $involved["person"]->phone : '' }}</td>
            <td>{{ isset($involved["person"]["email"]) ? $involved["person"]->email : '' }}</td>
        </tr>
        @endforeach
        @endif

        @if($page->cost)
        <tr>
            <th>Cost</th>
            <td colspan="3"> {{ $page->cost}}</td>
        </tr>
        @endif

        @if($page->terms)
        <tr>
            <th>
                When
            </th>
            <td colspan="3">
                @foreach($page->terms as $term)
                {{ $term }}@if(!$loop->last), @endif
                @endforeach
            </td>
        </tr>
        @endif

        @if($page->uniform)
        <tr>
            <th>Uniform/Equipment</th>
            <td colspan="3">{{ $page->uniform}}</td>
        </tr>
        @endif


    </tbody>
</table>


@yield('postContent')


@php
$recentNews = $news->filter(function($article) use ($page){
return in_array($page->title, $article->extracurricular_activities ?? []);
})
->take(6);
@endphp
@if(count($recentNews))

<h3>Recently in the news</h3>
<div class="row">
    @foreach($recentNews as $n)
    <div class="col-sm-12 col-md-6 col-lg-4">
        <a href="{{$n->getPath()}}">
            <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/", $page->featureImageSrc($n))}}" srcset="
{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_400,h_360/", $page->featureImageSrc($n))}} 400w,
{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/", $page->featureImageSrc($n))}} 250w
" sizes="(min-width: 800px) 400px, 250px" width="600" alt="{{$page->featureImageAlt($n) ?? ''}}" title="{{ $page->featureImageDescription($n)}}" style="max-width: 100%">
            {{$n->title}}
        </a>
    </div>
    @endforeach
</div>
@endif


@if($page->blocks)
@foreach($page->blocks as $block)
@include('_partials.blocks.' . $block["type"], ['block'=>$block])
@endforeach
@endif

@include('_partials.lastReviewed')

@endsection