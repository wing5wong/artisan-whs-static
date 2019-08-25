@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated">{{ $page->title }}</h1>

@if($page->image)
    <a href="{{ $page->image }}"
        @if($page->image_title) title="{{$page->image_title}}" @endif
        @if($page->image_alt) alt="{{$page->image_alt}}" @endif
        class="featured">
        <img src="{{ $page->image }}" style="object-fit: cover; max-width:100%; display: block;">
    </a>
@endif

@yield('postContent')

<h2 class="d-inline-block decorated">Senior Leadership Team</h2>
<div class="row">
    @foreach(["Principal", "Associate Principal", "Deputy Principal"] as $dept)

    @foreach($page->getDepartmentStaff($faculties, $staff, $dept) as $person)
    <article class="col-sm-12 col-md-6 col-lg-4">

        <h3>{{$person->title}} <br>
        <small>{{$person->position}}</small></h3>
        <img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/", $person->image)}}"
        srcset="
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_400,h_360/", $person->image)}} 400w,
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/", $person->image)}} 250w
        "
        sizes="(min-width: 800px) 400px, 250px"
        alt="" width="600" alt="{{$person->title}}" style="max-width: 100%">
        

    </article>
    @endforeach
    @endforeach
</div>
@foreach($page->getTeachingFaculties($faculties)
->concat($page->getNonTeachingFaculties($faculties))
->filter(function($f){ 
    return $f->title !== "Senior Leadership Team";
}) as $dept)

@php
$filteredStaff = $page->getDepartmentStaff($faculties, $staff, $dept->title);
@endphp
@if($filteredStaff->isNotEmpty())
<details>
    <summary>
        <h2 class='d-table decorated mt-5 mb-2'>{{ $dept->title }}</h2>
    </summary>
    <table class="table table-striped table-borderless table-hover">
        @foreach($page->getDepartmentHofs($faculties, $staff, $dept->title) as $member)
        <tr>
            <td>
                <strong>{{ $member->title }}</strong>
            </td>
            <td>
                @foreach($page->getStaffMemberPositionsForDepartment($member, $dept->title) as $position)
                <strong>{{ $position["title"] }}</strong>
                @if(!$loop->last), @endif
                @endforeach
            </td>
        </tr>
        @endforeach
        @foreach($page->getDepartmentAHofs($faculties, $staff, $dept->title) as $member)
        <tr>
            <td>
                <strong>{{ $member->title }}</strong>
            </td>
            <td>
                @foreach($page->getStaffMemberPositionsForDepartment($member, $dept->title) as $position)
                <strong>{{ $position["title"] }}</strong>
                @if(!$loop->last), @endif
                @endforeach
            </td>
        </tr>
        @endforeach
        @foreach($filteredStaff as $member)
        <tr>
            <td>
                {{ $member->title }}
            </td>
            <td>
                @foreach($page->getStaffMemberPositionsForDepartment($member, $dept->title) as $position)
                {{ $position["title"] }}
                @if(!$loop->last), @endif

                @endforeach
            </td>
        </tr>
        @endforeach
    </table>
</details>
@endif
@endforeach
@include('_partials.lastReviewed')

@endsection