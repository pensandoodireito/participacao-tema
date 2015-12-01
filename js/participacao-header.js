/**
 * Created by josafafilho on 11/23/15.
 *
 * este script contém apenas workaround para garantir que seja feito redirecionamento para a URL pensando.mj.gov.br
 * ele é carregado antes de qualquer script então nenhuma biblioteca estará disponível.
 */

if (location.href.indexOf("http://participacao.mj.gov.br") != -1) {
    window.location = "http://pensando.mj.gov.br" + window.location.pathname;
}