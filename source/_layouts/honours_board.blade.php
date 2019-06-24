@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


@yield('postContent')


<div class="row">
    @foreach ($honours->filter(function($honour){
        return $honour->award == "Dux Litterarum";
    })->groupBy('award') as $category)
    <div class="col-12">
        <h2 class="d-table decorated">{{$category->first()->award}}</h2>
    </div>
    <div class="col">
        <h3>{{$category->first()->person1_name}}</h3>
        <img src="{{$category->first()->person1_image}}" alt="" class="img-thumbnail">
    </div>
    <div class="col">
        <h3>{{$category->first()->person2_name}}</h3>
        <img src="{{$category->first()->person2_image}}" alt="" class="img-thumbnail">
    </div>
    @endforeach
</div>


<hr>


@foreach ($honours->groupBy('award')->sortBy('award', 'ASC') as $category)
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
            <td>{{ $entry->person1_name }}</td>
            <td>{{ $entry->person2_name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</details>
@endforeach

@include('_partials.lastReviewed')

@endsection