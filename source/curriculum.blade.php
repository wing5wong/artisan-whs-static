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

    @include('_partials.banner.feature-image')


    <div class="row no-gutters d-md-flex flex-equal flex-wrap">
        @foreach(['term-dates','stationery-lists','uniform','byot'] as $col)
            <div class="col bg-green text-white p-5 text-center d-flex flex-wrap justify-content-center align-items-center w-100">
               <h2 class="mb-2 w-100">
                    {{$for_parents->get($col)["title"]}}
               </h2>
               <a class="btn btn-outline-dark mt-2" href="{{ $for_parents->get($col)->getPath() }}">More Information</a>
            </div>
         @endforeach
      </div>

<div class="bg-dark text-center text-yellow row no-gutters">
   
      <div class="col bg-white p-5 text-center text-green d-flex flex-column justify-content-between align-items-center">
         <h2 class="mb-5 w-100">
                {{$for_parents->get('edith-wheal-scholarship')["title"]}}
         </h2>
         {{ $for_parents->get('edith-wheal-scholarship')["intro"] }}
         <a class="btn btn-outline mt-2" href="{{ $for_parents->get('edith-wheal-scholarship')->getPath() }}">More Information</a>
      </div>
   
   <div class="col bg-white p-5 text-center text-green d-flex flex-column justify-content-between align-items-center">
      
        @foreach(['enrolment-scheme','school-zone'] as $col)
        
        <h2 class="mb-2 w-100">
                {{$for_parents->get($col)["title"]}}
         </h2>
         
         <a class="btn btn-outline-dark mt-2" href="{{ $for_parents->get($col)->getPath() }}">More Information</a>
     @endforeach
      
   </div>
   
      <div class="col bg-white p-5 text-center text-green d-flex flex-column justify-content-between align-items-center">
         <h2 class="mb-5 w-100">
                {{$for_parents->get('policies-and-charter')["title"]}}
         </h2>
         {{$for_parents->get('policies-and-charter')["intro"]}}

         <a class="btn btn-outline mt-2" href="{{ $for_parents->get('policies-and-charter')->getPath() }}">More Information</a>
      </div>
   
</div>

@endsection