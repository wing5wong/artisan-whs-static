<h2>{{ $block['heading'] }}</h2>
@if($block["content"])
    <div>
    {!! (new Parsedown)->text($block["content"]) !!}
    </div>
@endif