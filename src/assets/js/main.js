const NAVBARBURGERS = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'));
const _HTML = document.querySelector('html');
const NAVBAR = document.querySelector('nav.navbar');
document.addEventListener('DOMContentLoaded', () => {

    // Logica para que los menus de hamburgesa enseñen el menu del navbar
    if(NAVBARBURGERS > 0){

        NAVBARBURGERS.forEach(element => {
            element.addEventListener('click', () => {

                const TARGET = element.dataset.target;
                const _TARGET = document.querySelector('#'+TARGET);

                element.classList.toggle('is-active');
                _TARGET.classList.toggle('is-active');
            });
        });
    }
    window.addEventListener('scroll', () => {
        var scroll_level = window.scrollY
        if (scroll_level > 102){
            NAVBAR.classList.add('is-fixed-top')
            _HTML.classList.add('has-navbar-fixed-top')
        }
        else {
            NAVBAR.classList.remove('is-fixed-top')
            _HTML.classList.remove('has-navbar-fixed-top')
        }
    });


});