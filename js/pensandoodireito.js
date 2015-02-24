

function sticky_relocate() {
    var window_top = jQuery(window).scrollTop();
    if (jQuery('#fixa-menu-eixo').length > 0) {
        var div_top = jQuery('#fixa-menu-eixo').offset().top;
        if (window_top > div_top) {
            jQuery('#menueixos-sticker').addClass('menueixo-stick');
        } else {
            jQuery('#menueixos-sticker').removeClass('menueixo-stick');
        }
    }
}

function back_to_top($) {
    var offset = 220;
    var duration = 500;
    $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
            $('.back-to-top').fadeIn(duration);
        } else {
            $('.back-to-top').fadeOut(duration);
        }
    });

    $('.back-to-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, duration);
        return false;
    })
}

function carregar_noticias(pageNumber) {
    jQuery(".container .ordinarynews").append('<div class="col-sm-6 col-xs-12" id="loader-gif">Carregando mais notícias... <img src="' + pensandoodireito.ajaxgif + '"/></div>');
    jQuery.ajax({
        url: pensandoodireito.ajaxurl,
        type: 'POST',
        data: "action=pensandoodireito_paginacao_infinita&paged="+ pageNumber,
        success: function(html){
            jQuery('#loader-gif').remove();
            jQuery(".container .ordinarynews").append(html);
        }
    });
    return false;
}

jQuery(function ($) {
    $(window).scroll(sticky_relocate);
    sticky_relocate();

    // botão que fecha o menu
    $('.fecha-menu').click(function() {
        $('.indice .menu').slideToggle('slow');
        $(".fecha-menu .fa").toggleClass('fa-angle-up fa-angle-down');
    });

    back_to_top($);

    if (pensandoodireito.isHome == "true") {
        $(window).scroll(function(){
            if  ($(window).scrollTop() == $(document).height() - $(window).height()){

                if (pensandoodireito.paginaAtual > pensandoPaginasMaximas){
                    return false;
                } else {
                    carregar_noticias(pensandoodireito.paginaAtual);
                }

                pensandoodireito.paginaAtual++;
            }
        });
    };
});

