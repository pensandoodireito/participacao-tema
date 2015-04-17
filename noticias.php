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
      <div class="mt-lg well well-sm">
        <div class="row ordinarynews">
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
        <br/>
        <div class="row text-center">
          <button id="mais-noticias" type="button" class="btn btn-danger" onclick="carregar_noticias();">Mostrar mais notícias</button>
        </div>
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
