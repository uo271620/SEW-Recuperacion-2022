var miMapa = new Object();

function initMap(){  
    var centro = {lat: 43.3672702, lng: -5.8502461};
    var mapaGeoposicionado = new google.maps.Map(document.getElementById('mapa'),{
        zoom: 17,
        center:centro,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    infoWindow = new google.maps.InfoWindow;
    if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
        
            var marker = new google.maps.Marker({
                position: {
                    lat: 43.3672702,
                    lng: -5.8502461
                },
                title:"Tienda 1"
            });
            marker.setMap(mapaGeoposicionado);

            mapaGeoposicionado.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, mapaGeoposicionado.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, mapaGeoposicionado.getCenter());
        }
      }
      
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: Ha fallado la geolocalizacion' :
                              'Error: Su navegador no soporta geolocalizacion');
        infoWindow.open(mapaGeoposicionado);
      }

miMapa.initMap = initMap;