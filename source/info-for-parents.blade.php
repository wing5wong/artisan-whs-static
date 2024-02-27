@extends('_layouts.full')
@section('title', 'Info For Parents')
@section('content')

    <div class="houses bg-green text-center text-yellow row no-gutters">


        <div
            class="col p-5 bg-green text-white shadow-right-inset d-flex flex-column justify-content-around align-items-center">
            {!! $for_parents->get('enrolments') !!}
        </div>
        <div class="col p-5 bg-white text-green d-flex flex-column justify-content-around align-items-center">

            {!! $for_parents->get('graduate-student-profile') !!}

        </div>
    </div>

    @include('_partials.banner.feature-image')


    <div class="row no-gutters d-md-flex flex-equal flex-wrap">
        @foreach (['term-dates', 'stationery-lists', 'uniform', 'byot'] as $col)
            <div
                class="col bg-green text-white p-5 text-center d-flex flex-wrap justify-content-center align-items-center w-100">
                <h2 class="mb-2 w-100">
                    {{ $for_parents->get($col)['title'] }}
                </h2>
                <a class="btn btn-light mt-2" href="{{ $for_parents->get($col)->getPath() }}">More Information</a>
            </div>
        @endforeach
    </div>

    <div class="bg-dark text-center text-yellow row no-gutters">

        <div class="col bg-white p-5 text-center text-green d-flex flex-column justify-content-between align-items-center">
            <h2 class="mb-5 w-100">
                {{ $for_parents->get('enrolments')['title'] }}
            </h2>
            @if ($for_parents->get('enrolments'))
                {{ $for_parents->get('enrolments')->get('intro') }}
            @endif
            <a class="btn btn-light mt-2" href="{{ $for_parents->get('enrolments')->getPath() }}">More
                Information</a>
        </div>

        <div class="col bg-white p-5 text-center text-green d-flex flex-column justify-content-between align-items-center">
            <h2 class="mb-5 w-100">
                {{ $for_parents->get('edith-wheal-scholarship')['title'] }}
            </h2>
            {{ $for_parents->get('edith-wheal-scholarship')['intro'] }}
            <a class="btn btn-light mt-2" href="{{ $for_parents->get('edith-wheal-scholarship')->getPath() }}">More
                Information</a>
        </div>

        <div class="col bg-white p-5 text-center text-green d-flex flex-column justify-content-between align-items-center">
            <h2 class="mb-5 w-100">
                {{ $for_parents->get('policies')['title'] }}
            </h2>
            {{ $for_parents->get('policies')['intro'] }}

            <a class="btn btn-light mt-2" href="{{ $for_parents->get('policies')->getPath() }}">More
                Information</a>
        </div>

    </div>

@endsection
