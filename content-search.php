<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <!--<?php the_post_thumbnail(); ?>-->
  <div class="divider-bottom">
    <header class="entry-header">
      <?php the_title( sprintf( '<h5 class="entry-title red"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
    </header>
    <!-- .entry-header -->
    
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div>
    <!-- .entry-summary -->
    
    <?php if ( 'post' == get_post_type() ) : ?>
    <footer class="entry-footer">
      <?php edit_post_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
    </footer>
    <!-- .entry-footer -->
    
    <?php else : ?>
    <?php edit_post_link( __( 'Edit' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
    <?php endif; ?>
  </div>
</article>
<!-- #post-## -->
