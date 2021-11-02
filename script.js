
let map, infoWindow;

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
                infoWindow.open(map, loc_one);
            });

            google.maps.event.addListener(loc_two, 'click', function(){
                infoWindow.close(); // Close previously opened infowindow
                infoWindow.setPosition({lat: pos.lat+0.014, lng: pos.lng+0.010 });
                map.panTo({lat: pos.lat+0.014, lng: pos.lng+0.010 });
                infoWindow.setContent('Umi Sushi Express: <a href="individual_sample.html">' +
                "Read more</a> ");
                infoWindow.open(map, loc_two);
            });

            google.maps.event.addListener(loc_three, 'click', function(){
                infoWindow.close(); // Close previously opened infowindow
                infoWindow.setPosition({lat: pos.lat+0.003, lng: pos.lng+0.006 });
                map.panTo({lat: pos.lat+0.003, lng: pos.lng+0.006 });
                infoWindow.setContent('Sushi On Fennell: <a href="individual_sample.html">' +
                "Read more</a> ");
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



/*
function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: -34.397, lng: 150.644 },
      zoom: 13,
    });
    infoWindow = new google.maps.InfoWindow();
  
    const locationButton = document.createElement("button");
  
    locationButton.textContent = "Pan to Current Location";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
      // Try HTML5 geolocation.
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            const pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
            };
  
            infoWindow.setPosition(pos);
            infoWindow.setContent("Location found.");
            infoWindow.open(map);
            map.setCenter(pos);
          },
          () => {
            handleLocationError(true, infoWindow, map.getCenter());
          }
        );
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }
    });
  }
  */
  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
      browserHasGeolocation
        ? "Error: The Geolocation service failed."
        : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
  }

// https://developers.google.com/maps/documentation/javascript/examples/map-geolocation 

// use this to determine your current geolocation on the search press 





