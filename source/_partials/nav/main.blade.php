<nav class="page-header home-header">
  <div class="navbar navbar-expand-lg navbar-dark py-0 px-lg-0" style="background-color: #111;">

    <button class="navbar-toggler my-3" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
      aria-expanded="false" aria-label="Toggle main navigation">
        <span class="navbar-toggler-icon"></span>
         Menu 
        </button>
    <button class="navbar-toggler my-3" type="button" data-toggle="collapse" data-target="#contactNavDropdown" aria-controls="contactNavDropdown"
      aria-expanded="false" aria-label="Toggle contact navigation">
        Contact 
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse justify-content-center align-items-center text-light flex-wrap" id="contactNavDropdown">
      <div class="contact navbar-nav w-100 justify-content-center ">
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="tel:06-3490178">General Enquiries: {{$page->phone->general->display}}</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="tel:06-349-0177">Attendance: {{$page->phone->attendance->display}}</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="tel:+64-6-349-1181">International Enquiries: {{$page->phone->attendance->display}}</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="{{$page->social->facebook}}">Facebook</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1 " href="{{$page->social->youtube}}">Youtube</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1 " href="{{$page->social->twitter}}">Twitter</a>
      </div>

      <div class="navbar-nav">
        <a class="nav-item nav-link mx-3 p-3 p-sm-1 " href="https://library.whs.ac.nz">Library</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="/payments">Payments</a>
        <a class="nav-item nav-link mx-3 p-3 p-sm-1" href="/contact">Contact</a>
        <a class="nav-item nav-link mx-3 p-3 px-5 p-sm-1 px-md-3 bg-white text-dark" href="http://kamar.whs.ac.nz">Kamar</a>
      </div>
    </div>
  </div>

  {{-- <div class="navbar navbar-expand-lg navbar-light navbar-bg-light py-0" style="box-shadow: 0 -8px 8px -6px;">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav w-100 justify-content-center">

        @foreach( [ 'about'=>["About WHS","/about-whs"], "for_parents"=>["For Parents", "/for-parents"], 'curriculum'=>["Curriculum","/curriculum"],
        "news_and_events"=>["News", "/news-and-events"], "international"=>["International", "/international"] ] as $key=>$values)

        <li class="nav-item dropdown px-3">
          <a class="mb-0 p-2 nav-link dropdown-toggle nav-item" href="{{$values[1]}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$values[0]}}
              </a> @if($$key)
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{$values[1]}}">{{$values[0]}}</a> @foreach(($$key)->filter(function($k){
              return $k->visible != "No";
            }) as $thePage)
            <a class="dropdown-item" href="{{$thePage->getPath()}}">{{$thePage->title}} </a>
            @endforeach
          </div>
          @endif
        </li>


        @endforeach

      </ul>
    </div>
  </div> --}}

  <div class="navbar navbar-expand-lg navbar-light navbar-bg-light py-0" style="box-shadow: 0 -8px 8px -6px;">
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav w-100 justify-content-center">
  
          @foreach( $page->navigation as $key=>$values)
  
          <li class="nav-item dropdown px-3">
            <a class="mb-0 p-2 nav-link dropdown-toggle nav-item" href="{{$values['url']}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{$values['title']}}
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{$values['url']}}">{{$values['title']}}</a> 
                    @foreach($values['children'] as $thePage)
                    <a class="dropdown-item" href="{{$thePage['url']}}">{{$thePage['title']}} </a>
                    @endforeach
                    @if($$key)
                    @foreach($$key as $thePage2)
                    <a class="dropdown-item" href="{{$thePage2->getPath()}}">{{$thePage2->title}} </a>
                    @endforeach
                    @endif
                  </div>
               
          </li>
  
  
          @endforeach
  
        </ul>
      </div>
    </div>

</nav>