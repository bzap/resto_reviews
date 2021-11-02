let map, infoWindow;
storage = window.sessionStorage;



function submissionLoc() { 
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            const pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
            };
            document.getElementById('sub-lat').value=pos.lat;
            document.getElementById('sub-long').value=pos.lng;
            storage.setItem('lat', pos.lat);
            storage.setItem('lng', pos.lng);
            
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }

}


function initMap() {
    infoWindow = new google.maps.InfoWindow();
    infoWindow.setPosition({ lat: 0, lng: 0 });
    infoWindow.setContent("LOADING LOCATION");
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 0, lng: 0 },
      zoom: 2,
    });
    infoWindow.open(map);
    
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            const pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
            };
  
            map.setCenter(pos);
            map.setZoom(13);
            infoWindow.close();



            const loc_one = new google.maps.Marker({
        
                position: { lat: pos.lat+0.009, lng: pos.lng+0.004 },
                label: "A",
                map,
                title: "Hello World!",
                
              }); 

            const loc_two = new google.maps.Marker({
        
                position: { lat: pos.lat+0.014, lng: pos.lng+0.010 },
                label: "B",
                map,
                
                title: "Hello World!",
              
              }); 

             const loc_three = new google.maps.Marker({
        
                position: { lat: pos.lat+0.003, lng: pos.lng+0.006 },
                label: "C",
                map,
                title: "Hello World!",
              }); 

              console.log(pos);
              console.log({lat: pos.lat+0.007, lng: pos.lng+0.010 })       

              google.maps.event.addListener(loc_one, 'click', function(){

                infoWindow.close(); // Close previously opened infowindow
                infoWindow.setPosition({lat: pos.lat+0.009, lng: pos.lng+0.004 });
                map.panTo({lat: pos.lat+0.009, lng: pos.lng+0.004 });
                infoWindow.setContent('Bento Sushi: <a href="individual_sample.html">' +
                "Read more</a> ");
                storage.setItem('lat', pos.lat+0.009);
                storage.setItem('lng', pos.lng+0.004);
                infoWindow.open(map, loc_one);
            });

            google.maps.event.addListener(loc_two, 'click', function(){
                infoWindow.close(); // Close previously opened infowindow
                infoWindow.setPosition({lat: pos.lat+0.014, lng: pos.lng+0.010 });
                map.panTo({lat: pos.lat+0.014, lng: pos.lng+0.010 });
                infoWindow.setContent('Umi Sushi Express: <a href="individual_sample.html">' +
                "Read more</a> ");
                console.log(pos.lat);
                storage.setItem('lat', pos.lat+0.014);
                storage.setItem('lng', pos.lng+0.010);
                infoWindow.open(map, loc_two);
                /*
                if (document.url == 'sample.html'){
                    initMapIndividual(pos); 
                }
                */
            });

            google.maps.event.addListener(loc_three, 'click', function(){
                infoWindow.close(); // Close previously opened infowindow
                infoWindow.setPosition({lat: pos.lat+0.003, lng: pos.lng+0.006 });
                map.panTo({lat: pos.lat+0.003, lng: pos.lng+0.006 });
                infoWindow.setContent('Sushi On Fennell: <a href="individual_sample.html">' +
                "Read more</a> ");
                storage.setItem('lat', pos.lat+0.003);
                storage.setItem('lng', pos.lng+0.006);
                infoWindow.open(map, loc_three);
            });
          },
          () => {
            handleLocationError(true, infoWindow, map.getCenter());
          }
        );
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }
  }

 function initMapIndividual() { 
    let lat = parseFloat(storage.getItem('lat'));
    let lng = parseFloat(storage.getItem('lng'));
    console.log(lng);
    console.log(isNaN(lng));

    if (isNaN(lng) || isNaN(lat)){ 
        console.log("i got here");
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
              (position) => {
                const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                };
                document.getElementById('sub-lat').value=pos.lat;
                document.getElementById('sub-long').value=pos.lng;
                storage.setItem('lat', pos.lat);
                storage.setItem('lng', pos.lng);
                
            },
            () => {
            
            }
          );
        } else {
          // Browser doesn't support Geolocation
        }
        console.log(parseFloat(storage.getItem('lat')));

    }
    let lat_new = parseFloat(storage.getItem('lat'));
    let lng_new = parseFloat(storage.getItem('lng'));
    console.log(lng_new);
    //console.log(Object.prototype.toString.call(lat));
    //console.log(lat);
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: lat, lng: lng },
        zoom: 2,
      }); 
      map.setCenter({ lat: lat, lng: lng });
      map.setZoom(14);


      const loc_one = new google.maps.Marker({
        position: { lat: lat, lng: lng },
        label: 'A',
        map,  
      }); 
 }


  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
      browserHasGeolocation
        ? "Please allow Geolocation permissions."
        : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
  }






