@extends('_layouts.standard') 
@section('title', $page->title) 
@section('content')
<h1 class="decorated">{{ $page->title }}</h1>

{{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}} @if ($page->image)
<!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
<a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
        <img src="{{ $page->image }}"  style="object-fit: cover; max-width:100%; display: block;">
    </a>
@endif

@yield('postContent')

<h2 class="d-inline-block decorated">Senior Leadership Team</h2>
<div class="row">
    @foreach(["Senior Leadership Team",  "Principal",  "Associate Principal",   "Deputy Principal"] as $dept)

        @foreach($page->getDepartmentStaff($faculties, $staff, $dept) as $person)
            <article class="col-sm-12 col-md-6 col-lg-6 p-5">
                <div class="row">    
                    <div class="col-12">
                        <h3>{{$person->title}}</h3>
                            <p class="lead">{{$person->position}}</p>
                        </div>
                        <div class="col-12">
                            <img src="{{$person->image}}" alt="" width="600" alt="{{$person->title}}" style="max-width: 100%">
                        </div>
                    </div>
                </article>
        @endforeach
    @endforeach
</div>
@foreach([
            "The Arts",
            "Deans",
            "Digital Technology",
            "English",
            "Guidance Counsellors",
            "Instrumental Music Tutors",
            "International",
            "Languages",
            "Learning Support Centre",
            "Mathematics",
            "Physical Education and Health",
            "Sciences",
            "Social Sciences",
            "Study / External Studies",
            "Support and Ancilliary",
            "Technology",
            "Vocational Studies",
            "Te Atawhai / Special Needs"
            ] as $dept)

                @php
                $filteredStaff = $page->getDepartmentStaff($faculties, $staff, $dept);  
                @endphp
                @if($filteredStaff->isNotEmpty())
                <details>
                    <summary>
                    <h2 class='d-table decorated mt-5 mb-2'>{{ $dept }}</h2>
                    </summary>
                    <table class="table table-striped table-borderless table-hover">
                        @foreach($page->getDepartmentHofs($faculties, $staff, $dept) as $member)
                            <tr>
                                <td>
                                    <strong>{{ $member->title }}</strong>
                                </td>
                                <td>
                                    <strong>{{ $member->position }}</strong>
                                </td>
                            </tr>
                        @endforeach
                        @foreach($page->getDepartmentAHofs($faculties, $staff, $dept) as $member)
                            <tr>
                                <td>
                                    <strong>{{ $member->title }}</strong>
                                </td>
                                <td>
                                    <strong>{{ $member->position }}</strong>
                                </td>
                            </tr>
                        @endforeach
                        @foreach($filteredStaff as $member)
                            <tr>
                                <td>
                                    {{ $member->title }}
                                </td>
                                <td>
                                    {{-- collect($member->positions ?? [])->filter(function($p) use ($dept){
                                            return $p["department"] == $dept;
                                        })
                                        --}}
                                    @foreach(
                                        $member->positions ?? [] as $position)
                                    {{ $position["title"] }}
                                    {{ $position["department"] }}
                                    @if(!$loop->last), @endif
                                    @endforeach
                                    {{-- $member->position --}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </details>
                @endif
@endforeach
@include('_partials.lastReviewed')

@endsection