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

function sticky_relocate() {
  var window_top = $(window).scrollTop();
  var div_top = $('#fixa-menu-eixo').offset().top;
  if (window_top > div_top) {
    $('#menueixos-sticker').addClass('menueixo-stick');
  } else {
    $('#menueixos-sticker').removeClass('menueixo-stick');
  }
}

$(function() {
  $(window).scroll(sticky_relocate);
  sticky_relocate();
});