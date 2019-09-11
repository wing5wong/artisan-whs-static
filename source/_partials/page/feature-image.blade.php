@if ($page->featureImageSrc())
    <a href="{{$page->featureImageSrc()}}"
        @if($page->featureImageDescription())title="{{$page->featureImageDescription()}}"@endif @if($page->featureImageAlt())alt="{{$page->featureImageAlt()}}"@endif class="featured">
            <img class="featured-image"  style="object-fit: cover; max-width:100%; display: block; object-fit: contain; max-width: 100%; display: block;" 
            src="{{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,h_400,c_lfill,g_auto/", $page->featureImageSrc())}}"
            srcset="
            {{str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,h_400,c_lfill,g_auto/", $page->featureImageSrc())}}
            "
    alt="" style="max-width: 100%">
    </a>
    @if($page->featureImageCredit())
    <div class="image-credit">
        <em>Photo / {{$page->featureImageCredit()}}</em>
    </div>
    @endif
@endif