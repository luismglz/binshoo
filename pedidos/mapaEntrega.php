<?php
$id = $_GET["id"];
$fullname = $_SESSION["nombre"];
$consulta  =
  $consulta  = " SELECT * FROM tb_pedidos WHERE id_pedido = ?";
$query = $conn->prepare($consulta);
$query->bindParam(1, $id);
$query->execute();
$registroOrder = $query->fetch()

?>

<div id="locationOrderSection" class="container-fluid parent-section">
  <div class="">
    <div class="row">
      <div class="col-12 text-center mt-3">
        <h2 data-aos="zoom-in-up">Order Location</h2>
      </div>
    </div>

    <div id="rowMapDetail" class="row">
      <div class="col-md-8 col-8">
        <div id="mapDetail"></div>
      </div>

    </div>
  </div>
</div>
<script>
  function initMap() {
    var stylesArray = [{
        "elementType": "geometry",
        "stylers": [{
          "color": "#212121"
        }]
      },
      {
        "elementType": "labels.icon",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#757575"
        }]
      },
      {
        "elementType": "labels.text.stroke",
        "stylers": [{
          "color": "#212121"
        }]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry",
        "stylers": [{
          "color": "#757575"
        }]
      },
      {
        "featureType": "administrative.country",
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#9e9e9e"
        }]
      },
      {
        "featureType": "administrative.land_parcel",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "administrative.locality",
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#bdbdbd"
        }]
      },
      {
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#757575"
        }]
      },
      {
        "featureType": "poi.business",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [{
          "color": "#181818"
        }]
      },
      {
        "featureType": "poi.park",
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#616161"
        }]
      },
      {
        "featureType": "poi.park",
        "elementType": "labels.text.stroke",
        "stylers": [{
          "color": "#1b1b1b"
        }]
      },
      {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#2c2c2c"
        }]
      },
      {
        "featureType": "road",
        "elementType": "labels.icon",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#8a8a8a"
        }]
      },
      {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [{
          "color": "#373737"
        }]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [{
          "color": "#3c3c3c"
        }]
      },
      {
        "featureType": "road.highway.controlled_access",
        "elementType": "geometry",
        "stylers": [{
          "color": "#4e4e4e"
        }]
      },
      {
        "featureType": "road.local",
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#616161"
        }]
      },
      {
        "featureType": "transit",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "transit",
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#757575"
        }]
      },
      {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [{
          "color": "#000000"
        }]
      },
      {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#3d3d3d"
        }]
      }
    ]

    let coordinates = {
      lat: <?= $registroOrder["latitud_pedido"]  ?>,
      lng: <?= $registroOrder["longitud_pedido"]  ?>
    }




    let map = new google.maps.Map(
      document.querySelector('#mapDetail'), {
        center: coordinates,
        zoom: 15,
        mapTypeId: 'styled_map',
        mapTypeControl: false,
      }
    );



    let pin = new google.maps.Marker({
      position: coordinates,
      map: map
    });

    const styledMapType = new google.maps.StyledMapType(
      stylesArray, {
        name: "Styled Map"
      }
    );

    map.mapTypes.set("styled_map", styledMapType);
    map.setMapTypeId("styled_map");

  }
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkttUmIzUBdNNuK9kBCs3Ja0VoYYRsBtA&libraries=places&callback=initAutocomplete" async defer></script>