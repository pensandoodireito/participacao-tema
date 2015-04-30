<?php
/**
 * Template Name: Notícias 
 */
get_header(); 

global $wp_query;
$categorias = array();

$todas_categorias = get_categories(
    array('taxonomy' => 'category', 'hide_empty' => 0)
);

foreach ($todas_categorias as $category) {
    if (!preg_match('/^_apagar\w*/', $category->name)
        && $category->name != 'Sem categoria'
        && $category->name != '*RECATEGORIZAR'
    ) {
        $categorias[] = $category->name;
    }
}

$args = array('posts_per_page' => get_option('posts_per_page'));

if (array_search(
    sanitize_title($wp_query->query_vars['categoria']),
    array_map('sanitize_title', $categorias)
)
    || $wp_query->query_vars['categoria'] == 'geral'
) {
    
    if ($wp_query->query_vars['categoria'] != 'geral') {
        $args = array(
            'category_name' => $wp_query->query_vars['categoria'],
        );
    }
?>
<div class="noticias container">
    <div class="row">
        <div class="col-md-12">
        <h2 class="font-roboto red pull-left">Notícias <small>: Todas</small></h2>
        <div class="dropdown pull-right">
          <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
            Filtrar notícia por categoria <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Assuntos Legislativos</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Debates Públicos</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Editais</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Entrevistas</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Eventos</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Opinião</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Pesquisas</a></li> 
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Mais Lidas</a></li>
            <li class="divider"></li>
            <li><a href="#">Todas</a></li>            
          </ul>
        </div>
       </div> 
   </div> 
    <div class="row ordinarynews">
        <div class="col-md-12">
        <?php
            $ordinary_news = new WP_Query($args);
        ?>
        <script>
          var participacaoPaginasMaximas = <?php echo $ordinary_news->max_num_pages; ?>
        </script>
        <?php

        if ($ordinary_news->have_posts()) {
            while ($ordinary_news->have_posts()) {
                $ordinary_news->the_post();
                get_template_part('noticias', 'box');
            }
        } ?>
    </div>
    </div>
    <div class="row text-center mt-lg">
      <button id="mais-noticias" type="button" class="btn btn-danger" onclick="carregar_noticias();">Mostrar mais notícias</button>
    </div>

</div>
<?php
} else {
    echo 'Nenhuma notícia encontrada na categoria: ';
    echo $wp_query->query_vars['categoria'];
}
// ... more ...
get_footer(); 
?>

