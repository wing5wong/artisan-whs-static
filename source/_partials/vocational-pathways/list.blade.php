@if($pathways)
        <ul class="list-inline">
        @foreach($pathways as $vp)
        <li class="list-inline-item">
                <a href="{{ $page['vp'][$vp]['url']}}" class="text-white px-2 py-1 badge badge-vp-{{$vp}}" title="{{ $page['vp'][$vp]['name']}}"
                target="_BLANK">{{$page['vp'][$vp]['code']}}</a>
        </li>
        @endforeach
        </ul>
    @endif