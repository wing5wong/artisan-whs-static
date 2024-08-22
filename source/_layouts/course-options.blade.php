@extends('_layouts.standard')

@section('title', $page->title)

@section('content')
    <h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

    {!! $page !!}




    @php
        $levels = [
            '9' => 'Year 9',
            '10' => 'Year 10',
            '11' => 'Level 1',
            '12' => 'Level 2',
            '13' => 'Level 3',
        ];
    @endphp


    <ul>
        <li>
            <a
                href="https://res.cloudinary.com/whanganuihigh/image/upload/v1724208311/Website%20Course%20selection%20files/2025_Year_10_Future_Focus_Assembly_Slides_web.pdf">Future
                Focus Course Selection for Year 10 -> 11 </a>
        </li>
        <li>
            <a
                href="https://res.cloudinary.com/whanganuihigh/image/upload/v1724208317/Website%20Course%20selection%20files/2025_Year_11_Future_Focus_Assembly_Slides_web.pdf">Future
                Focus Course Selection for Year 11 -> 12 </a>
        </li>
        <li>
            <a
                href="https://res.cloudinary.com/whanganuihigh/image/upload/v1724208312/Website%20Course%20selection%20files/2025_Year_12_Future_Focus_Assembly_Slides_web.pdf">Future
                Focus Course Selection for Year 12 -> 13 </a>
        </li>
    </ul>
    <ul class="nav nav-tabs" id="myTab" role="tablist">

        @foreach ($levels as $level => $levelTitle)
            <li class="nav-item">
                <a class="nav-link @if ($loop->first) active @endif" id="year-{{ $level }}-tab"
                    data-toggle="tab" href="#year-{{ $level }}" role="tab"
                    aria-controls="year-{{ $level }}"
                    @if ($loop->first) aria-selected="true" @endif>{{ $levelTitle }}</a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="myTabContent">

        @foreach ($levels as $level => $levelTitle)
            <div class="tab-pane fade @if ($loop->first) show active @endif" id="year-{{ $level }}"
                role="tabpanel" aria-labelledby="year-{{ $level }}-tab">

                @php
                    $mapped = $page
                        ->getTeachingFaculties($faculties)
                        ->map(function ($faculty) use ($page, $level, $subject_areas, $courses) {
                            return [
                                'faculty' => $faculty,
                                'courses' => $page->getFacultyCoursesForLevel(
                                    $faculty,
                                    $subject_areas,
                                    $courses,
                                    $level,
                                ),
                            ];
                        })
                        ->filter(function ($f) {
                            return $f['courses']->isNotEmpty();
                        });
                @endphp

                <div class="row">
                    @foreach ($mapped as $faculty)
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <h3 class="d-table mt-3">
                                {{ $faculty['faculty']->title }}
                                @if ($faculty['faculty']->maori_title)
                                    <br><small class="text-muted">{{ $faculty['faculty']->maori_title }}</small>
                                @endif
                            </h3>


                            @if ($page->yearLevelOffersVocationalPathways($level))
                                @include('_partials.vocational-pathways.list', [
                                    'pathways' => $faculty['faculty']->vocational_pathways,
                                ])
                            @endif


                            @if ($faculty['faculty']->intro)
                                <br>
                                {{ $faculty['faculty']->intro }}
                            @endif
                            <br>
                            Full details are available on the <a href="{{ $faculty['faculty']->getPath() }}"
                                class="btn btn-light mb-5">{{ $faculty['faculty']->title }} faculty page</a>



                            <div class="list-group my-4">
                                @foreach ($faculty['courses'] as $course)
                                    <a class="list-group-item list-group-item-action"
                                        href="{{ $course->getPath() }}">{{ $course->name }} ({{ $course->code }})</a>
                                @endforeach
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach

    </div>

@endsection
