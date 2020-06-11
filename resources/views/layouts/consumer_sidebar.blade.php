<div class="list-group">
  <a href="{{ route('consumer.home') }}" class="list-group-item list-group-item-action active">
    Dashboard
  </a>
  <a href="{{ route('consumer.info', Auth::guard('service_consumer')->id()) }}" class="list-group-item list-group-item-action">Edit My Info</a>

  <a href="Javascript:void(0)" class="list-group-item list-group-item-action">Providers NearBy</a>

  <a href="{{ route('request-services.index') }}" class="list-group-item list-group-item-action">Request Service</a>
</div>