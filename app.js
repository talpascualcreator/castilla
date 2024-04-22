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

function openVideo() {
  document.getElementById("video-overlay").style.display = "block";
}

function closeVideo() {
  document.getElementById("video-overlay").style.display = "none";
  var video = document.getElementById("video-iframe");
  video.src = video.src; // Detener el video al cerrar la caja
}

