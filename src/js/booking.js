const moreInfoBtn = document.querySelector('#pop-up-price button');
const submitSect = document.querySelector('#submit-book-sect');
const cancel = document.querySelector('#cancel-submit');
const title = document.querySelector('#submit-book-title');
const date = document.querySelector('#submit-book-date');
const img = document.querySelector('#submit-book-img');
const description = document.querySelector('#submit-book-description');
const submitBtn = document.querySelector('#submit-book-submit');
const main = document.querySelector('main');
const header = document.querySelector('header');
const footer = document.querySelector('footer');

moreInfoBtn.addEventListener('click', () => {
    submitSect.classList.remove('hide');
    title.textContent = sessionStorage.getItem('title');
    date.textContent = sessionStorage.getItem('date');
    img.src = sessionStorage.getItem('imageSrc');
    description.textContent = sessionStorage.getItem('description');
    submitBtn.value = `Zarezerwuj za ${sessionStorage.getItem('price')}`;
    main.classList.add('blur');
    header.classList.add('blur');
    footer.classList.add('blur');
})

cancel.addEventListener('click', () => {
    submitSect.classList.add('hide');
    main.classList.remove('blur');
    header.classList.remove('blur');
    footer.classList.remove('blur');
})