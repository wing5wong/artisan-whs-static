@if($announcement = $announcements->first())
<style>
  .emergency {
    background: #a41e21;
    color: #fff
  }
</style>

<div class="decorated wrap wrap--notification text-center {{$announcement->is_emergency ? "emergency" : ''}}"
  style="padding: 1em 0; position: relative; z-index: 99; box-shadow: 0 8px 6px -6px #111">

  <h2>
    {{ $announcement->title }}
    @if($announcement->subtitle)
    <br>
    <small class="text-muted" style="font-size: 60%;">
      {{$announcement->subtitle }}
    </small>
    @endif
  </h2>
  <a class="btn btn-light" href="{{$announcement->getPath()}}">Read the full announcement</a>

</div>
@endif