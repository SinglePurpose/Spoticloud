var audio = document.getElementById("audio");

var playButton = document.getElementById("play-pause");
var muteButton = document.getElementById("mute");

var seekBar = document.getElementById("seek-bar");
var volumeBar = document.getElementById("volume-bar");


// play/pause button
playButton.addEventListener("click", function () {
  if (audio.paused == true) {
    audio.play();
    playButton.innerHTML = "Pause";
  } else {
    audio.pause();
    playButton.innerHTML = "Play";
  }
});

// mute button
muteButton.addEventListener("click", function () {
  if (audio.muted == false) {
    audio.muted = true;
    muteButton.innerHTML = "Unmute";
  } else {
    audio.muted = false;
    muteButton.innerHTML = "Mute";
  }
});

// seek bar
seekBar.addEventListener("change", function () {
  var time = audio.duration * (seekBar.value / 100);
  audio.currentTime = time;
});

// Update the seek bar as the audio plays
audio.addEventListener("timeupdate", function () {
  var value = (100 / audio.duration) * audio.currentTime;
  seekBar.value = value;
});

// Pause the audio when the slider handle is being dragged
seekBar.addEventListener("mousedown", function () {
  audio.pause();
});

// Play the audio when the slider handle is dropped
seekBar.addEventListener("mouseup", function () {
  audio.play();
});

// volume bar
volumeBar.addEventListener("change", function () {
  audio.volume = volumeBar.value;
});