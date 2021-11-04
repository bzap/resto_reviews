document.getElementById('custom-file-loc').onchange = function () { 
    document.getElementById('loc-label').innerHTML = this.value.replace(/^.*[\\\/]/, '');
  }
  
document.getElementById('custom-file-food').onchange = function () { 
    document.getElementById('food-label').innerHTML = this.value.replace(/^.*[\\\/]/, '');
  }



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