</div><!-- conteudo -->
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <img src="<?php echo get_template_directory_uri(); ?>/images/structure/logo-pd-gray.png" class="img-responsive"
                     alt="Logo: Projeto Pensando o Direito">
            </div>
            <div class="col-sm-5 footer-menu">
                <ul class="list-inline mt-sm">
                    <li><a href="/pensandoodireito/o-que-e/">CONHEÇA O PROJETO</a>
                    </li>
                    <li><a href="/pensandoodireito/debates/">DEBATES</a>
                    </li>
                    <li><a href="/pensandoodireito/publicacoes/">PUBLICAÇÕES</a>
                    </li>
                    <li><a href="/termos-de-uso/">TERMOS DE USO</a>
                    </li>
                </ul>
                <ul class="list-inline footer-menu">
                    <li><a href="/pensandoodireito/noticias/">Notícias</a>
                    </li>
                    <li><a href="/pensandoodireito/editais/">Editais</a>
                    </li>
                    <li><a href="/pensandoodireito/parceiros/">Parceiros</a>
                    </li>
                    <li><a href="/pensandoodireito/contato/">Fale conosco</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-5">
                <ul class="list-inline mt-sm">
                    <li>
                        <a href="http://www.ipea.gov.br/"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/ipea.png" class="img-responsive" alt="Ipea">
                        </a>
                    </li>
                    <li>
                        <a href="http://www.pnud.org.br/"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/pnud.png" class="img-responsive" alt="PNUD">
                        </a>
                    </li>
                    <li>
                        <a href="http://pensandoodireito.mj.gov.br/"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/sal.png" class="img-responsive"
                                        alt="Secretaria de assuntos legislativos">
                        </a>
                    </li>
                    <li>
                        <a href="http://justica.gov.br/"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/mj.png" class="img-responsive" alt="Ministério da Justiça">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12">
                <p>Dúvidas, sugestões e contribuições mande um e-mail para <a href="mailto:<?php echo bloginfo('admin_email') ?>"><?php echo bloginfo('admin_email') ?></a></p>
            </div>
        </div>
        <div class="row text-center mt-md fontsize-xs">
            <p>Todo o conteúdo do Projeto Pensando o Direito está licenciado sob a CC-by-sa-2.5, exceto quando
                especificado em contrário e nos conteúdos replicados de outras fontes.</p>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalcadastro" tabindex="-1" role="dialog" aria-labelledby="modalcadastro">
    <div class="modal-dialog">
        <div class="modal-content modal-sm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title red font-roboto">Login</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="email">Usuário</label>
                    <input type="text" class="form-control" id="username"
                           placeholder="Seu e-mail">
                </div>
                <div class="form-group mt-md">
                    <label for="senha">Sua senha:</label>
                    <input type="password" class="form-control" id="senha"
                           placeholder="Sua senha">
                </div>
                <button type="button" class="btn btn-danger">Entrar</button>
            </div>
            <div class="modal-footer">
                <p><a href="#" class="remember_me">Esqueceu a senha?</a> | <a href="/cadastro">Cadastre-se</a></p>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

<script defer="defer" async="async" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-59042109-1', 'auto');
    ga('send', 'pageview');

</script>

</body>

</html>
