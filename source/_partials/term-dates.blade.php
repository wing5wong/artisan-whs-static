@foreach($term_dates as $td)
<h2 class="d-table decorated mb-4">{{$td->title}}</h2>

{!! $td !!}

@if($td->title != "Public Holidays")
<h3>Start Dates</h3>
@endif
<table>
    @foreach($td->start_dates as $date)
        <tr>
            <td width="30%">{{ date('F j, Y', $date["date"]) }}</td>
            <td>{{ $date["body"] }}</td>
        </tr>
    @endforeach
</table>


@if($td->title != "Public Holidays")
<h3>End Dates</h3>
<table>
    @foreach($td->end_dates as $date)
        <tr>
            <td width="30%">{{ date('F j, Y', $date["date"]) }}</td>
            <td>{{ $date["body"] }}</td>
        </tr>
    @endforeach
</table>
@endif
@endforeach