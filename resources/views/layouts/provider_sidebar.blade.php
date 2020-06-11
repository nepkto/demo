<div class="list-group">
  <a href="{{ route('provider.home') }}" class="list-group-item list-group-item-action active">
    Dashboard
  </a>
  <a href="{{ route('provider.info', Auth::guard('service_provider')->id()) }}" class="list-group-item list-group-item-action">Edit My Info</a>

  <a href="{{ route('provider.experience.index', Auth::guard('service_provider')->id()) }}" class="list-group-item list-group-item-action">Profession/Experience</a>

  <a href="{{ route('provider.map')}}" class="list-group-item list-group-item-action">Map Location</a>
</div>