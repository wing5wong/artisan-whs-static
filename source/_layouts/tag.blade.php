@extends('_layouts.master')

@section('title', "Posts tagged '{$page->name()}'")

@section('content')
    <h1>News tagged '{{ $page->name() }}'</h1>

    <ul>
        @forelse (posts_filter($news, $page) as $post)
            <li>
                <a href="{{ $post->getPath() }}">{{ $post->title }}</a>
                <small>{{ date('M j, Y', $post->date) }}</small>
            </li>
        @empty
            <p>No news to show.</p>
        @endforelse
    </ul>
@endsection
