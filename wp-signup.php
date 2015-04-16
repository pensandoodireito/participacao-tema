
<?php get_header();?>
<div id="hello">
	<div class="col-lg-12 text-center">
				<h1 class="font-roboto red">Mais de <strong>1000</strong> pessoas já estão participando!</h1>
	</div>
	<div class="container">
		<div class="row text-center">
			<div class="col-md-6 col-md-offset-4">
				<ul class="list-unstyled text-left h5">
						<li class="mt-sm text-success"><span class="fa fa-check "></span> <strong>contribua</strong> com suas ideias e opiniões</li>
						<li class="mt-sm text-success"><span class="fa fa-check"></span> fique por dentro das <strong>leis em elaboração</strong></li>
						<li class="mt-sm text-success"><span class="fa fa-check"></span> <strong>participe</strong> do processo legislativo</li>
			 </ul>
			</div>     
		</div>      
	</div>
</div>
<div id="register" class="pt-lg">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 pr-lg">
						 <dl>
								<dt><h5 class="font-roboto red"><strong>Por que devo me cadastrar?</strong></h5></dt>
								<dd class="mb-lg">Porque esta é uma plataforma que insere a sociedade no debate de projetos ou anteprojetos de lei no Brasil. Criar leis não é uma tarefa fácil e não deve estar somente na mão dos magistrados. Nosso objetivo é complementar, e em alguns casos até mesmo substituir, formas tradicionais de elaboração; você pode propor nova redação a cada artigo do texto normativo, contestar argumentos de outros participantes e agregar informações como artigos, textos e notícias. Por isso, ao se cadastrar, você será uma parte importante do processo e sua opinião pode influenciar leis sobre assuntos que interessam ao nosso País.
								</dd>
								<dt><h5 class="font-roboto red"><strong>O que são "debates"?</strong></h5></dt>
								<dd class="mb-lg">Na plataforma, os "debates" podem ser projetos ou anteprojetos de lei que estão abertos a participação social para sua consolidação. Eles não têm caráter plebiscitário, mas se destinam a coletar opiniões diversas e qualificadas sobre os temas em discussão. Depois desta fase de discussão, as contribuições serão sistematizadas com a colaboração de acadêmicos, representantes da sociedade civil, membros do segmento empresarial e demais interessados. 
								</dd>
								<dt><h5 class="font-roboto red"><strong>Quem promove esta iniciativa?</strong></h5></dt>
								<dd class="mb-lg">Esta plataforma de participação da sociedade no processo legislativo é uma iniciativa da Secretaria de Assuntos Legislativos do Ministério da Justiça.
								</dd>
								<dt><h5 class="font-roboto red"><strong>Quais os termos de uso da plataforma?</strong></h5></dt>
								<dd class="mb-lg">Nossos termos de uso são bem razoáveis. Leia-os em <a href="http://localhost/termos-de-uso/" target="_blank">termos de uso</a>.
								</dd>                                                  
						 </dl>                            
						 </dl>  
					</div>
					<div class="col-xs-6 well">
						<h4 class="font-roboto red">Comece a participar:</h4>
						<form id="loginForm" method="POST" action="/login/">
										<div class="form-group">
												<label for="username" class="control-label">Nome Completo<span class="red">*</span></label>
												<input type="text" class="form-control" id="username" name="username" value="" required="" title="Insira seu nome">
												<span class="help-block"></span>
												<label for="username" class="control-label">Nome Público<span class="red">*</span></label>
												<input type="text" class="form-control" id="username" name="username" value="" required="" title="Insira seu nome público">
												<span class="help-block">Este nome será visível para todos os usuários da Plataforma.</span>
												<label for="email" class="control-label">Email<span class="red">*</span></label>
												<input type="text" class="form-control" id="username" name="username" value="" required="" title="Insira seu email">
												<span class="help-block">Verifique se digitou corretamente, pois vamos te enviar um email de confirmação.</span>
										</div>
										<div class="form-group">
												<label for="password" class="control-label">Senha<span class="red">*</span></label>
												<input type="password" class="form-control" id="password" name="password" value="" required="" title="Insira uma senha">
												<label>
														<input type="checkbox" name="showpassword" id="showpassword"> Mostrar senha
												</label>
										</div>    
										<div class="form-group text-right">    
												<label for="termos_uso">
														<input type="checkbox" name="termos_uso" id="termos_uso"> Li e aceito os <a href="http://localhost/termos-de-uso/" target="_blank">termos de uso</a>.
												</label>                            
										</div>
										<button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-check-square-o"></i> Cadastrar</button>
						</form>
				</div>                  
			</div>
		</div>
</div>				

<?php get_footer(); ?>
