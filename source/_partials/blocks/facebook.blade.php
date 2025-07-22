<section class="my-5 block-FBButton">
    @if (isset($block['heading']))
        <h2>{{ $block['heading'] }}</h2>
    @endif
    <a href="{{ $block['url'] }}" class="btn btn-lg btn-fb" style="display: flex; gap: 1em; align-items: center;">
        <i class="fab fa-facebook-f"
            style="
                    color: white;
    background-color: #3b5998;
    font-size: 20px;
    width: 40px;
    height: 40px;
    line-height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
            "></i>
        Facebook
    </a>
</section>
