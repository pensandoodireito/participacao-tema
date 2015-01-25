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

// Fixa o menu na página
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


// botão que fecha o menu
$('.fecha-menu').click(function() {
    $('.indice .menu').slideToggle('slow');
    $(".fecha-menu .fa").toggleClass('fa-angle-up fa-angle-down');
});

// Botão de back to top
$(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });

    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({
            scrollTop: 0
        }, duration);
        return false;
    })
});

// Inicia os toolstips
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});
