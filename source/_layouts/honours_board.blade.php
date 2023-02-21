@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


@yield('postContent')


<div class="row">
    @foreach ($honours->where('award',"Dux Litterarum")->groupBy('award') as $category)

    <div class="col-sm-12 col-md-6 col-lg-6">
        <h2><span class="decorated pb-2 mb-2 d-table">{{$category->first()->person1_name}}</span>
            <small class="text-muted">Dux Litterarum</small>
        </h2>
        <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_480,h_600,c_lfill,g_auto/", $category->first()->person1_image)}}" srcset="
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_480,h_600,c_lfill,g_auto/", $category->first()->person1_image)}}
        " alt="" style="max-width: 100%">
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <h2><span class="decorated pb-2 mb-2 d-table">{{$category->first()->person2_name}}</span>
            <small class="text-muted">Proxime Accessit</small>
        </h2>
        <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_480,h_600,c_lfill,g_auto/", $category->first()->person2_image)}}" srcset="
           {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_480,h_600,c_lfill,g_auto/", $category->first()->person2_image)}}
           " alt="" style="max-width: 100%">
    </div>
    @endforeach
</div>


<hr>

@php
$awardHeadingingLookup = [
'Dux Artium' => ["Boy", "Girl"],
'Dux Ludorum' => ["Boy", "Girl"],
'Heads of School' => ["Boy", "Girl"],
'Dux Litterarum' => ["Dux", "Proxime Accessit"],
'Maori Student Dux' => ["Winner", "Runner Up"],
];

@endphp

@foreach ($honours->groupBy('award')->sortBy('date') as $award => $category)
<details>
    <summary>
        <h2 class="d-table decorated mt-5 mb-2">{{$category->first()->award}}</h2>
    </summary>
    <table class="table table-striped table-borderless table-hover">
        <thead>
            <th>Year</th>
            <th>{{$awardHeadingingLookup[$award][0]}}</th>

           {{-- @if($award !== "Maori Student Dux") --}}
            <th>{{$awardHeadingingLookup[$award][1]}}</th>
            {{-- @endif --}}
        </thead>
        <tbody>
            @foreach($category as $entry)
            <tr>
                <td>{{ date('Y',$entry->date) }}</td>
                <td>
                    @if($entry->person1_image)<a href="{{ $entry->person1_image }}" title="View image of {{$entry->person1_name}}">{{ $entry->person1_name }}</a>@else{{ $entry->person1_name }}@endif
                </td>
                {{-- @if($award !== "Maori Student Dux") --}}
                <td>
                    @if($entry->person2_image)<a href="{{ $entry->person2_image }}" title="View image of {{$entry->person2_name}}">{{ $entry->person2_name }}</a>@else{{ $entry->person2_name }}@endif
                </td>
                {{-- @endif --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</details>
@endforeach

@include('_partials.lastReviewed')

@endsection