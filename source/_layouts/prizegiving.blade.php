@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
<h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>


@yield('postContent')



@foreach ($prizegiving_booklets as $booklet)
<tr>
        <td width="30%">{{ date('F j, Y', $nl->date) }}</td>
        <td>
            <a href="{{$nl["file"]}}" download>{{$nl->title}} ({{ date('F Y', $nl->date) }})</a>
        </td>
    
    </tr>
@endforeach
</table>


@include('_partials.lastReviewed')

@endsection