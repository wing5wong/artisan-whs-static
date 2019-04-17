@extends('_layouts.full') 
@section('title', 'Curriculum') 
@section('content')


<div class="houses bg-white text-green row no-gutters">
    <div class="col-12 col-lg-6 p-5 d-flex flex-column justify-content-around align-items-center">
            <h2 class="mb-2 w-100">
                    {{$curriculum->get('curriculum-structure')['title']}}
               </h2>
        {{$curriculum->get('curriculum-structure')['intro']}}
    </div>
    <div class="col-12 col-lg-6 p-5 d-flex flex-column justify-content-around align-items-center">
            <h2 class="mb-2 w-100">
                    {{$curriculum->get('course-options')['title']}}
               </h2>
        {{$curriculum->get('course-options')['intro']}}
    </div>
</div>

<div class="row no-gutters">
      @foreach($faculties as $faculty)

      <div class="col-12 col-md-6 col-lg-4 d-flex align-items-center justify-content-center p-5 " style="background-image: url({{$page->imageCdn($faculty->image)}}); background-size: cover; width: 100%; min-height: 350px;">
      <h2 class="mb-0 h3 text-center">
         <a href="{{$faculty->getPath()}}">{{$faculty->title}}</a>
         </h2>
    </div>


      @endforeach
</div>

@endsection