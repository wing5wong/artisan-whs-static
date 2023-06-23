@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

@if($page->image)

<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;">
@endif

@yield('postContent')



@foreach($page->getTeachingFaculties($faculties) as $faculty)

<h2 class="decorated d-table my-5">{{ $faculty->title }}
    @if($faculty->maori_title)<br><small class="text-muted">{{$faculty->maori_title}}</small>@endif</h2>

@if($faculty->image)
<img src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_500,h_300,c_lfill,g_auto/", $faculty->image ?? '')}}"
    srcset="
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_950,h_300,c_lfill,g_auto/", $faculty->image ?? '')}} 950w,
        {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_500,h_300,c_lfill,g_auto/", $faculty->image ?? '')}} 500w
        " sizes="(min-width: 800px) 950px, 500px" alt="" style="max-width: 100%">
@endif

@if($faculty->intro)
<br>
{{ $faculty->intro }}
<br>
Full details are available on the <a href="{{$faculty->getPath()}}" class="btn btn-light mb-5">{{$faculty->title}}
    faculty page</a>
@endif


<details>
    <summary>
        <strong>View Subject Areas and Courses</strong>
    </summary>

    <div class="row">

        <div class="col-12">
            @include('_partials.vocational-pathways.list', ['pathways' => $faculty->vocational_pathways])

        </div>
        @foreach($page->getFacultySubjectAreas($faculty, $subject_areas) as $subject )
        @php
        $facultyCourses = $page->getSubjectAreaCourses($subject, $courses)
        @endphp
        @if(count($facultyCourses))
        <div class="col-sm-12 col-md-6 col-lg-6">
            <details open class="mt-4">

                <summary>
                    <h5 class="d-table">{{ $subject->title }}</h5>
                </summary>
                <div class="list-group">
                    @foreach($facultyCourses as $course)
                    <a class="list-group-item list-group-item-action"
                        href="{{$course->getPath()}}">{{$course->course_level}} - {{ $course->name }}</a>
                    @endforeach
                </div>
            </details>
        </div>
        @endif
        @endforeach
    </div>

</details>

@if(!$loop->last)
<hr>
@endif

@endforeach

@include('_partials.lastReviewed')

@endsection