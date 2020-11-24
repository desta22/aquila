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

$(".btn-close, .screen-overlay").on('click',function (e) {
    $(".screen-overlay").removeClass("show");
    $(".contact-offcanvas").removeClass("show");
    $("body").removeClass("offcanvas-active");
}); 