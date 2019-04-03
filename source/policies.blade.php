{{ var_dump($policies)}}

@foreach($policies as $page) {{$page->title}}
    @foreach($page->policyAreas as $area)
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