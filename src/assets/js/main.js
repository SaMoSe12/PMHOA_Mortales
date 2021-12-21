const NAVBARBURGERS = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'));
const _HTML = document.querySelector('html');
const NAVBAR = document.querySelector('nav.navbar');
const UCOBUTTON = document.querySelector('#uco-button');
const RENTABUTTON = document.querySelector('#boton-renta');
const MODALBUTTONES = document.querySelectorAll('.modalButton');
const CLOSEBUTTONS = document.querySelectorAll('button.delete');

document.addEventListener('DOMContentLoaded', () => {

    // Logica para que los menus de hamburgesa enseñen el menu del navbar
    if(NAVBARBURGERS){
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

    UCOBUTTON.addEventListener('click', (e) => {
        var target = document.getElementById(e.target.dataset['target']);
        target.classList.add('is-active');
        _HTML.classList.add('is-clipped');
    });
    if(RENTABUTTON){
        RENTABUTTON.addEventListener('click', (e) => {
            console.log(e.target);
            var target;
            if(e.target.nodeName === 'A'){
                target = document.getElementById(e.target.dataset['target']);
            }
            else{
                // console.log(e.target.parentNode);
                target = document.getElementById(e.target.parentNode.dataset.target);
            }
            target.classList.add('is-active');
            _HTML.classList.add('is-clipped');
        });
    }
    MODALBUTTONES.forEach((button) => {
        button.addEventListener('click', (e) => {
            //console.log(e.path[1]);
            var target = document.getElementById(e.path[1].dataset['target']);
            target.classList.add('is-active');
            _HTML.classList.add('is-clipped');
        });
    });
    CLOSEBUTTONS.forEach((closeButton)=>{
        closeButton.addEventListener('click', (e)=>{
            var target = document.querySelector('.modal.is-active');
            target.classList.remove('is-active');
            _HTML.classList.remove('is-clipped');
        });
    });
    document.addEventListener('keydown', (e) => {
        var modal = document.querySelector('.modal.is-active');
        if (modal && e.code === 'Escape'){
            modal.classList.remove('is-active');
            _HTML.classList.remove('is-clipped');
        }
    })
});