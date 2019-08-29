<h2>{{ $block['heading'] }}</h2>
@if($block["content"])
    <div class="max-width--330">
    {!! $block["content"] !!}
    </div>
@endif