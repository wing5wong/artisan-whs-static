@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


@yield('postContent')


<div class="row">
    @foreach ($honours->where('award',"Dux Litterarum")->groupBy('award') as $category)

    <div class="col">
        <h2><span class="decorated pb-2 mb-2 d-table">{{$category->first()->person1_name}}</span>
       <small class="text-muted">Dux Litterarum</small></h2>
        <img src="{{$category->first()->person1_image}}" alt="" class="img-thumbnail">
    </div>
    <div class="col">
        <h2><span class="decorated pb-2 mb-2 d-table">{{$category->first()->person2_name}}</span>
           <small class="text-muted">Proxime Accessit</small></h2>
        <img src="{{$category->first()->person2_image}}" alt="" class="img-thumbnail">
    </div>
    @endforeach
</div>


<hr>

@foreach ($honours->groupBy('award')->sortBy('date') as $category)
<details>
    <summary>
<h2 class="d-table decorated mt-5 mb-2">{{$category->first()->award}}</h2>
    </summary>
<table class="table table-striped table-borderless table-hover">
    <thead>
        <th>Year</th>
        <th>Winner</th>
        <th>Runner Up</th>
    </thead>
    <tbody>
        @foreach($category as $entry)
        <tr>
            <td>{{ date('Y',$entry->date) }}</td>
            <td>
                @if($entry->person1_image)<a href="{{ $entry->person1_image }}" title="View image of {{$person1_name}}">{{ $entry->person1_name }}</a>@else{{ $entry->person1_name }}@endif
            </td>
            <td>
                @if($entry->person2_image)<a href="{{ $entry->person2_image }}" title="View image of {{$person2_name}}">{{ $entry->person2_name }}</a>@else{{ $entry->person2_name }}@endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</details>
@endforeach

@include('_partials.lastReviewed')

@endsection