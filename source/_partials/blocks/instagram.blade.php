<section class="my-5 block-FBButton">
    @if ($block['heading'])
        <h2>{{ $block['heading'] }}</h2>
    @endif
    <a href="{{ $block['url'] }}" class="btn btn-lg btn-fb" style="display: flex; gap: 1em; align-items: center;">
        <i class="fab fa-instagram"
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
    color: white;
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
            "></i>
        Instagram
    </a>
</section>
