@extends('_layouts.standard')


@section('title', 'International')

@section('content')
    <h1>International</h1>

    <ul>
        @forelse ($international->sortBy('title') as $post)
            <li>
                <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
                <small>{{ date('M j, Y', $post->date) }}</small>
            </li>
        @empty
            <p>No posts to show.</p>
        @endforelse
    </ul>
@endsection
