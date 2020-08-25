<hr>


    <p>
            @if($page->_meta->get('collection'))
    <small><a class="text-muted" href="{{ $page->baseUrl}}/admin/#/collections/{{ $page->_meta->get('collection') }}/entries/{{str_replace(".md","",$page->getFilename() . "." . $page->getExtension())}}" target="_BLANK" rel="nofollow">(*)</a></small>
    @endif
        <strong>Last Reviewed: @if($page->date) {{ date('F j, Y', $page->date) }} @else Not yet reviewed. @endif</strong><br>
        
    </p>

    
    <blockquote @if($page->date )data-phpdate="{{ $page->date }}"@endif>
        <em>This post is over a year old. Some of the information this contains may be outdated.</em>
    <p>Please <a href="mailto:office@whs.ac.nz?subject={{$page->title}}&body=The following page has not been reviewed recently.%0D%0A{{$page->getUrl()}}%0D%0APlease can it be reviewed and updated.%0D%0AThanks!">email the office</a> if you think this information requires review.</p>
    </blockquote>