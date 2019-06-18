<hr>


    <p>
        <strong>Last Reviewed: @if($page->date) {{ date('F j, Y', $page->date) }} @else Not yet reviewed. @endif</strong><br>
        
    </p>

    
    <blockquote data-phpdate="{{ $page->date }}">
        <em>WARNING: This post is over a year old. Some of the information this contains may be outdated.</em>
    <p>Please <a href="mailto:office@whs.ac.nz?subject={{$page->title}}&body=The following page has not been reviewed recently.%0D%0A{{$page->getUrl()}}%0D%0APlease can it be reviewed and updated.%0D%0AThanks!">email the office</a> to request an updated review.</p>
    </blockquote>