

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
// Chama o botão back to top
jQuery(function ($) {
    back_to_top($);
});

function carregar_noticias(target, max_num_pages) {
        // Define o valor padrão se target não estiver definido
        target = typeof target !== 'undefined' ? target : ".container .ordinarynews";

        // Redefine o número máximo de páginas se o parâmetro for passado
        if (typeof max_num_pages !== 'undefined') {
            participacao.paginasMaximas = max_num_pages;
        } else {
            participacao.paginasMaximas;
        }

        jQuery(target).append('<div class="col-sm-6 col-xs-12" id="loader-gif">Carregando mais notícias... <img src="' + participacao.ajaxgif + '"/></div>');

        var dataNoticias = "action=participacao_paginacao_infinita&paged="+ participacao.paginaAtual;

        if (typeof(categoriaAtual) != "undefined" ) {
            dataNoticias += "&cat="+categoriaAtual;
        }

        jQuery.ajax({
            url: participacao.ajaxurl,
            type: 'POST',
            data: dataNoticias,
            success: function(html){
                jQuery('#loader-gif').remove();
                jQuery(target).append(html);

                participacao.paginaAtual++;

                if (participacao.paginaAtual > participacao.paginasMaximas) {
                    jQuery("#mais-noticias").hide();
                }
            }
        });

    return false;
}






// (Ver a possibilidade de colocar em outro arquivo)

/*
 * bootstrap-filestyle
 * doc: http://markusslima.github.io/bootstrap-filestyle/
 * github: https://github.com/markusslima/bootstrap-filestyle
 *
 * Copyright (c) 2014 Markus Vinicius da Silva Lima
 * Version 1.1.2
 * Licensed under the MIT license.
 */
(function($) {"use strict";

    var Filestyle = function(element, options) {
        this.options = options;
        this.$elementFilestyle = [];
        this.$element = $(element);
    };

    Filestyle.prototype = {
        clear : function() {
            this.$element.val('');
            this.$elementFilestyle.find(':text').val('');
            this.$elementFilestyle.find('.badge').remove();
        },

        destroy : function() {
            this.$element.removeAttr('style').removeData('filestyle').val('');
            this.$elementFilestyle.remove();
        },

        disabled : function(value) {
            if (value === true) {
                if (!this.options.disabled) {
                    this.$element.attr('disabled', 'true');
                    this.$elementFilestyle.find('label').attr('disabled', 'true');
                    this.options.disabled = true;
                }
            } else if (value === false) {
                if (this.options.disabled) {
                    this.$element.removeAttr('disabled');
                    this.$elementFilestyle.find('label').removeAttr('disabled');
                    this.options.disabled = false;
                }
            } else {
                return this.options.disabled;
            }
        },

        buttonBefore : function(value) {
            if (value === true) {
                if (!this.options.buttonBefore) {
                    this.options.buttonBefore = true;
                    if (this.options.input) {
                        this.$elementFilestyle.remove();
                        this.constructor();
                        this.pushNameFiles();
                    }
                }
            } else if (value === false) {
                if (this.options.buttonBefore) {
                    this.options.buttonBefore = false;
                    if (this.options.input) {
                        this.$elementFilestyle.remove();
                        this.constructor();
                        this.pushNameFiles();
                    }
                }
            } else {
                return this.options.buttonBefore;
            }
        },

        icon : function(value) {
            if (value === true) {
                if (!this.options.icon) {
                    this.options.icon = true;
                    this.$elementFilestyle.find('label').prepend(this.htmlIcon());
                }
            } else if (value === false) {
                if (this.options.icon) {
                    this.options.icon = false;
                    this.$elementFilestyle.find('.fa').remove();
                }
            } else {
                return this.options.icon;
            }
        },

        input : function(value) {
            if (value === true) {
                if (!this.options.input) {
                    this.options.input = true;

                    if (this.options.buttonBefore) {
                        this.$elementFilestyle.append(this.htmlInput());
                    } else {
                        this.$elementFilestyle.prepend(this.htmlInput());
                    }

                    this.$elementFilestyle.find('.badge').remove();

                    this.pushNameFiles();

                    this.$elementFilestyle.find('.group-span-filestyle').addClass('input-group-btn');
                }
            } else if (value === false) {
                if (this.options.input) {
                    this.options.input = false;
                    this.$elementFilestyle.find(':text').remove();
                    var files = this.pushNameFiles();
                    if (files.length > 0 && this.options.badge) {
                        this.$elementFilestyle.find('label').append(' <span class="badge">' + files.length + '</span>');
                    }
                    this.$elementFilestyle.find('.group-span-filestyle').removeClass('input-group-btn');
                }
            } else {
                return this.options.input;
            }
        },

        size : function(value) {
            if (value !== undefined) {
                var btn = this.$elementFilestyle.find('label'), input = this.$elementFilestyle.find('input');

                btn.removeClass('btn-lg btn-sm');
                input.removeClass('input-lg input-sm');
                if (value != 'nr') {
                    btn.addClass('btn-' + value);
                    input.addClass('input-' + value);
                }
            } else {
                return this.options.size;
            }
        },

        buttonText : function(value) {
            if (value !== undefined) {
                this.options.buttonText = value;
                this.$elementFilestyle.find('label span').html(this.options.buttonText);
            } else {
                return this.options.buttonText;
            }
        },

        buttonName : function(value) {
            if (value !== undefined) {
                this.options.buttonName = value;
                this.$elementFilestyle.find('label').attr({
                    'class' : 'btn ' + this.options.buttonName
                });
            } else {
                return this.options.buttonName;
            }
        },

        iconName : function(value) {
            if (value !== undefined) {
                this.$elementFilestyle.find('.fa').attr({
                    'class' : '.fa ' + this.options.iconName
                });
            } else {
                return this.options.iconName;
            }
        },

        htmlIcon : function() {
            if (this.options.icon) {
                return '<span class="fa ' + this.options.iconName + '"></span> ';
            } else {
                return '';
            }
        },

        htmlInput : function() {
            if (this.options.input) {
                return '<input type="text" class="form-control ' + (this.options.size == 'nr' ? '' : 'input-' + this.options.size) + '" disabled> ';
            } else {
                return '';
            }
        },

        // puts the name of the input files
        // return files
        pushNameFiles : function() {
            var content = '', files = [];
            if (this.$element[0].files === undefined) {
                files[0] = {
                    'name' : this.$element[0] && this.$element[0].value
                };
            } else {
                files = this.$element[0].files;
            }

            for (var i = 0; i < files.length; i++) {
                content += files[i].name.split("\\").pop() + ', ';
            }

            if (content !== '') {
                this.$elementFilestyle.find(':text').val(content.replace(/\, $/g, ''));
            } else {
                this.$elementFilestyle.find(':text').val('');
            }

            return files;
        },

        constructor : function() {
            var _self = this,
                html = '',
                id = _self.$element.attr('id'),
                files = [],
                btn = '',
                $label;

            if (id === '' || !id) {
                id = 'filestyle-' + $('.bootstrap-filestyle').length;
                _self.$element.attr({
                    'id' : id
                });
            }

            btn = '<span class="group-span-filestyle ' + (_self.options.input ? 'input-group-btn' : '') + '">' +
                  '<label for="' + id + '" class="btn ' + _self.options.buttonName + ' ' +
                    (_self.options.size == 'nr' ? '' : 'btn-' + _self.options.size) + '" ' +
                    (_self.options.disabled ? 'disabled="true"' : '') + '>' +
                        _self.htmlIcon() + _self.options.buttonText +
                  '</label>' +
                  '</span>';

            html = _self.options.buttonBefore ? btn + _self.htmlInput() : _self.htmlInput() + btn;

            _self.$elementFilestyle = $('<div class="bootstrap-filestyle input-group">' + html + '</div>');
            _self.$elementFilestyle.find('.group-span-filestyle').attr('tabindex', "0").keypress(function(e) {
                if (e.keyCode === 13 || e.charCode === 32) {
                    _self.$elementFilestyle.find('label').click();
                    return false;
                }
            });

            // hidding input file and add filestyle
            _self.$element.css({
                'position' : 'absolute',
                'clip' : 'rect(0px 0px 0px 0px)' // using 0px for work in IE8
            }).attr('tabindex', "-1").after(_self.$elementFilestyle);

            if (_self.options.disabled) {
                _self.$element.attr('disabled', 'true');
            }

            // Getting input file value
            _self.$element.change(function() {
                var files = _self.pushNameFiles();

                if (_self.options.input == false && _self.options.badge) {
                    if (_self.$elementFilestyle.find('.badge').length == 0) {
                        _self.$elementFilestyle.find('label').append(' <span class="badge">' + files.length + '</span>');
                    } else if (files.length == 0) {
                        _self.$elementFilestyle.find('.badge').remove();
                    } else {
                        _self.$elementFilestyle.find('.badge').html(files.length);
                    }
                } else {
                    _self.$elementFilestyle.find('.badge').remove();
                }
            });

            // Check if browser is Firefox
            if (window.navigator.userAgent.search(/firefox/i) > -1) {
                // Simulating choose file for firefox
                _self.$elementFilestyle.find('label').click(function() {
                    _self.$element.click();
                    return false;
                });
            }
        }
    };

    var old = $.fn.filestyle;

    $.fn.filestyle = function(option, value) {
        var get = '', element = this.each(function() {
            if ($(this).attr('type') === 'file') {
                var $this = $(this), data = $this.data('filestyle'), options = $.extend({}, $.fn.filestyle.defaults, option, typeof option === 'object' && option);

                if (!data) {
                    $this.data('filestyle', ( data = new Filestyle(this, options)));
                    data.constructor();
                }

                if ( typeof option === 'string') {
                    get = data[option](value);
                }
            }
        });

        if ( typeof get !== undefined) {
            return get;
        } else {
            return element;
        }
    };

    $.fn.filestyle.defaults = {
        'buttonText' : 'Choose file',
        'iconName' : 'fa fa-folder-open',
        'buttonName' : 'btn-default',
        'size' : 'nr',
        'input' : true,
        'badge' : true,
        'icon' : true,
        'buttonBefore' : false,
        'disabled' : false
    };

    $.fn.filestyle.noConflict = function() {
        $.fn.filestyle = old;
        return this;
    };

    // Data attributes register
    $(function() {
        $('.filestyle').each(function() {
            var $this = $(this), options = {

                'input' : $this.attr('data-input') === 'false' ? false : true,
                'icon' : $this.attr('data-icon') === 'false' ? false : true,
                'buttonBefore' : $this.attr('data-buttonBefore') === 'true' ? true : false,
                'disabled' : $this.attr('data-disabled') === 'true' ? true : false,
                'size' : $this.attr('data-size'),
                'buttonText' : $this.attr('data-buttonText'),
                'buttonName' : $this.attr('data-buttonName'),
                'iconName' : $this.attr('data-iconName'),
                'badge' : $this.attr('data-badge') === 'false' ? false : true
            };

            $this.filestyle(options);
        });
    });
})(window.jQuery);

//Chama o tipo de botão
jQuery(":file").filestyle({buttonBefore: true, buttonText: "Selecionar arquivo"});




// Submenu
jQuery(document).ready(function(){
    jQuery("#menu-secundario li").hover(function(){
            jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(200);
            },function(){
            jQuery(this).find('ul:first').css({visibility: "hidden"}).hide(200);
            });
    }
);




// torna o scroll na página suave, apenas usando o a classe .smoothscroll
jQuery(function($) {

    var msgSucesso =
        $('<div />').addClass('panel-body bg-success pt-lg text-center').append(
            $('<p />').addClass('mt-md h4').append($('<strong />').html('Agora verifique seu e-mail.'))
        ).append(
            $('<h3 />').addClass('font-roboto text-success').append($('<i />').addClass('fa fa-check')).append('Cadastro realizado com sucesso!')
        ).append(
            $('<p />').append('Você receberá um e-mail de confirmação, basta clicar no link e você poderá participar de qualquer debate do projeto! Obrigado!')
        );

    var msgErro =
        $('<div />').addClass('panel-body bg-danger pt-lg text-center').append(
            $('<h3 />').addClass('font-roboto text-success').append($('<i />').addClass('fa fa-exclamation-circle')).append('Ooops!')
        ).append(
            $('<p />').addClass('mt-md h4').append($('<strong />').html('Ocorreu um erro durante o seu cadastro.'))
        ).append(
            $('<p />').append('Tente novamente em alguns instantes')
        );

    $('.smoothscroll').on('click', function(event) {
        var target = $($(this).attr('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 600);
        }
    });

    $('#form-cadastro form').validator().on('submit', function (e) {
        var _form = $(this);
        if (!e.isDefaultPrevented()) {
            e.preventDefault();
            $.post('/wp-admin/admin-ajax.php?action=signup_ajax', $(this).serialize(),function( jsonRetorno ){
                if(jsonRetorno.success){
                    _form.parent().parent().parent().parent().html(msgSucesso);
                }else{
                    _form.parent().parent().parent().parent().html(msgErro);
                }
            }, 'json').fail(function(){
                _form.parent().parent().parent().parent().html(msgErro);
            });

        }
    });

    // Habilita o tooltip
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $('#modalcadastro a.remember_me').on('click', function(){
        $('#modalcadastro #senha').parent().hide(400);
        $('#modalcadastro .modal-body button').html('Renovar senha');
    });

    $('#modalcadastro').on('hidden.bs.modal', function (e) {
        $('#modalcadastro .alert').remove();
        $('#modalcadastro #senha').parent().show();
        $('#modalcadastro .modal-body button').html('Entrar');
    });

    $('#modalcadastro').submit(function( e ){
        e.preventDefault();

        var _this = $(this);

        var usuario = _this.find('#username').val();
        var senha = _this.find('#senha').val();

        if(_this.find('.modal-body button').html()=='Renovar senha')
        {
            Login.remember();
            setTimeout(function(){
                _this.modal('toggle');
            }, 3000);
        }else{
            Login.auth(usuario, senha, function( objeto ){
                 if(objeto){
                     _this.modal('toggle');
                     $('.logged').show(300);
                     $('.unlogged').hide();
                     $('.logged .user-display-name').html(objeto.display_name);
                 }else{
                    var modalBody = _this.find('.modal-body');
                     modalBody.find('.alert').remove();
                     modalBody.prepend($('<div />').addClass('alert alert-danger').attr('role','alert').html('Usuário ou senha inválidos!'));
                 }
            });
        }
    });
});

var Login = {
    auth : function (username, password, handler){
        jQuery.post('/wp-admin/admin-ajax.php',
            {"action":"login_ajax_request","username":username,"password":password},
            function( objeto ){
                return handler(objeto);
            }, 'json');
    },
    remember : function(username){
        return jQuery.post('/wp-login.php',{'action':'lostpassword','user_login':username});
    }
};