@extends('_layouts.standard')


@section('title', 'For Parents')

@section('content')
    <h1>For Parents</h1>

    <ul>
        @forelse ($for_parents->sortBy('title') as $post)
            <li>
                <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
                <small>{{ date('M j, Y', $post->date) }}</small>
            </li>
        @empty
            <p>No posts to show.</p>
        @endforelse
    </ul>
@endsection
