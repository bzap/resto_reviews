let map, infoWindow;
storage = window.sessionStorage;


const fileLoc = document.getElementById('custom-file-loc');

/*
fileLoc.onchangdocument.getElementById('custom-file-loc')e = function () { 
    document.getElementById('loc-label').innerHTML = this.value.replace(/^.*[\\\/]/, '');
}
*/

/*
document.getElementById('custom-file-food').onchange = function () { 
    document.getElementById('food-label').innerHTML = this.value.replace(/^.*[\\\/]/, '');
}
*/

//const form = 
const city = document.getElementById('city');
const password = document.getElementById('password');
let error = document.getElementsByClassName('error');

//console.log(form);
console.log(error[0].innerText);
error[0].innerText = "sdf"; 
//console.log(password);
console.log(error[0].innerText);

function valError(id, errorMsg, serial){

    if (id.value.trim() === ""){
        console.log("yeah")
        console.log(error);
         error[serial].innerText = errorMsg; 
         console.log(error);
    }
    else {
        console.log("ok");
        error[serial].innerText = "";
      }


}

document.getElementById('registration').addEventListener('submit', (e) => {
    e.preventDefault();
    /*
    console.log("i got here");
    //let mesasges = [] 
    if (password.value === '' || password.value == null){
          error.innerText = "yeah budddHE";

    }
    */
    //    console.log("why");
    //}
    //if (mesasges.length > 0){
    //    
    //    error.innerText = messages.join(',');
    //}

    valError(document.getElementById('email-pt1'), "no email", 0);
    valError(document.getElementById('email-pt2'), "no email2", 1);
    valError(document.getElementById('password'), "no password", 2);
    valError(document.getElementById('date'), "no date", 3);
    valError(document.getElementById('address'), "no street", 4);
    valError(document.getElementById('city'), "no city", 5);
    valError(document.getElementById('input-state'), "no prov", 6);
    valError(document.getElementById('postal-code'), "no postalcode", 7);

   
    

})






// add the error messages here and add custom html to hide/display the error messages

// https://www.javascripttutorial.net/javascript-dom/javascript-form-validation/


/*
document.getElementById("password").addEventListener("input", function(event){ 


    if (document.getElementById("password").validity.valueMissing) { 
        passwordError.textContent = "Password is required." 
    }
    else { 

    }
})

var password = document.getElementById("password");
function registration() { 

    if (password.innerHTML == null || password.innerhtml == ''){ 
        alert 
    }

}

*/ 
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
        submissionLoc();

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






