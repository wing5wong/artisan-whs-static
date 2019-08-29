<header class="page-hero">
    <h1>{{ $block['heading'] }}</h1>
    @if($block["content"])
      <div class="max-width--330">
        {!! $block["content"] !!}
      </div>
    @endif
</header>