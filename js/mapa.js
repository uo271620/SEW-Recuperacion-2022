var miMapa = new Object();

function initMap(){  
    var centro = {lat: 43.3672702, lng: -5.8502461};
    var mapaGeoposicionado = new google.maps.Map(document.getElementById('mapa'),{
        zoom: 17,
        center:centro,
        mapTypeId: google.maps.MapTypeId.ROADMAP,

    });
    var marker1 = new google.maps.Marker({
      position: {
          lat: 43.366895,
          lng: -5.847593
      },
      title:"Calle del Gral. Elorza"
    });
    marker1.setMap(mapaGeoposicionado);
    var marker2 = new google.maps.Marker({
      position: {
          lat: 43.360885,
          lng: -5.846569
      },
      title:"C. Fruela"
    });
    marker2.setMap(mapaGeoposicionado);
    var marker3 = new google.maps.Marker({
      position: {
          lat: 43.384352,
          lng: -5.824302
      },
      title:"Pl. de los Cuatro Caños"
    });
    marker3.setMap(mapaGeoposicionado);
    var marker4 = new google.maps.Marker({
      position: {
          lat: 43.554989,
          lng: -5.925142
      },
      title:"Calle Sánchez Calvo"
    });
    marker4.setMap(mapaGeoposicionado);

    var marker5 = new google.maps.Marker({
      position: {
          lat: 43.541702,
          lng: -5.661724
      },
      title:"C. Jovellanos"
    });
    marker5.setMap(mapaGeoposicionado);
    
    infoWindow = new google.maps.InfoWindow;
    if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
        
            
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