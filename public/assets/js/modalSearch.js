document.addEventListener('DOMContentLoaded', function () {
    const searchButton = document.getElementById('search');
    const modal = document.querySelector('.modal');
    const modalCover = document.querySelector('.modal-cover');
    const body = document.querySelector('.body'); 
    const modalClose = document.querySelector('.close');

    searchButton.addEventListener('click', function () {
        modal.classList.add('active');
        body.classList.add('active');
    });

    modalCover.addEventListener('click', function () {
        modal.classList.remove('active');
        body.classList.remove('active');
    });

    modalClose.addEventListener('click', function () {
        modal.classList.remove('active');
        body.classList.remove('active');
    });
});