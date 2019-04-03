@foreach($policies as $page)
{{$page->title}}
    @foreach($page->policyAreas as $area)
    {{$area->title}}
        @foreach($area->policies as $policy)
        {{$policy->title}}
        


        @endforeach


    @endforeach

@endforeach