let currentGroup = 0;
let autoPlayInterval;


function mostrarGrupo(indice) {
    const testimonios = document.querySelectorAll('.testimonio');
    const indicadores = document.querySelectorAll('.indicador');
    const isMobile = window.innerWidth <= 768;


    testimonios.forEach((testimonio) => {
        testimonio.classList.remove('mostrar');
    });

    if (isMobile) {
        if (testimonios[indice]) {
            testimonios[indice].classList.add('mostrar');
        }
    } else {

        for (let i = indice * 3; i < (indice + 1) * 3; i++) {
            if (testimonios[i]) {
                testimonios[i].classList.add('mostrar');
            }
        }
    }

    indicadores.forEach((indicador) => indicador.classList.remove('activo'));
    if (indicadores[indice]) {
        indicadores[indice].classList.add('activo');
    }

    currentGroup = indice;
}

function moverA(indice) {
    const testimonios = document.querySelectorAll('.testimonio');
    const totalTestimonios = testimonios.length;


    if (indice >= totalTestimonios) {
        indice = 0; 
    } else if (indice < 0) {
        indice = totalTestimonios - 1;
    }

    mostrarGrupo(indice);
}

function iniciarEnMovil() {
    const isMobile = window.innerWidth <= 768;
    if (isMobile) {
        const indicadores = document.querySelector('.indicadores');
        const testimonios = document.querySelectorAll('.testimonio');
        
        if (indicadores && testimonios.length > 0) {
            indicadores.innerHTML = ''; 

            for (let i = 0; i < testimonios.length; i++) {
                const indicador = document.createElement('span');
                indicador.classList.add('indicador');
                if (i === 0) indicador.classList.add('activo'); 
                indicador.addEventListener('click', () => {
                    clearInterval(autoPlayInterval); 
                    moverA(i); 
                    iniciarAutoPlay();
                });
                indicadores.appendChild(indicador);
            }
        }
    }
}

function iniciarAutoPlay() {
    const isMobile = window.innerWidth <= 768;
    if (isMobile) {
        autoPlayInterval = setInterval(() => {
            moverA(currentGroup + 1); 
        }, 5000);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    iniciarEnMovil();
    mostrarGrupo(0);
    iniciarAutoPlay(); 
});

window.addEventListener('resize', () => {
    iniciarEnMovil(); 
    mostrarGrupo(currentGroup);

    clearInterval(autoPlayInterval); 
    iniciarAutoPlay();
});
