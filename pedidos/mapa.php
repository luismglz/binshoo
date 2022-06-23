<?php


?>
<style>
  #map {
    width: 100%;
    height: 350px;
    margin-top: 20px;
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-12">
      Search: <input id="autocomplete" class="form-control" placeholder="Enter your address" onFocus="geolocate()" type="text" autocomplete="off" />
    </div>
  </div>
</div>
<div class="container bg-light rounded shadow my-3 p-3">
  <div class="row">
    <div class="col-12 col-md-6">
      Street Address: <input id="route" name="route" class="form-control" />
    </div>
    <div class="col-12 col-md-6">
      No: <input id="street_number" name="street_number" class="form-control" />
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-6">
      City: <input id="locality" class="form-control" />
    </div>
    <div class="col-12 col-md-6">
      State/Prefecture: <input id="administrative_area_level_1" class="form-control" />
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-6">
      ZIP: <input id="postal_code" class="form-control" />
    </div>
    <div class="col-12 col-md-6">
      Country: <input id="country" class="form-control" />
      <input type="hidden" name="lat" id="latitude">
      <input type="hidden" name="lng" id="longitude">
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div id="map"></div>
    </div>
  </div>
</div>


<script>
  const street = document.querySelector("#route");
  const streetNumber = document.querySelector("#street_number");
  const city = document.querySelector("#locality");
  const administrativeArea = document.querySelector("#administrative_area_level_1");
  const zip = document.querySelector("#postal_code");
  const country = document.querySelector("#country");
  const latitude = document.querySelector("#latitude");
  const longitude = document.querySelector("#longitude");


  var placeSearch, autocomplete;

  var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
  };

  let coordinates = {
    lat: 35.692226,
    lng: 139.767086
  }

  var propiedades = {
    center: coordinates,
    zoom: 10
  };

  function initAutocomplete() {


    map = new google.maps.Map(document.getElementById('map'), propiedades);


    const options = {
      fields: ["formatted_address", "geometry", "name"],
      strictBounds: false,
      types: ["establishment"],
    };


    var autocompletado = document.getElementById('autocomplete');
    autocomplete = new google.maps.places.Autocomplete(autocompletado, options);

    autocomplete.bindTo("bounds", map);

    autocomplete.setFields(['address_component', 'geometry']);
    autocomplete.addListener('place_changed', obtieneDatos);

  }

  function obtieneDatos() {

    var place = autocomplete.getPlace();
    console.log(place)
    let locationLat = place.geometry.viewport.Ab.hi;
    let locationLng = place.geometry.viewport.Ua.hi;

    latitude.value = locationLat;
    longitude.value = locationLng;

    var marker = new google.maps.Marker({
      position: place.geometry.location,
      map: map
    });

    console.log('Location' + place.geometry.location);
    console.log(typeof(place));

    map.panTo(place.geometry.location);
    map.setZoom(18);
    map.setCenter(place.geometry.location);

    console.log(place.address_components);

    for (var i = 0; i < place.address_components.length; i++) {

      var addressType = place.address_components[i].types[0];

      console.log(addressType);

      if (componentForm[addressType]) {
        var val = place.address_components[i]['long_name'];
        document.getElementById(addressType).value = val;
      }
    }
  }


  function geolocate() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };


        var circle = new google.maps.Circle({
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35,
          map: map,
          center: geolocation,
          radius: position.coords.accuracy
        });

        console.log(circle.getBounds());

        autocomplete.setBounds(circle.getBounds());

      });
    }
  }
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkttUmIzUBdNNuK9kBCs3Ja0VoYYRsBtA&libraries=places&callback=initAutocomplete" async defer></script>