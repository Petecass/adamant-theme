
<?php
  // Get our Featured Content posts
  $featured_posts = pc_get_featured_posts();
  // If we have no posts, our work is done here
  if ( empty( $featured_posts ) )
      return;
  global $post;
  $i = 870; ?>

<h4 class="blog-section-header">Featured Posts</h4>
  <div class="<?php echo( !is_user_logged_in () ? 'row' : '') ?>">

    <?php foreach ( $featured_posts as $post ) : setup_postdata( $post ); ?>
      <?php if ( !is_user_logged_in () ) : ?>

        <div class="<?php echo( !is_user_logged_in () ? 'columns small-6 medium-12 featured-post__container' : '') ?>">
          <?php
            $i += 2 ;
            $featured_image_url = ( has_post_thumbnail() ? wp_get_attachment_url( get_post_thumbnail_id() ) : "https://unsplash.it/300/200?image=".$i ) ?>
            <a href="<?php the_permalink(); ?> "class="featured-post" style="background-image: url('<?php echo $featured_image_url ?>')">
            <p class="featured-post-title"><?php the_title(); ?></p>
          </a><!-- .slide -->
        </div>
      <?php else : ?>

        <p class="popular-post-title"><a style="color: inherit;"href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

      <?php endif; ?>

    <?php endforeach; ?>
<?php wp_reset_postdata(); ?>
</div>
