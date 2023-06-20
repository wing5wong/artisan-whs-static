@extends('_layouts.full')
@section('title', 'Curriculum')
@section('content')

<div class="houses bg-white text-green row no-gutters">
    <div class="col-12 col-lg-6 p-5 d-flex flex-column justify-content-around align-items-center">
        <h2 class="mb-2 w-100">
            {{$curriculum->get('curriculum-structure')['title']}}
        </h2>
        {{ $curriculum->get('curriculum-structure')["intro"] }}
        <a href="{{$curriculum->get('curriculum-structure')->getPath()}}" class="btn btn-light my-5">More
            Information</a>
    </div>
    <div class="col-12 col-lg-6 p-5 d-flex flex-column justify-content-around align-items-center">
        <h2 class="mb-2 w-100">
            {{$curriculum->get('course-requirements')['title']}}
        </h2>
        {{ $curriculum->get('course-requirements')["intro"] }}
        <a href="{{$curriculum->get('course-requirements')->getPath()}}" class="btn btn-light my-5">More
            Information</a>
    </div>
    <div class="col-12 col-lg-6 p-5 d-flex flex-column justify-content-around align-items-center">
        <h2 class="mb-2 w-100">
            {{$curriculum->get('course-options')['title']}}
        </h2>
        {{$curriculum->get('course-options')['intro']}}
        <a href="{{$curriculum->get('course-options')->getPath()}}" class="btn btn-light my-5">More Information</a>
    </div>
    <div class="col-12 col-lg-6 p-5 d-flex flex-column justify-content-around align-items-center">
        <h2 class="mb-2 w-100">
            {{$curriculum->get('vocational-pathways')['title']}}
        </h2>
        {{ $curriculum->get('vocational-pathways')["intro"] }}
        <a href="{{$curriculum->get('vocational-pathways')->getPath()}}" class="btn btn-light my-5">More
            Information</a>
    </div>

</div>

<div class="row no-gutters">
    @foreach($page->getTeachingFaculties($faculties) as $faculty)

    <div class="col-12 col-md-6 col-lg-4 d-flex align-items-center justify-content-center p-5 @if(!($faculty->image) and $r = rand(0, 2) == 2) bg-green @elseif(!($faculty->image) and rand(0, 2)==1) bg-yellow @endif "
        style="background-image: url({{ str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_scale,q_80,w_625/",$faculty->image ?? '')}}); background-size: cover; width: 100%; min-height: 350px;">
        <h2 class="mb-0 h3 text-center">
            <a href="{{$faculty->getPath()}}" class="btn btn-light">
                {{$faculty->title}} <br>
                @if($faculty->maori_title)<span class="text-muted">{{$faculty->maori_title}}</span>@endif
            </a>
        </h2>
    </div>

    @endforeach
</div>

@endsection