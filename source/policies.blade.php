@foreach($policies as $policy) {{$policy->title}}
    @foreach($policy->policyAreas as $area)
    <li>{{$area["policyArea"]}}
        <ul>
            @foreach($area["policies"] as $policy)
            <li>
                {{$policy["title"]}}

            </li>

            @endforeach
        </ul>
    </li>
    @endforeach
</ul>
@endforeach