
    @if($block['heading'])
    <h3>{{ $block['heading'] }}</h3>
    @endif
    @if($block["content"])
      <div class="max-width--330">
        {!! $block["content"] !!}
      </div>
    @endif
    {{-- @if($block["url"]) --}}
    
<div style="height: 0; position: relative; padding-bottom: 56.25%">
  <iframe style="position: absolute; top:0; left: 0; " width="100%" height="100%" src="https://www.youtube.com/embed/{{$block['url']}}"
    frameborder="0" allowfullscreen></iframe>
</div>
    {{-- @endif --}}