@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

 @if ($page->image)

<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;"> @endif @yield('postContent')

@foreach($policies as $policy)
<h2>{{$policy->title}}</h2>

    @foreach($policy->policyAreas as $area)
    <h3 class="decorated d-table mt-5 mb-2">{{$area["policyArea"]}}</h3>
        <ul>
            @foreach($area["policies"] as $policyDoc)
            <li>
                <a href="{{$policyDoc["document"]}}">{{$policyDoc["policy"]}}</a>
            </li>
            @endforeach
        </ul>
    @endforeach
@endforeach

@include('_partials.lastReviewed')

@endsection