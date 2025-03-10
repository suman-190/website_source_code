$(".playbox").click(function (e) {
    e.preventDefault();
    $(this).remove();
});

// let isPlayed = false;
let playedAlready = [];
$(document).ready(function () {
    $(".sn-player").click(function (e) {
        e.preventDefault();
        if (checkAnyPlaying()) {
            return 0;
        }
        let refd = $(this).attr("refh");
        window.player = document.getElementById(refd);
        player.loop = false;
        if (!playedAlready.includes(refd)) {
            if (player.paused == true) {
                pauseAll();
                player.play();
                $(this).addClass("played");
                return 0;
            }
        }
    });
    function checkAnyPlaying() {
        let is_playing = false;
        $("audio").each(function (index, element) {
            if (!element.paused) {
                is_playing = true;
            }
        });
        return is_playing;
    }
    function pauseAll() {
        $("audio").each(function (index, element) {
            // element == this
            if (element.play) {
                element.pause();
            }
        });
    }
    $(".sn-btn-cancel").click(function (e) {
        e.preventDefault();
        pauseAll();
    });

    $(".sn-btn-submit").click(function (e) {
        e.preventDefault();
        let nxValue = $(this).attr("nxValue");
        $(
            '.sn-circle-btn[nxCounter="' + (parseInt(nxValue) + 1) + '"]'
        ).trigger("click");
        pauseAll();
    });
});

function showPlaying() {
    $("audio").each(function (index, element) {
        if (!element.paused) {
            let refId = $(element).attr("id");
            $('.sn-player[refh="' + refId + '"]').addClass("playing");
        } else {
            let refId = $(element).attr("id");
            $('.sn-player[refh="' + refId + '"]').removeClass("playing");
        }
    });
}
let timer2 = 50;
// let timer2 = 1;
let timer2Md = timer2 + ":01";
let interval = setInterval(function () {
    let timer = timer2Md.split(":");
    //by parsing integer, I avoid all extra string processing
    let minutes = parseInt(timer[0], 10);
    let seconds = parseInt(timer[1], 10);
    --seconds;
    minutes = seconds < 0 ? --minutes : minutes;
    showPlaying();
    seconds = seconds < 0 ? 59 : seconds;
    seconds = seconds < 10 ? "0" + seconds : seconds;
    //minutes = (minutes < 10) ?  minutes : minutes;
    // $(".sn-datecounter").html(minutes + ":" + seconds);
    timer2Md = minutes + ":" + seconds;
}, 1000);
