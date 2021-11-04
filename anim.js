
try{ 
    const results =  document.querySelector('.card');
    results.classList.add('animate__animated', 'animate__fadeIn');

    const review_card =  document.querySelector('.row');
    review_card.classList.add('animate__animated', 'animate__fadeIn');

    const item =  document.querySelector('.dropdown-menu');
    item.style.setProperty('--animate-duration', '0.5s');
    item.classList.add('animate__animated', 'animate__fadeIn');

}
catch(error){

}

