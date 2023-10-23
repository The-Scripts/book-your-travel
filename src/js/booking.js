const moreInfoBtn = document.querySelector('#pop-up-price button');
const submitSect = document.querySelector('#submit-book-sect');

moreInfoBtn.addEventListener('click', () => {
    submitSect.classList.remove('hide');
})