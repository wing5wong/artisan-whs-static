
    @if($block['heading'])
    <h3>{{ $block['heading'] }}</h3>
    @endif
    @if($block["content"])
      <div class="max-width--330">
        {!! $block["content"] !!}
      </div>
    @endif
    {{-- @if($block["video"]) --}}
    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$block["video"]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    {{-- @endif --}}