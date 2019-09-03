<header class="page-hero block-hero">
    <h1>{{ $block['heading'] }}</h1>
    @if($block["content"])
        {!! (new Parsedown)->text($block["content"]) !!}
    @endif
</header>