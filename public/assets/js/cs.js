let submitted = [];
let questions = [];
$(document).ready(function () {
    $(".sn-counterRecord").each(function (index, element) {
        questions.push($(this).attr("counter"));
    });
});
$(".playbox").click(function (e) {
    e.preventDefault();
    $(this).remove();
});
// window.onbeforeunload = function () {
//     return "Are you sure want to leave, changes will be undone !!";
// };
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
                playedAlready.push(refd);
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
        let qnid = $(this).val();
        let nxValue = $(this).attr("nxValue");
        if (qnid) {
            finishClickCt();
            $(
                '.sn-circle-btn[nxCounter="' + (parseInt(nxValue) - 1) + '"]'
            ).trigger("click");
        }
        pauseAll();
    });
    $(".sn-radio-input").change(function() {
        let currentName = $(this).attr('name');
        let qnid = $(this).attr('question-id');
        let radioBtnValue = $(this).val();

        // Uncheck all radio buttons with the same name
        $('.sn-radio-input[name="' + currentName + '"]').prop('checked', false);

        // Check the clicked radio button
        $(this).prop('checked', true);

        if (qnid) {
            replaceValue(qnid, radioBtnValue);
            finishClickCt();
        }

        pauseAll();
    });


    $(".sn-btn-submit").click(function (e) {
        e.preventDefault();
        let qnid = $(this).val();
        let nxValue = $(this).attr("nxValue");
        if (qnid) {
            let radiobtn = $(
                '.sn-radio-input[question-id="' + qnid + '"]:checked'
            );
            if (radiobtn) {
                replaceValue(qnid, radiobtn.val());
                setActiveCircle(qnid);
                finishClickCt();
            }
            $(
                '.sn-circle-btn[nxCounter="' + (parseInt(nxValue) + 1) + '"]'
            ).trigger("click");
        }

        pauseAll();
    });

    $("#submitReasult").click(function (e) {
        e.preventDefault();
        let sId = $("#sId").val();
        console.log(sId);
        console.log(questions);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "post",
            url: "/exam/reasult-check",
            data: {
                submitted: submitted,
                sid: sId,
                questions: questions,
            },
            success: function (response) {
                if (response.status) {
                    clearInterval(interval);
                    if ($("#qn_container")) {
                        $("#qn_container").empty();
                        $(".modal-backdrop").remove();
                        $("#reasultDisplay").show();
                        let total_qn = $("#qn_count_total").val();
                        let output =
                            '<div class="row"> <div class="col-md-6 mx-auto mt-4"> <ul class="list-group"><li class="list-group-item active bg-success">Total Obtained Mark: ' +
                            (
                                (response.obtainedMark)
                            ).toFixed(2) +
                            '%</li>  <li class="list-group-item">Line Academy Institute</li><li class="list-group-item">Contact:9865052095</li></ul> <a href="/exam/sets/' +
                            sId +
                            "/review/" +
                            response.reasult.id +
                            '" class="btn btn-sm btn-primary">Thank you</a> </div> </div>';
                        $("#reasultDisplay").empty();
                        $("#reasultDisplay").append(output);
                    } else {
                        $("body").empty();
                    }
                }
                // if (response.status) {
                //     clearInterval(interval);
                //     if ($("#qn_container")) {
                //         $("#qn_container").empty();
                //         $(".modal-backdrop").remove();
                //         $("#reasultDisplay").show();
                //         let total_qn = $("#qn_count_total").val();
                //         let output =
                //             '<div class="row"> <div class="col-md-6 mx-auto mt-4"> <ul class="list-group"> <li class="list-group-item active bg-danger">Reasult: ' +
                //             response.attempt_qn +
                //             "/" +
                //             total_qn +
                //             '</li>  <li class="list-group-item">Total Questions: ' +
                //             total_qn +
                //             '</li>  <li class="list-group-item">Total Attempt: ' +
                //             response.attempt_qn +
                //             '</li>  <li class="list-group-item">Not Attempt: ' +
                //             (total_qn - response.attempt_qn) +
                //             '</li>  <li class="list-group-item">Incorrect Answer: ' +
                //             (response.attempt_qn - response.correct_answer) +
                //             '</li>  <li class="list-group-item active">Correct Answer: ' +
                //             response.correct_answer +
                //             '</li>  <li class="list-group-item active bg-success">Percentage: ' +
                //             (
                //                 (response.correct_answer / total_qn) *
                //                 100
                //             ).toFixed(2) +
                //             '</li> </ul> <a href="/exam/sets/' +
                //             sId +
                //             "/review/" +
                //             response.reasult.id +
                //             '" class="btn btn-sm btn-primary">Review Answers</a> </div> </div>';
                //         $("#reasultDisplay").empty();
                //         $("#reasultDisplay").append(output);
                //     } else {
                //         $("body").empty();
                //     }
                // }
            },
        });
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
function finishClickCt() {
    attemptedQnUpdate(submitted.length);
}

// control function
function setActiveCircle(id) {
    let elem = $('.sn-circle-btn[counter="' + id + '"]');
    elem.addClass("active");
}
function removeActiveCircle(id) {
    let elem = $('.sn-circle-btn[counter="' + id + '"]');
    elem.removeClass("active");
}
function attemptedQnUpdate(value) {
    $("#attempted_qn").empty();
    $("#attempted_qn").append(value);
}
function checkExistOrNot(id) {
    if (submitted.length > 0) {
        let hasId = false;
        submitted.forEach((element) => {
            if (!hasId) {
                if (element.id == id) {
                    hasId = element;
                } else {
                    hasId = false;
                }
            }
        });
        return hasId;
    } else return false;
}
function removeElement(id) {
    let checkExist = checkExistOrNot(id);
    if (checkExist) {
        let demSubmitted = [];
        submitted.forEach((element) => {
            if (element.id != id) {
                demSubmitted.push(element);
            }
        });
        submitted = demSubmitted;
        return true;
    } else {
        return false;
    }
}
function replaceValue(id, value) {
    let checkExist = checkExistOrNot(id);
    if (checkExist) {
        let demSubmitted = [];
        let workdone = false;
        submitted.forEach((element) => {
            if (element.id == id) {
                if (workdone == false) {
                    demSubmitted.push({ id: id, value: value });
                    workdone = true;
                }
            } else {
                demSubmitted.push(element);
            }
        });
        submitted = demSubmitted;
    } else {
        submitted.push({ id: id, value: value });
    }
    return true;
}

let timer2 = parseInt($("#intervalD").val());
// let timer2 = 1;
let timer2Md = timer2 + ":01";
let interval = setInterval(function () {
    let timer = timer2Md.split(":");
    //by parsing integer, I avoid all extra string processing
    let minutes = parseInt(timer[0], 10);
    let seconds = parseInt(timer[1], 10);
    --seconds;
    minutes = seconds < 0 ? --minutes : minutes;
    $('audio[controls=""]').remove();
    if (minutes < 0) {
        clearInterval(interval);
        $("#submitReasult").trigger("click");
    }
    showPlaying();
    seconds = seconds < 0 ? 59 : seconds;
    seconds = seconds < 10 ? "0" + seconds : seconds;
    //minutes = (minutes < 10) ?  minutes : minutes;
    $(".sn-datecounter").html(minutes + ":" + seconds);
    timer2Md = minutes + ":" + seconds;
}, 1000);
$(document).ready(function() {
    let currentIndex = 0;
    const totalGroups = $('.sn-questionsGroup-set').length;

    function updateButtons() {
        $('#snPrev').prop('disabled', currentIndex === 0);
        $('#snNext').toggle(currentIndex < totalGroups - 1);
        $('#submitReasult').toggle(currentIndex === totalGroups - 1);
    }

    $('.sn-questionsGroup-set').hide(); // Hide all groups initially
    $('.sn-questionsGroup-set').eq(currentIndex).show(); // Show the first group

    function scrollToTop() {
        $('html, body').animate({ scrollTop: 0 }, 500); // Scroll to top smoothly
    }

    $('#snNext').on('click', function() {
        if (currentIndex < totalGroups - 1) {
            $('.sn-questionsGroup-set').eq(currentIndex).hide(); // Hide current group
            currentIndex++; // Move to the next group
            $('.sn-questionsGroup-set').eq(currentIndex).show(); // Show the next group
            updateButtons(); // Update button visibility
            scrollToTop(); // Scroll to top
        }
    });

    $('#snPrev').on('click', function() {
        if (currentIndex > 0) {
            $('.sn-questionsGroup-set').eq(currentIndex).hide(); // Hide current group
            currentIndex--; // Move to the previous group
            $('.sn-questionsGroup-set').eq(currentIndex).show(); // Show the previous group
            updateButtons(); // Update button visibility
            scrollToTop(); // Scroll to top
        }
    });

    updateButtons(); // Initial button state

    $('.sn-ac-btn').click(function(){
        $('.sn-term-codition').hide();
    })
});
