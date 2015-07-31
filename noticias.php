<?php
/**
 * Template Name: Notícias
 */
get_header();

global $wp_query;
$categorias = array();

$todas_categorias = get_categories(
    array('taxonomy' => 'category', 'hide_empty' => 1)
);

foreach ($todas_categorias as $category) {
    if (!preg_match('/^_apagar\w*/', $category->name)
        && $category->name != 'Sem categoria'
        && $category->name != '*RECATEGORIZAR'
    ) {
        $categorias[$category->slug] = $category->name;
    }
}

$categoria_atual = 'Todas';
$args = $wp_query->query_vars;

if (get_query_var('category_name') != 'geral') {
    foreach ($categorias as $slug => $nome) {
        if ($slug == $wp_query->query_vars['category_name']) {
            $categoria_atual = $nome;
            $args['category_name'] = $slug; //$wp_query->query_vars['categoria'];
        }
    }
} else {
    unset($args['category_name']);
}
?>
<div class="noticias container">
    <div class="row">
        <div class="col-md-12">
        <h2 class="font-roboto red pull-left">Notícias <small>: <?php echo $categoria_atual; ?></small></h2>
        <div class="dropdown pull-right">
          <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
            Filtrar notícia por categoria <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
            <?php
            foreach ($categorias as $category) { ?>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo "/noticias/" . sanitize_title($category); ?>"><?php echo $category; ?></a></li>
            <?php } ?>
            <li class="divider"></li>
            <li><a href="/noticias">Todas</a></li>
          </ul>
        </div>
       </div>
   </div>
    <div class="row ordinarynews">
            <?php
            $ordinary_news = new WP_Query($args);

            if ( $ordinary_news->have_posts() ) {
            ?>
                <script>
                    <?php if (isset($args['category_name'])) { ?>
                        var categoriaAtual = "<?php echo $args['category_name']; ?>";
                    <?php } ?>
                </script>
                <?php

                while ($ordinary_news->have_posts()) {
                    $ordinary_news->the_post();
                    get_template_part('content', 'archive');
                }
            } else {
                echo 'Nenhuma notícia encontrada.';
            }
            ?>
    </div>
    <?php
      if (get_query_var('paged') < $ordinary_news->max_num_pages && $ordinary_news->max_num_pages > 1) {
    ?>
        <div class="row text-center mt-lg">
            <button id="mais-noticias" type="button" class="btn btn-danger" onclick="carregar_noticias('.container .ordinarynews', '<?php echo $ordinary_news->max_num_pages; ?>');">Mostrar mais notícias</button>
        </div>
    <?php
      }
    ?>
</div>
<?php
    get_footer();
?>

