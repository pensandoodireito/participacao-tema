/*$(document).ready(function() {
 var s = $("#menueixos-sticker");
 var pos = s.position();
 $(window).scroll(function() {
 var windowpos = $(window).scrollTop();

 if (windowpos >= pos.top) {
 s.addClass("menueixo-stick");
 } else {
 s.removeClass("menueixo-stick");
 }
 });
 });*/

function sticky_relocate($) {
    var window_top = $(window).scrollTop();
    if ($('#fixa-menu-eixo').length > 0) {
        var div_top = $('#fixa-menu-eixo').offset().top;
        if (window_top > div_top) {
            $('#menueixos-sticker').addClass('menueixo-stick');
        } else {
            $('#menueixos-sticker').removeClass('menueixo-stick');
        }
    }
}

jQuery(function ($) {
    $(window).scroll(sticky_relocate);
    sticky_relocate($);
});