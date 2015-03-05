<?php
get_header(); ?>
    <div class="container">
        <div class="row">
            <?php get_template_part('menu', 'horizontal'); ?>
        </div>
        <?php
        // Start the Loop.
        while (have_posts()) : the_post();
            // Include the page content template.
            get_template_part('content', 'search');
            comments_template();
        endwhile;
        ?>
    </div>
<?php
get_footer();