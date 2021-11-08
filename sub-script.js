// this script is intended for separate use by the submission.html page 

// show the selected file name from the location input 
// replaces the directory text to show the filename only 
document.getElementById('custom-file-loc').onchange = function () { 
    document.getElementById('loc-label').innerHTML = this.value.replace(/^.*[\\\/]/, '');
  }
// show the selected file name from the food input 
// replaces the directory text to show the filename only 
document.getElementById('custom-file-food').onchange = function () { 
    document.getElementById('food-label').innerHTML = this.value.replace(/^.*[\\\/]/, '');
  }

// this function gets the geolocation and adds it to the lat and long inputs 
function submissionLoc() { 
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            // use pos to store the lat and long 
            const pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
            };
            // set the values of lat and long in the input fields 
            document.getElementById('sub-lat').value=pos.lat;
            document.getElementById('sub-long').value=pos.lng;    
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