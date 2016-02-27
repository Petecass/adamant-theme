
<?php $i = 870; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php $featured_image_url = ( has_post_thumbnail() ? wp_get_attachment_url( get_post_thumbnail_id() ) : "https://unsplash.it/1600/1200?image=".$i ) ?>

  <?php if ( is_user_logged_in () ) : ?>

    <article class="post row adamant-post-loop">
      <div class="small-12 columns ">
        <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
        <p class="blog-post-author"><?php echo get_the_author(); ?>, <span class="blog-post-date"><?php the_time( 'j F Y' ); ?></span></p>
        <p class="blog-post-excerpt"> <?php the_excerpt(); ?></p>
      </div>
    </article><!-- end post -->

  <?php else : ?>

    <article class="post row adamant-post-loop">
      <div class="small-12 medium-5 columns">
        <div class="">
          <img src="<?php echo $featured_image_url ?>" alt="" />
        </div>
      </div>
      <div class="small-12 medium-7 columns ">
        <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
        <p class="blog-post-author"><?php echo get_the_author(); ?>, <span class="blog-post-date"><?php the_time( 'j F Y' ); ?></span></p>
        <p class="blog-post-excerpt"> <?php the_excerpt(); ?></p>
      </div>
    </article><!-- end post -->

  <?php endif; ?>

<?php $i ++; ?>
<?php endwhile; endif; wp_reset_postdata(); ?>
