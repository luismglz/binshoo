<div id="locationsSection" class="container-fluid parent-section">
  <div class="">
    <div class="row">
      <div class="col-12 text-center mt-3">
        <h2 class="title-section" data-aos="zoom-in-up">LOCATIONS</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div id="map"></div>
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


    let eastAsia = {
      lat: 34.047863,
      lng: 100.619655
    }

    let coordinates = {
      lat: 35.692226,
      lng: 139.767086
    }

    let minato = {
      lat: 35.65259507484344,
      lng: 139.73600629202647
    }

    let osaka = {
      lat: 34.66872615036919,
      lng: 135.50159383271918
    }

    let sapporo = {
      lat: 43.060999100847496,
      lng: 141.3440934819399
    }

    let daegu = {
      lat: 35.85751287419745,
      lng: 128.6257475295033
    }

    let seoul = {
      lat: 37.57027814205983,
      lng: 126.97782640535901
    }


    let taipei = {
      lat: 25.05489363104958,
      lng: 121.52483147660456
    }

    let shanghai = {
      lat: 31.240448265224757,
      lng: 121.48319525805104
    }

    let hongkong = {
      lat: 22.31925241464266,
      lng: 114.16910049416384
    }
    
    let kolkata = {
      lat: 22.573738418629713,
      lng: 88.36449137537144
    }
    
    let bangkok = {
      lat: 13.72179787985375,
      lng: 100.52945060633347
    }
    
    let wuhan = {
      lat: 30.504414227197458,
      lng: 114.42363907730264
    }



    let map = new google.maps.Map(
      document.querySelector('#map'), {
        center: coordinates,
        zoom: 4,
        maxZoom: 100,
        mapTypeId: 'styled_map',
        mapTypeControl: false,
      }
    );



    let pin = new google.maps.Marker({
      position: coordinates,
      map: map
    });

    let pinMinato = new google.maps.Marker({
      position: minato,
      map: map
    });

    let pinOsaka = new google.maps.Marker({
      position: osaka,
      map: map
    });

    let pinSapporo = new google.maps.Marker({
      position: sapporo,
      map: map
    });

    let pinDaegu = new google.maps.Marker({
      position: daegu,
      map: map
    });

    let pinSeoul = new google.maps.Marker({
      position: seoul,
      map: map
    });

    let pinTaipei = new google.maps.Marker({
      position: taipei,
      map: map
    });

    let pinShanghai = new google.maps.Marker({
      position: shanghai,
      map: map
    });

    let pinHongKong = new google.maps.Marker({
      position: hongkong,
      map: map
    });
    let pinKolkata = new google.maps.Marker({
      position: kolkata,
      map: map
    });
    let pinBangkok = new google.maps.Marker({
      position: bangkok,
      map: map
    });
    let pinWuhan = new google.maps.Marker({
      position: wuhan,
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


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAxNtO3D3dmYsGK-9KI7TZt-nHN_9d7XE&libraries=places&callback=initMap" async defer></script>