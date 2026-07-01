@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
    <h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

    @if ($page->image)
        <img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover;width: 100%;">
    @endif @yield('postContent')


    <h2 class="decorated d-table">Board Members</h2>
    <div class="row no-gutters">
        <div class="col-12">
            <ul class="p-5">
                @foreach (['Presiding Member', 'Board Chairperson', 'Parent Representative', 'Principal', 'Staff Representative'] as $p)
                    @foreach ($board_members->where('category', $p)->sortBy(function ($st) {
                    return array_reverse(explode(' ', $st->title))[0];
                }) as $member)
                        <li>
                            <h3>{{ $member->title }}<small> - {{ $member->position }}</small></h3>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>

    <?php
    $coopted = $board_members
        ->where('category', 'Co-opted Member')
        ->sortBy(function ($st) {
            return array_reverse(explode(' ', $st->title));
        })
        ->sortBy(function ($st) {
            return $st->position ?: 'ZZZZZZZZZZZZZZZZZZZZZZ';
        });
    ?>
    @if (count($coopted))
    <h2 class="decorated d-table">Co-opted Members</h2>
    <div class="row no-gutters">
        <div class="col-12">
            <ul class="p-5">
                @foreach ($coopted as $member)
                    <li>
                        <h3>{{ $member->title }}<small> - {{ $member->position }}</small></h3>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif


    <h2 class="decorated d-table">Also in Attendance</h2>
    <div class="row no-gutters">
        <div class="col-12">
            <ul class="p-5">
                @foreach ($board_members->where('category', 'Also in Attendance')->sortBy(function ($st) {
                    return array_reverse(explode(' ', $st->title));
                })->sortBy(function ($st) {
                    return $st->position ?: 'ZZZZZZZZZZZZZZZZZZZZZZ';
                }) as $member)
                    <li>
                        <h3>{{ $member->title }}<small> - {{ $member->position }}</small></h3>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    @include('_partials.lastReviewed')



@endsection
