@extends('_layouts.full') 
@section('title', 'News and Events') 
@section('content')

<div class="houses bg-green text-center text-yellow row no-gutters">


    <div class="col p-5 bg-green text-white shadow-right-inset d-flex flex-column justify-content-around align-items-center">
        <h2>News</h2>
    </div>
    <div class="col p-5 bg-white text-green d-flex flex-column justify-content-around align-items-center">
        <h2>Events</h2>
    </div>
</div>

    <div class="row no-gutters d-md-flex flex-equal flex-wrap">
        @foreach(['newsletters','achievers-list','honours-board','prize-winners'] as $col)
            <div class="col bg-yellow text-green p-5 text-center d-flex flex-wrap justify-content-center align-items-center w-100">
               <h2 class="mb-2 w-100">
                   {{ $col }}
               </h2>
               <a class="btn btn-outline-dark mt-2" href="#">More Information</a>
            </div>
         @endforeach
      </div>


@endsection