@extends('_layouts.standard') 


@section('title', $page->title) 

@section('content')
<h1 class="decorated py-3 mb-4">International</h1>


  <div style="height: 0; position: relative; padding-bottom: 56.25%">
    <iframe style="position: absolute; top:0; left: 0; "width="100%" height="100%" src="https://www.youtube.com/embed/mKJynLxG79k" frameborder="0" allowfullscreen></iframe>
  </div>
    

  @include('_international-content')



      <article class="py-3">
        <h3 class="decorated py-3 mb-4">
          <pop:title /> - <pop:role wrap="span" class="text-muted" />
        </h3>
        <div class="row">
          <div class="col">
            <pop:image width="255" resize="limit" />
          </div>
          <div class="col">
            <pop:body />
            <pop:email>
            <a href="mailto:<pop:value/>" class="button button--green"><pop:value/></a>
            </pop:email>
          </div>
        </div>
      </article>
      
  <pop:content from="term-dates" >
    <pop:title wrap="h2" />
    <pop:body />
    <pop:include template="includes/partials/term-dates" />
  </pop:content>
    
  </pop:content>
  
</pop:block>
@endsection