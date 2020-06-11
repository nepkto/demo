@extends('layouts.app',
            [
                'login_route' => 'provider.login', 
                'register_route' => 'provider.register',
                'guard_name' => 'service_provider',
                'logout_route' => 'provider.logout',
                'profile_route' => 'provider.profile.index'
            ]
        )

@section('siderbar')
    @include('layouts.provider_sidebar')
@endsection

@section('styles')
    <style>
        #map {
            height: 75vh;
        }
        #infowindow-content {
          display: none;
        }
    </style>
@stop


@section('content')
    <div id="address-box">
        <form class="form-inline p-2" method="POST" action="{{ route('provider.map.update', $authId) }}">
            @csrf
            @method('PATCH')
            <input type="text" id="address" name="address" class="form-control  mb-2 mr-sm-2" placeholder="Search Address" value="{{ $location->address }}">
            <input type="hidden" id="latitude" name="latitude" class="form-control" value="{{ $location->latitude?: '' }}">
            <input type="hidden" id="longitude" name="longitude" class="form-control" value="{{ $location->latitude?:'' }}">
          <button type="submit" class="btn btn-secondary mb-2">Update Address</button>
        </form>
    </div>
    <div id="map"></div>
    <div id="infowindow-content">
      <span id="place-name"  class="title"></span><br>
      <strong>Place ID</strong>: <span id="place-id"></span><br>
      <span id="place-address"></span>
    </div>

@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API') }}&libraries=places&callback=initMap" async defer></script>
    <script>
        let defaultLat = "{{ config('constant.lat') }}";
        let defaultLng = "{{ config('constant.lng') }}";
        let dbLatitude = "{{ $location->latitude}}";
        let dbLongitude = "{{ $location->longitude}}";
        let initLat = dbLatitude || defaultLat;
        let initLng = dbLongitude || defaultLng;
        let getLat = document.getElementById('latitude');
        let getLng = document.getElementById('longitude');
        function initMap() {
          let map = new google.maps.Map(
              document.getElementById('map'),
              {center: {lat: parseFloat(initLat), lng: parseFloat(initLng)},
               zoom: 7
           });

          var address = document.getElementById('address');
          
          var card = document.getElementById('address-box')

          var autocomplete = new google.maps.places.Autocomplete(address);

          autocomplete.setComponentRestrictions(
            {'country': 'np'}
          );

          autocomplete.bindTo('bounds', map);

          // Specify just the place data fields that you need.
          autocomplete.setFields(['place_id', 'geometry', 'name', 'formatted_address']);

          map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);

          var infowindow = new google.maps.InfoWindow();
          var infowindowContent = document.getElementById('infowindow-content');
          infowindow.setContent(infowindowContent);

          var geocoder = new google.maps.Geocoder;

          var marker = new google.maps.Marker({map: map});
          marker.addListener('click', function() {
            infowindow.open(map, marker);
          });

          autocomplete.addListener('place_changed', function() {
            infowindow.close();
            var place = autocomplete.getPlace();

            if (!place.place_id) {
              return;
            }
            geocoder.geocode({'placeId': place.place_id}, function(results, status) {
              if (status !== 'OK') {
                window.alert('Geocoder failed due to: ' + status);
                return;
              }
                var lat = results[0].geometry.location.lat();
              var lng = results[0].geometry.location.lng();
              
              
              setLatLng(lat,lng);
              
                    
              map.setZoom(17);
              map.setCenter(results[0].geometry.location);

              // Set the position of the marker using the place ID and location.
              marker.setPlace(
                  {placeId: place.place_id, location: results[0].geometry.location});

              marker.setVisible(true);

              infowindowContent.children['place-name'].textContent = place.name;
              infowindowContent.children['place-id'].textContent = place.place_id;
              infowindowContent.children['place-address'].textContent =
                  results[0].formatted_address;

              infowindow.open(map, marker);
            });
          });
        }
        function setLatLng(lat,lng) {
            getLat.value = lat;
            getLng.value = lng;
        }
        function gm_authFailure() { 
          console.log('err')
         };
    </script>

@stop