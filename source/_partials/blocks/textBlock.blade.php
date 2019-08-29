<section class="page-textBlock">
    <h3>{{ $block['heading'] }}</h3>
    @if($block["content"])
      <div class="max-width--330">
        {!! $block.content !!}
      </div>
    @endif
    </section>