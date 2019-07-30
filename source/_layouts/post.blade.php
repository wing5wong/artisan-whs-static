@extends('_layouts.standard') 

@section('title', $page->title) 

@section('content')
<main>
    <h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

    {{-- I know inline CSS isn't good, but this is just a template so you should change everything anyway --}}
    @if ($page->image)
        <!--<img src="{{ $page->imageCdn($page->image) }}" style="object-fit: cover; height: 250px; width: 100%;">-->
        <a href="{{ $page->image }}" @if($page->image_title)title="{{$page->image_title}}"@endif @if($page->image_alt)alt="{{$page->image_alt}}"@endif class="featured">
            <img src="{{ $page->image }}" class="featured-image"  style="object-fit: cover; max-width:100%; display: block;">
        </a>
        @if($page->image_credit)
        <div class="image-credit">
            <em>Photo / {{$page->image_credit}}</em>
        </div>
        @endif

    @endif
    @yield('postContent')

    @if(is_array($page->image_gallery))
    <div class="image-gallery">
        @foreach($page->image_gallery as $image)
        <a href="{{$image["image"]}}" class="featured">
            <img src="{{ str_replace("https://res.cloudinary.com/whanganuihigh/image/upload/","https://res.cloudinary.com/whanganuihigh/image/upload/c_scale,q_80,w_300/",$image["image"])}}" @isset($image["description"])alt="{{$image["description"]}}"@endisset @isset($image["title"])title="{{$image["title"]}}"@endisset>
        </a>
        @endforeach
    </div>
    @endif

 

 <style>

a.featured[title]:after {
  content: attr(title);
  padding: 4px 8px;
  color: #FFF;
 background-color:black;
 display: block;
    }

    .image-credit {
        margin: -2em 0 2em 0;
    }

     </style>
     </main>
    @include('_partials.lastReviewed')
    

    <script>
        function addClass(el, className) {
            if (el.classList) el.classList.add(className);
            else if (!hasClass(el, className)) el.className += ' ' + className;
        }


        function wrapAll(nodes, wrapper) {
            // Cache the current parent and previous sibling of the first node.
            var parent = nodes[0].parentNode;
            var previousSibling = nodes[0].previousSibling;

            // Place each node in wrapper.
            //  - If nodes is an array, we must increment the index we grab from 
            //    after each loop.
            //  - If nodes is a NodeList, each node is automatically removed from 
            //    the NodeList when it is removed from its parent with appendChild.
            for (var i = 0; nodes.length - i; wrapper.firstChild === nodes[0] && i++) {
                wrapper.setAttribute('title', nodes[i].getAttribute('title'))
                wrapper.setAttribute('href', nodes[i].getAttribute('src'))
                addClass(wrapper, 'featured')
                wrapper.appendChild(nodes[i]);
            }

            // Place the wrapper just after the cached previousSibling,
            // or if that is null, just before the first child.
            var nextSibling = previousSibling ? previousSibling.nextSibling : parent.firstChild;
            parent.insertBefore(wrapper, nextSibling);

            return wrapper;
        }

        var nodes = document.querySelectorAll('main img:not(.featured-image)');
        var wrapper = document.createElement('a');
        wrapAll(nodes, wrapper)
    </script>
@endsection