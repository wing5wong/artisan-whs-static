---
title: Student Experiences
date: 2019-06-26T02:47:57.261Z
---
@foreach($page->students as $student)

<article class="py-3">
        <h2 class="decorated py-3 mb-4">
               {{ $student\["title"]}}
          <span class="text-muted">{{ $student\["city_country"]}}</span>
            </h2>
        <div class="row">
          <div class="col">
            <img src="{{ $student->image }}" width="140" height="186" alt="">
          </div>
          <div class="col">
            {!! $student\["body"] !!}
          </div>
        </div>
      </article>

@endforeach
