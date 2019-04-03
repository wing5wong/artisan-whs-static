@foreach($policies as $page) {{$page->title}}
<ul>
    @foreach($page->policyAreas as $area)
    <li>{{$area->policyArea}}
        <ul>
            @foreach($area->policies as $policy)
            <li>
                {{$policy->policy}}

            </li>

            @endforeach
        </ul>
    </li>
    @endforeach
</ul>
@endforeach