const city = document.getElementById('city');
const password = document.getElementById('password');
let error = document.getElementsByClassName('error');




function valError(id, message, index){
    //console.log(id.value);
    if (id.value.trim() === "" || id.value.trim() == 'Select...' || !id.checked){
        error[index].innerText = message; 
    }
    else {
        //console.log("ok");
        error[index].innerText = "";
      }
}


document.getElementById('registration').addEventListener('submit', (e) => {
    e.preventDefault();
    valError(document.getElementById('email-pt1'), "Missing email address!", 0);
    valError(document.getElementById('email-pt2'), "Missing domain!", 1);
    if (error[0].innerText.length > 1 && error[1].innerText.length > 1){ 

      error[0].innerText = "Missing email address and domain!";
      error[1].innerText = "";
    }
    valError(document.getElementById('password'), "Missing password!", 2);
    valError(document.getElementById('date'), "Missing date!", 3);
    valError(document.getElementById('address'), "Missing street!", 4);
    valError(document.getElementById('city'), "Missing city!", 5);

    valError(document.getElementById('input-state'), "Missing province!", 6);

    valError(document.getElementById('postal-code'), "Missing postalcode!", 7);

    valError(document.getElementById('grid-check'), "Missing terms and conditions!", 8);
    
    const item =  document.querySelectorAll('.error');

    for (i = 0; i < item.length; i++){ 
      item[i].classList.add('animate__animated', 'animate__fadeIn');
    }
})




