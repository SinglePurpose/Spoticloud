var audio = document.getElementById("audio");

var playButton = document.getElementById("play-pause");
var muteButton = document.getElementById("mute");

var seekBar = document.getElementById("seek-bar");
var volumeBar = document.getElementById("volume-bar");

var dblclick = document.getElementById("songlist");

var isScrolling = false; //für isScrolling() um range thumb glitch zu umgehen

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

//play song on double click
dblclick.addEventListener("dblclick", function () {
	seekBar.value = 0;
	audio.play();
	playButton.innerHTML = "Pause";

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

function ScrollCheck(x) {
	if (x == true) {
		isScrolling = true;
	} else {
		isScrolling = false;
	}
}
// Update the seek bar as the audio plays
audio.addEventListener("timeupdate", function () {
	if (isScrolling == false) {
		var value = (100 / audio.duration) * audio.currentTime;
		seekBar.value = value;
	}
});

// volume bar with real time volume change
function SetVolume(val) {
	audio.volume = val;
}