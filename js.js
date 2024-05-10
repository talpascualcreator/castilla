
//tambora

document.getElementById('parte-a').addEventListener('click', () => {
    const audio = new Audio('sounds/sonido_parche.mp3'); // Ruta al sonido del parche
    audio.play();
});

document.getElementById('parte-b').addEventListener('click', () => {
    const audio = new Audio('sounds/sonido_clave.mp3'); // Ruta al sonido de la clave
    audio.play();
});


