<?php get_header(); ?>

<section class="row single-post-container">
  <div class="small-12 columns">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
      <?php pc_set_post_views(get_the_ID()); ?>
      <div class="single-post-header">
      <h1 class="single-post-title"><?php the_title() ?></h1>
      <p class=blog-post-author><?php echo get_the_author(); ?>, <span class="blog-post-date"><?php the_time( 'j F Y' ); ?></span></p>
      </div>
      <?php the_content() ?>
      <p class="single-category"><?php the_category(' '); ?></p>
      <?php if (get_the_author_meta( 'user_email' ) ) :?>

        <?php if ( !is_user_logged_in () ) : ?>
          <ul class="inline-list social-media-links">
            <?php if (get_the_author_meta( 'twitter' ) ) :?>
              <li class="twitter">
                <a href="<?php echo get_the_author_meta( 'twitter' ) ?>">
                  <i class="fa fa-twitter"></i>
                  <span class="show-for-sr">Twitter link</span>
                </a>
              </li>
            <?php endif; ?>
            <?php if (get_the_author_meta( 'facebook' ) ) :?>
              <li class="facebook">
                <a href="<?php echo get_the_author_meta( 'facebook' ) ?>">
                  <i class="fa fa-facebook-official"></i>
                  <span class="show-for-sr">Facebook link</span>
                </a>
              </li>
            <?php endif; ?>
            <?php if (get_the_author_meta( 'google' ) ) :?>
              <li class="google">
                <a href="<?php echo get_the_author_meta( 'google' ) ?>">
                  <i class="fa fa-google-plus"></i>
                  <span class="show-for-sr">Googleplus link</span>
                </a>
              </li>
            <?php endif; ?>
            <?php if (get_the_author_meta( 'linkedin' ) ) :?>
              <li class="linkedin">
                <a href="<?php echo get_the_author_meta( 'linkedin' ) ?>">
                  <i class="fa fa-linkedin-square"></i>
                  <span class="show-for-sr">Linkedin link</span>
                </a>
              </li>
            <?php endif; ?>
            <?php if (get_the_author_meta( 'reddit' ) ) :?>
              <li class="reddit">
                <a href="<?php echo get_the_author_meta( 'reddit' ) ?>">
                  <i class="fa fa-reddit"></i>
                  <span class="show-for-sr">Reddit link</span>
                </a>
              </li>
            <?php endif; ?>
            <?php if (get_the_author_meta( 'user_email' ) ) :?>
              <li class="email">
                <a href="<?php echo get_the_author_meta( 'user_email' ) ?>">
                  <i class="fa fa-paper-plane"></i>
                  <span class="show-for-sr">Email address</span>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        <?php endif ?>

      <?php endif; ?>
    <?php endwhile; endif; ?>
  </div>




</section>
<div class="row full-width next-prev-post" data-equalizer>
  <div class="small-6 columns previous-post" data-equalizer-watch>
    <?php previous_post_link('%link'); ?>
  </div>
  <div class="small-6 columns next-post" data-equalizer-watch>
    <?php next_post_link('%link'); ?>
  </div>
</div>


<?php $orig_post = $post;
      global $post;
      $categories = get_the_category($post->ID);

    if ($categories) :
      $category_ids = array();
      foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args = array(
        'category__in' => $category_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page'=> 3, // Number of related posts that will be displayed.
        'ignore_sticky_posts'=>1,
        'orderby'=>'rand' // Randomize the posts
    );

    $my_query = new WP_Query( $args ); ?>
    <div class="single-related-posts">
      <h4 class="blog-section-header text-center">Related Articles</h4>
      <div class="row">

  <?php  if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>

        <div class="small-6 medium-4 columns related-post-list">
          <h3 class="related-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </div>



  <?php

endwhile; endif;
  $post = $orig_post;
  wp_reset_query(); ?>
    </div>
  </div>
  <?php endif; ?>


<?php get_template_part( 'content-registration' ) ?>

<?php if ( !is_user_logged_in () ) : ?>

  <div class="text-center cta row full-width">
    <h3 class="cta-title">Subscribe to our blog and get instant access to expert advice</h3>
    <a class="button radius" href="#">GET ACCESS NOW</a>
  </div>

<?php endif; ?>

<?php get_footer(); ?>
