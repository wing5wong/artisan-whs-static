@foreach($policies as $policy) {{$policy->title}}
    @foreach($policy->policyAreas as $area)
    <li>{{$area["policyArea"]}}
        <ul>
            @foreach($area["policies"] as $policy)
            <li>
                <a href="{{$policy["document"]}}">{{$policy["title"]}}</a>

            </li>

            @endforeach
        </ul>
    </li>
    @endforeach
</ul>
@endforeach