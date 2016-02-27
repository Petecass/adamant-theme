
<?php
// Get our Featured Content posts
$query = new WP_Query( array(
    'meta_key' => 'pc_post_views_count',
    'orderby' => 'meta_value_num',
    'posts_per_page' => 5
) );
// Let's loop through our posts ?>
<div class="popular-post">
  <h4 class="blog-section-header">Popular Posts</h4>
    <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();  ?>

          <p class="popular-post-title"><a style="color: inherit;"href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

    <?php endwhile; endif; wp_reset_postdata(); ?>
</div><!-- .slide -->
