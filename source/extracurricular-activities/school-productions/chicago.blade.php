@extends('_layouts.standard')
@section('title', 'Chicago')
@section('content')
    <h1 class="decorated py-3 mb-4">Chicago</h1>

    @yield('postContent')

    <div class="row mb-5">
        <div class="col">
            <table class="table table-striped table-borderless table-hover">
                @foreach ($pagination->items as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ date('l, j F, Y', $event->date) }}</td>
                        <td><a href="{{ $event->getPath() }}">Read More</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection
