// this script is intended for separate use by the submission.html page 

// get the city, password divs 
const city = document.getElementById('city');
const password = document.getElementById('password');
// get the errors divs
let error = document.getElementsByClassName('error');

// this function takes the missing form and sets the error message based on the error div index 
function valError(id, message, index){
    // trims the input and checks if it's empty, handles the dropdown, and validates the checkbox 
    if (id.value.trim() === "" || id.value.trim() == 'Select...'){
        // sets the error message to the specified div 
        error[index].innerText = message; 
    }
    else {
        // otherwise the message should be empty 
        error[index].innerText = "";
      }
}

// this eventlistener handles the click on the submit button and checks to see what forms are missing 
// it finds the form by id, and then 
document.getElementById('registration').addEventListener('submit', (e) => {
    // prevent submission of the form if any forms are empty 
    e.preventDefault();
    valError(document.getElementById('email-pt1'), "Missing email address!", 0);
    valError(document.getElementById('email-pt2'), "Missing domain!", 1);
    // this separates the error message of the email and address fields based on which form is missing 
    // eg. one or both
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
    // find every error query 
    const item =  document.querySelectorAll('.error');
    // add a fade animation to each one for when they appear 
    for (i = 0; i < item.length; i++){ 
      item[i].classList.add('animate__animated', 'animate__fadeIn');
    }
})




