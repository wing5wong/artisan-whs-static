  <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
 {{-- @includeWhen($page->production, '_partials.analytics') --}}
  @include('_partials.cms.identity_redirect')