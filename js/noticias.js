var noticiasLock = false;

function carregar_noticias_scroll() {
    noticiasLock = true;

    var loader = '<div class="col-sm-6 col-xs-12" id="loader-gif">Carregando mais notícias... <img src="' + participacao.ajaxgif + '"/></div>';
    if (jQuery('#loader-gif').length == 0) {
        jQuery("section.noticias").append(loader);
    }

    var params = getQueryParameters();
    params.action = 'noticias_carregamento_scroll';
    params.paged = participacao.paginaAtual;
    params.categoria = participacao.categoriaNoticias;

    jQuery.post(
        participacao.ajaxurl,
        params,
        function (html) {
            jQuery('#loader-gif').remove();
            jQuery("section.noticias ul").append(html);
            noticiasLock = false;
            participacao.paginaAtual++;
        });

    return false;
}

function getQueryParameters(str) {
    return (str || document.location.search).replace(/(^\?)/, '').split("&").map(function (n) {
        return n = n.split("="), this[n[0]] = n[1], this;
    }.bind({}))[0];
};

jQuery(function ($) {
    if (location.href.indexOf("noticias") != -1) {
        $(window).scroll(function () {
            if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
                if (!noticiasLock) {
                    carregar_noticias_scroll();
                }
            }
        });
    }
});
