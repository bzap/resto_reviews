// embedded in a try-catch in case one of the html pages does not contain that query 
try{ 
    // add a fade animation to the card containers (found when loading any page)
    const results =  document.querySelector('.card');
    results.classList.add('animate__animated', 'animate__fadeIn');

    // add a fade animation to the card containers (found when loading any page)
    const review_card =  document.querySelector('.row');
    review_card.classList.add('animate__animated', 'animate__fadeIn');

    // add a fade animation to the dropdown on the navbar (found when loading any page)
    const item =  document.querySelector('.dropdown-menu');
    item.style.setProperty('--animate-duration', '0.5s');
    item.classList.add('animate__animated', 'animate__fadeIn');
}
catch(error){
}

