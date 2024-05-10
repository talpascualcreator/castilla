document.getElementById('parte-c').addEventListener('click', () => {
    const audio = new Audio('sounds/sonido_l.mp3'); // Ruta al sonido de la maraca izquierda
    audio.play();
});

document.getElementById('parte-d').addEventListener('click', () => {
    const audio = new Audio('sounds/sonido_r.mp3'); // Ruta al sonido de la maraca derecha
    audio.play();
});
