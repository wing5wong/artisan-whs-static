---
title: Facilities
date: 2019-04-02T00:00:00.000Z
tags:
  - About WHS
image: ''
intro: >-
  Whanganui High School is a modern, state funded, co-educational school of
  approximately 1500 students and over 160 staff, which prides itself on caring
  for individual students in a quality academic environment. The school provides
  a balanced education for its students from Year 9 through to Year 13.
button_text: Read Full Facilities Information
---

Whanganui High School takes great pride in offering a range of facilities to be used by its staff and students.

@foreach($facilities as $facility)
## {{$facility->title}}

{!! $facility !!}

<hr>

@endforeach