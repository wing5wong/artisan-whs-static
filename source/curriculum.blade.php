@extends('_layouts.full') 
@section('title', 'Curriculum') 
@section('content')


<div class="houses bg-white text-green row no-gutters">
    <div class="col-12 col-lg-6 p-5 d-flex flex-column justify-content-around align-items-center">
            <h2 class="mb-2 w-100">
                    {{$curriculum->get('curriculum-structure')['title']}}
               </h2>
        {{$curriculum->get('curriculum-structure')['intro']}}
        <a href="{{$curriculum->get('curriculum-structure')->getPath()}}" class="btn">More Information</a>
    </div>
    <div class="col-12 col-lg-6 p-5 d-flex flex-column justify-content-around align-items-center">
            <h2 class="mb-2 w-100">
                    {{$curriculum->get('course-options')['title']}}
               </h2>
        {{$curriculum->get('course-options')['intro']}}
        <a href="{{$curriculum->get('course-options')->getPath()}}" class="btn">More Information</a>
    </div>
</div>

<div class="row no-gutters">
      @foreach($faculties as $faculty)

      <div class="col-12 col-md-6 col-lg-4 d-flex align-items-center justify-content-center p-5 @if($r = rand(0, 2) == 2) bg-green @elseif(rand(0, 2)==1) bg-yellow @endif" style="background-image: url({{$faculty->image}}); background-size: cover; width: 100%; min-height: 350px;">
      <h2 class="mb-0 h3 text-center">
         <a href="{{$faculty->getPath()}}" class="btn">{{$faculty->title}}</a>
         </h2>
    </div>


      @endforeach
</div>

@endsection