var oldSrc = "";

//handle volume slider
window.SetVolume = function (val) {
    var player = document.getElementById("player");
    player.volume = val/100;
};

//handle click on radio channels
document.querySelectorAll(".radio-station > img").forEach(function(stationImage) {
    stationImage.addEventListener('click', function() {
        const player = document.getElementById("player");
        player.src = this.dataset.stream;
        player.play();
        document.getElementById("label").textContent = this.dataset.name;
    })
});

//handle action on html audio player
document.getElementById("player-command").onclick = function(){
    var player = document.getElementById("player");
    if(player.paused){
        player.play();
        var label = document.getElementById("label");
        label.textContent = oldSrc;
    }
    else{
        player.pause();
        var label = document.getElementById("label");
        oldSrc = label.textContent;
        label.textContent = "";
    }
};

var audioP = document.getElementById("player");
var command = document.getElementById("player-command");
var loader = document.getElementById("loader");

loader.style.visibility = "hidden";
command.style.visibility = "hidden";
audioP.volume = 0.5;

audioP.onplay = function(){
    command.className = "bi bi-pause-fill";
    loader.style.visibility = "visible";
    command.style.visibility = "visible";
    

};
audioP.onpause = function(){
    command.className = "bi bi-play-fill";
    loader.style.visibility = "hidden";
};

audioP.oncanplay = function(){
loader.className = "";
};

audioP.onloadstart = function(){
    loader.className = "spinner-border spinner-border-sm";
};
