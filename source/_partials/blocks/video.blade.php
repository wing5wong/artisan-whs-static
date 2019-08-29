<section class="page-textBlock">
    <h3>{{ $block['heading'] }}</h3>
    @if($block["content"])
      <div class="max-width--330">
        {!! $block["content"] !!}
      </div>
    @endif
    {{-- @if($block["video"]) --}}
    <iframe width="560" height="315" src="https://www.youtube.com/embed/mIBZWYOw4dU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    {{-- @endif --}}
    </section>