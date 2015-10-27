</div><!-- conteudo -->
<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
				<img src="<?php echo get_template_directory_uri(); ?>/images/structure/logo-pd-gray.png"
				     class="img-responsive"
				     alt="Logo: Projeto Pensando o Direito">
			</div>
			<div class="col-sm-5">
				<ul class="list-inline mt-sm footer-menu">
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
				<ul class="list-inline social-icons red">
					<li class="social-icons-rounded">
						<a href="https://www.facebook.com/projetopd" target="_blank" class="btn btn-rounded"
						   data-toggle="tooltip" data-placement="top" title="Siga-nos no Facebook"><i
								class="fa fa-facebook"></i></a>
					</li>
					<li class="social-icons-rounded">
						<a href="https://twitter.com/projetopd" target="_blank" class="btn btn-rounded"
						   data-toggle="tooltip" data-placement="top" title="Siga-nos no Twitter"><i
								class="fa fa-twitter"></i></a>
					</li>
					<li class="social-icons-rounded">
						<a href="https://www.youtube.com/user/pensandoodireito" target="_blank" class="btn btn-rounded"
						   data-toggle="tooltip" data-placement="top" title="Siga-nos no YouTube"><i
								class="fa fa-youtube"></i></a>
					</li>
					<li class="social-icons-rounded">
						<a href="https://github.com/pensandoodireito" target="_blank" class="btn btn-rounded"
						   data-toggle="tooltip" data-placement="top" title="Siga-nos no GitHub"><i
								class="fa fa-github"></i></a>
					</li>
				</ul>
			</div>
			<div class="col-sm-5">
				<ul class="list-inline mt-sm">
					<li>
						<a href="http://www.ipea.gov.br/"><img
								src="<?php echo get_template_directory_uri(); ?>/images/logos/ipea.png"
								class="img-responsive" alt="Ipea">
						</a>
					</li>
					<li>
						<a href="http://www.pnud.org.br/"><img
								src="<?php echo get_template_directory_uri(); ?>/images/logos/pnud.png"
								class="img-responsive" alt="PNUD">
						</a>
					</li>
					<li>
						<a href="http://pensandoodireito.mj.gov.br/"><img
								src="<?php echo get_template_directory_uri(); ?>/images/logos/sal.png"
								class="img-responsive"
								alt="Secretaria de assuntos legislativos">
						</a>
					</li>
					<li>
						<a href="http://justica.gov.br/"><img
								src="<?php echo get_template_directory_uri(); ?>/images/logos/mj.png"
								class="img-responsive" alt="Ministério da Justiça">
						</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-12 mt-lg">
				<p>Dúvidas, sugestões e contribuições mande um e-mail para <a
						href="mailto:<?php echo bloginfo( 'admin_email' ) ?>"><?php echo bloginfo( 'admin_email' ) ?></a>
				</p>
			</div>
		</div>
		<div class="row text-center mt-md fontsize-xs">
			<p>Todo o conteúdo do Projeto Pensando o Direito está licenciado sob a CC-by-sa-2.5, exceto quando
				especificado em contrário e nos conteúdos replicados de outras fontes.</p>
		</div>
	</div>
</div>
<?php echo do_shortcode( "[pd_registration_form]" ); ?>
<?php wp_footer(); ?>

<script defer="defer" async="async" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>

<script>
	(function (i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function () {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-59042109-1', 'auto');
	ga('send', 'pageview');

</script>

</body>

</html>
