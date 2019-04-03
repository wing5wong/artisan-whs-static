{{ var_dump($policies->policies)}}

@foreach($policies as $policy) {{$policy->title}}
    @foreach($policy->policyAreas as $area)
    <li>{{$area->title}}-{{$area->policyArea}}-{{$area->policyArea->title}}
        <ul>
            @foreach($area->policies as $policy)
            <li>
                {{$policy->title}}

            </li>

            @endforeach
        </ul>
    </li>
    @endforeach
</ul>
@endforeach