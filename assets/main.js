window.$ = window.jQuery = require('jquery');
require('bootstrap/js/src/util');
require('bootstrap/js/src/dropdown');



$("[data-trigger]").on("click", function (e) {
    e.preventDefault();
    e.stopPropagation();
    var offcanvas_id = $(this).attr('data-trigger');
    $(offcanvas_id).toggleClass("show");
    $('body').toggleClass("offcanvas-active");
    $(".screen-overlay").toggleClass("show");
});

$(".btn-close, .screen-overlay").on('click', function (e) {
    $(".screen-overlay").removeClass("show");
    $(".contact-offcanvas").removeClass("show");
    $("body").removeClass("offcanvas-active");
});

/****Clock*****/

class Clock {
    constructor() {
        this.initializeClock();
    }

    initializeClock () {
        let t = setInterval(() => this.time(), 1000);
    }

    numPad (str) {
        let cStr = str.toString();
        if (cStr.length < 2) str = 0 + cStr;
        return str;
    }

    time () {
        let currDate = new Date();
        let currSec = currDate.getSeconds();
        let currMin = currDate.getMinutes();
        let curr24Hr = currDate.getHours();
        let ampm = curr24Hr >= 12 ? 'pm' : 'am';
        let currHr = curr24Hr % 12;
        currHr = currHr ? currHr : 12;

        let stringTime = currHr + ':' + this.numPad(currMin) + ':' + this.numPad(currSec);
        const timeEmojiEl = $('#time-emoji');

        if (curr24Hr >= 5 && curr24Hr <= 17) {
            timeEmojiEl.text('🌞');
        } else {
            timeEmojiEl.text('🌜');
        }

        $('#time').text(stringTime);
        $('#ampm').text(ampm);
    }
}

new Clock();

