<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays the front page
 *
 * @since twentysixteen-child-theme 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <?php

    $post_type = 'post';
    //Set the custom query
    $args = array(
      'no_paging' => true,
      'post_type' => $post_type,
      'orderby' => 'title',
      'order'   => 'DESC',
      );
    $custom_loop = new WP_Query( $args );
    ?>
    <div class="portfolio-slider">
      <?php
      // Start the loop.
      while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); ?>
      <a class="slide-wrapper" href="<?php the_permalink(); ?>" style="background: url(<?php if( has_post_thumbnail() ){ the_post_thumbnail_url(); } ?>;">
        <div class="slide-caption">
          <h2 class="portfolio-title"><?php the_title(); ?></h2>
          <div class="entry-content"><?php the_content(); ?></div>
        </div>
      </a>
      <?php endwhile; ?>
    </div>
  </main><!-- .site-main -->

  <?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
