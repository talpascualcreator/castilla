const btns = document.querySelectorAll(".btn");

btns.forEach((btn) => {
  btn.addEventListener("click", () => playAudio(btn));
});

function playAudio(btn) {
  const audio = document.getElementById(btn.dataset.key);
  audio.currentTime = 0;
  audio.play();
}

document.addEventListener("DOMContentLoaded", function() {
  const p = document.querySelector('.letras p');
  const cursor = document.createElement('span');
  cursor.classList.add('cursor');
  p.appendChild(cursor);
});