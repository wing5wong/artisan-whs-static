<section class="my-5 block-richText">
    <h3>{{ $block['heading'] }}</h3>
    @if(isset($block["content"]))
    <div class="max-width--330">
        {!! (new Parsedown)->text($block["content"]) !!}
    </div>
    @endif
</section>