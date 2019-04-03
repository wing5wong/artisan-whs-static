@extends('_layouts.standard')


@section('title', 'News')

@section('content')
    <h1>News</h1>

    <ul>
        @forelse ($news->sortBy('title') as $post)
            <li>
                <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
                <small>{{ date('M j, Y', $post->date) }}</small>
            </li>
        @empty
            <p>No posts to show.</p>
        @endforelse
    </ul>
@endsection
