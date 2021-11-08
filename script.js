// vars for the google map 
let map, infoWindow;
// used for retaining location data across pages 
storage = window.sessionStorage;

// this function takes the location of the user, initializes the map and places markers on it around the users location 
// it is used for the main search by geolocation functionality 
function initMap() {
    // initialize the google info window
    infoWindow = new google.maps.InfoWindow();
    infoWindow.setPosition({ lat: 0, lng: 0 });
    // this is used to show the user that the location is 'loading' prior to getting the geolocation
    infoWindow.setContent("LOADING LOCATION");
    // this initializes the map at a default coordinate 
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 0, lng: 0 },
      zoom: 2,
    });
    infoWindow.open(map);
    
    // this gets the location of the user using geolocation 
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            // use pos to store the lat and long 
            const pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
            };
            // set the location of the map to the geolocation lat and long 
            map.setCenter(pos);
            // zooms in further for better distinction of the area
            map.setZoom(13);
            // close the 'loading' sign
            infoWindow.close();
            
            // the following 4 consts are example markers of locations within the users area 
            const loc_one = new google.maps.Marker({
              // each marker is set to a nearby lat and long within the geolocation coordinates 
                position: { lat: pos.lat+0.009, lng: pos.lng+0.004 },
                label: "A",
                map,
              }); 
            const loc_two = new google.maps.Marker({
                position: { lat: pos.lat+0.014, lng: pos.lng+0.010 },
                label: "B",
                map,        
              }); 
             const loc_three = new google.maps.Marker({
                position: { lat: pos.lat+0.003, lng: pos.lng+0.006 },
                label: "C",
                map,
              }); 

            // the following 4 event listeners listen if the user has clicked a marker 
            // and then displays the location name, as well as a link to the object page 
            google.maps.event.addListener(loc_one, 'click', function(){
                infoWindow.close(); // Close previously opened infowindow
                // set the position of the marker within the geolocation coordinates 
                infoWindow.setPosition({lat: pos.lat+0.009, lng: pos.lng+0.004 });
                // move the map to the location of the clicked marker 
                map.panTo({lat: pos.lat+0.009, lng: pos.lng+0.004 });
                // set the content of the info window 
                infoWindow.setContent('Bento Sushi: <a href="individual_sample.html">' +
                "Read more</a> ");
                // set the pos data of the marker for other page uses 
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
                storage.setItem('lat', pos.lat+0.014);
                storage.setItem('lng', pos.lng+0.010);
                infoWindow.open(map, loc_two);
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
          // geolocation error handling 
          () => {
            handleLocationError(true, infoWindow, map.getCenter());
          }
        );
        // geolocation error handling 
      } else {
        handleLocationError(false, infoWindow, map.getCenter());
      }
  }

// this function initializes the map on the individual sample page and then sets its location 
function initMapIndividual() { 
  // this is to check if the user opened the page without getting prior geolocation data 
  // this way it will request the geolocation before loading the map 
    if (isNaN(parseFloat(storage.getItem('lat'))) || isNaN(parseFloat(storage.getItem('lng')))){ 
        submissionInd();
    }
    // otherwise just get the stored pos data from the search page and set the map location 
    else { 
      let lat = parseFloat(storage.getItem('lat'));
      let lng = parseFloat(storage.getItem('lng'));
      setMap(lat, lng);
    } 
 }

// this function gets the geolocation of the user separately
function submissionInd() { 
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          // use pos to store the lat and long 
          (position) => {
            const pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
            };
            // set the map position according to these coordinates 
            setMap(pos.lat, pos.lng);
        },
        // geolocation error handling 
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // geolocation error handling 
      handleLocationError(false, infoWindow, map.getCenter());
    }
}

// this function is used to initialize and set the map separately
function setMap(lat, lng) { 
  // initialize the map to the lat and long parameters 
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: lat, lng: lng },
      zoom: 2,
    }); 
    // set the center of the map to the lat and lng parameters 
    map.setCenter({ lat: lat, lng: lng });
    // zooms in further than the other map on the search page, to emphasize the individual location 
    map.setZoom(14);
    // create a marker to the location of the individual object location  
    const loc_one = new google.maps.Marker({
      position: { lat: lat, lng: lng },
      label: 'A',
      map,  
    }); 
}


// error handling function similar to that of the google documentation on places 
// https://developers.google.com/maps/documentation/javascript/geolocation?hl=ca
  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
      browserHasGeolocation
        ? "Please allow Geolocation permissions."
        : "Browser doesn't support geolocation."
    );
    infoWindow.open(map);
  }






