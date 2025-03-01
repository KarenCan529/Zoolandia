const navBtn = document.querySelector('.nav-btn');
const mainMenu = document.querySelector('.main-menu');
const navBar = document.querySelector('.navbar');

navBtn.addEventListener('click', () => {
    navBar.classList.toggle('active');
    navBtn.classList.toggle('active');
    mainMenu.classList.toggle('active');
});

window.addEventListener('scroll', function () {
    if (mainMenu.classList.contains('active')) {
        mainMenu.classList.remove('active');
        navBar.classList.remove('active');
        navBtn.classList.remove('active');
    }
});


function scrollToFooter() {
    const footerSection = document.getElementById('Footer');
    if (footerSection) {
        footerSection.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}


const contactButton = document.querySelector('.btn');
contactButton.addEventListener('click', scrollToFooter);
