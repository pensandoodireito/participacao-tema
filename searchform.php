<form action="<?php echo site_url( "/" ); ?>" method="get" class="navbar-form navbar-right" role="search" id="busca">
	<div class="input-group busca-pd">
		<input type="text" class="form-control" placeholder="Buscar no site"
		       name="s"
		       id="srch-term"
		       value="<?php the_search_query(); ?>">

		<div class="input-group-btn">
			<button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
			</button>
		</div>
	</div>
</form>