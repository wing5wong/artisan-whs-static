@if($announcement = $announcements->first())
<style>
    .emergency {
      background: #a41e21;
      color: #fff
    }
  </style>

<div class="decorated wrap wrap--notification {{$announcement->is_emergency ? "emergency" : ''}}" style="padding: 1em 0; position: relative; z-index: 99; box-shadow: 0 8px 6px -6px #111">
    <div class="row column" style="display: flex; align-items:center; justify-content: center; text-align: center;flex-wrap: wrap">

    <h2 class="text-center">
        {{ $announcement->title }}
    </h2>
    <p>{!! $announcement !!}</p>
      <a class="btn" href="{{$announcement->getPath()}}">Read the full announcement</a>
    </div>
  </div>
@endif