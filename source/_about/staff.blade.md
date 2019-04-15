---
title: Staff
date: 2019-04-02T00:00:00.000Z
tags:
  - About WHS
image: ''
intro: WHS Staff
button_text: More Information
visible: 'Yes'
---

Whanganui High School takes great pride in offering a range of facilities to be used by its staff and students.

@foreach($staff as $st)
## {{$st->title}}
{{$st->departments}}
@endforeach
