@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
    <style>
        .staff-house {
            padding: 0.25em;
            text-align: center;
            color: #fff;
            margin-bottom: 1em;
        }

        .staff-house.staff-house-Awa {
            background: #1a3663;
        }

        .staff-house.staff-house-Maunga {
            background: #a41e21;
        }

        .staff-house.staff-house-Moana {
            background: #e4a025;
        }

        .staff-house.staff-house-Whenua {
            background: #1c6c37;
        }

        .leave {
            opacity: .4
        }

        details tr.staff-house-Awa {
            border-left: 2px solid #1a3663;
        }

        details tr.staff-house-Maunga {
            border-left: 2px solid #a41e21;
        }

        details tr.staff-house-Moana {
            border-left: 2px solid #e4a025;
        }

        details tr.staff-house-Whenua {
            border-left: 2px solid #1c6c37;
        }
    </style>


    <h1 class="decorated">{{ $page->title }}</h1>

    @if ($page->image)
        <a href="{{ $page->image }}" @if ($page->image_title) title="{{ $page->image_title }}" @endif
            @if ($page->image_alt) alt="{{ $page->image_alt }}" @endif class="featured">
            <img src="{{ $page->image }}" style="object-fit: cover; max-width:100%; display: block;">
        </a>
    @endif

    @yield('postContent')

    <h2 class="d-inline-block decorated">Senior Leadership Team</h2>
    <div class="row">
        @foreach (['Principal'] as $dept)
            @foreach ($page->getDepartmentStaff($faculties, $staff, $dept) as $person)
                <article class="col-sm-12 col-md-6 col-lg-4 @if ($person->on_leave) leave @endif">

                    <h3>{{ $person->title }} <br>
                        <small>{{ $person->position }}</small>
                    </h3>

                    @if ($person->phone or $person->email)
                        <p>
                            @if ($person->on_leave)
                                On Leave -
                            @endif
                            @if ($person->phone)
                                <a href="tel:{{ $person->phone }}">Call</a>
                                @if ($person->email)
                                    |
                                @endif
                            @endif
                            @if ($person->email)
                                <a href="mailto:{{ $person->email }}">Email</a>
                            @endif
                        </p>
                    @endif
                    <img src="{{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/', $person->image) }}"
                        srcset="
        {{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_400,h_360/', $person->image) }} 400w,
        {{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/', $person->image) }} 250w
        "
                        sizes="(min-width: 800px) 400px, 250px" width="600" alt="{{ $person->title }}"
                        style="max-width: 100%">

                    @if ($person->house)
                        <div class="staff-house staff-house-{{ $person->house }}">
                            {{ $person->house }} House
                        </div>
                    @endif

                </article>
            @endforeach
        @endforeach
    </div>

    <div class="row mt-5">
        @foreach (['Associate Principal', 'Deputy Principal'] as $dept)
            @foreach ($page->getDepartmentStaff($faculties, $staff, $dept) as $person)
                <article class="col-sm-12 col-md-6 col-lg-4 @if ($person->on_leave) leave @endif">

                    <h3>{{ $person->title }} <br>
                        <small>{{ $person->position }}</small>
                    </h3>

                    @if ($person->phone or $person->email)
                        <p>
                            @if ($person->on_leave)
                                On Leave -
                            @endif
                            @if ($person->phone)
                                <a href="tel:{{ $person->phone }}">Call</a>
                                @if ($person->email)
                                    |
                                @endif
                            @endif
                            @if ($person->email)
                                <a href="mailto:{{ $person->email }}">Email</a>
                            @endif
                        </p>
                    @endif
                    <img src="{{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/', $person->image) }}"
                        srcset="
        {{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_400,h_360/', $person->image) }} 400w,
        {{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/', $person->image) }} 250w
        "
                        sizes="(min-width: 800px) 400px, 250px" width="600" alt="{{ $person->title }}"
                        style="max-width: 100%">

                    @if ($person->house)
                        <div class="staff-house staff-house-{{ $person->house }}">
                            {{ $person->house }} House
                        </div>
                    @endif

                </article>
            @endforeach
        @endforeach
    </div>


    @foreach ($page->getTeachingFaculties($faculties)->concat($page->getNonTeachingFaculties($faculties))->filter(function ($f) {
                return $f->title !== 'Senior Leadership Team';
            }) as $dept)
        @php
            $filteredStaff = $page->getDepartmentStaff($faculties, $staff, $dept->title);
        @endphp
        @if ($filteredStaff->isNotEmpty())
            <details>
                <summary>
                    <h2 class='d-table decorated mt-5 mb-2'>{{ $dept->title }}</h2>
                </summary>

                <table class="table table-striped table-borderless table-hover">
                    @foreach ($page->getDepartmentHofs($faculties, $staff, $dept->title) as $member)
                        <tr
                            class="@if ($member->house) staff-house-{{ $member->house }} @endif @if ($member->on_leave) leave @endif">
                            <td>
                                <strong>{{ $member->title }}</strong>
                            </td>
                            <td>
                                @foreach ($page->getStaffMemberPositionsForDepartment($member, $dept->title) as $position)
                                    <strong>{{ $position['title'] }}</strong>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if ($member->on_leave)
                                    On Leave -
                                @endif
                                @if ($member->phone)
                                    <a href="tel:{{ $member->phone }}">Call</a>
                                    @if ($member->email)
                                        |
                                    @endif
                                @endif
                                @if ($member->email)
                                    <a href="mailto:{{ $member->email }}">Email</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($page->getDepartmentAHofs($faculties, $staff, $dept->title) as $member)
                        <tr
                            class="@if ($member->house) staff-house-{{ $member->house }} @endif @if ($member->on_leave) leave @endif">
                            <td>
                                <strong>{{ $member->title }}</strong>
                            </td>
                            <td>
                                @foreach ($page->getStaffMemberPositionsForDepartment($member, $dept->title) as $position)
                                    <strong>{{ $position['title'] }}</strong>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if ($member->on_leave)
                                    On Leave -
                                @endif
                                @if ($member->phone)
                                    <a href="tel:{{ $member->phone }}">Call</a>
                                    @if ($member->email)
                                        |
                                    @endif
                                @endif
                                @if ($member->email)
                                    <a href="mailto:{{ $member->email }}">Email</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($filteredStaff as $member)
                        <tr
                            class="@if ($member->house) staff-house-{{ $member->house }} @endif @if ($member->on_leave) leave @endif">
                            <td>
                                {{ $member->title }}
                            </td>
                            <td>
                                @foreach ($page->getStaffMemberPositionsForDepartment($member, $dept->title) as $position)
                                    {{ $position['title'] }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if ($member->on_leave)
                                    On Leave -
                                @endif
                                @if ($member->phone)
                                    <a href="tel:{{ $member->phone }}">Call</a>
                                    @if ($member->email)
                                        |
                                    @endif
                                @endif
                                @if ($member->email)
                                    <a href="mailto:{{ $member->email }}">Email</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </details>
        @endif
    @endforeach
    @include('_partials.lastReviewed')

@endsection
