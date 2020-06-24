<section class="my-5 block-h2Section">
    <h2>{{ $block['heading'] }}</h2>
    @if(isset($block["content"]))
        {!! (new Parsedown)->text($block["content"]) !!}
    @endif
</section>