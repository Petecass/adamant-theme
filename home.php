<?php get_header(); ?>
<?php get_template_part( 'content-registration' ) ?>

  <?php $i = 905;
        $post_count = 1; ?>

<main id="blogContainer" class="<?php echo( is_user_logged_in () ? 'blog-private' : 'blog-public') ?>">



<?php $first_post = new WP_Query("showposts=1"); ?>
<?php if ( $first_post->have_posts() ) : while ( $first_post->have_posts() ) : $first_post->the_post(); ?>
  <?php $featured_image_url = ( has_post_thumbnail() ? wp_get_attachment_url( get_post_thumbnail_id() ) : "https://unsplash.it/1600/1200" ) ?>


    <?php if ( is_user_logged_in () ) : ?>

    <div class="row large-row">
      <div class="blog-header small-12 columns" style="background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url('<?php echo $featured_image_url ?>');">

        <div class="row large-row">
          <div class="small-12 columns">
            <p class="private-blog-header-subtitle">Latest Report</p>
            <div class="private-blog-header-title">
              <h3 class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p class="private-blog-header-date"><?php the_time( 'j F' ); ?></p>
            </div>
          </div>
        </div><!-- end row -->
      </div><!-- end blog-header -->
    </div>

    <?php else : ?>

    <div class="blog-header small-12 columns" style="background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url('<?php echo $featured_image_url ?>');">
      <div class="row large-row">
        <div class="small-12 columns">
          <h1 class="blog-header-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <p class="blog-header-excerpt"><?php echo get_the_excerpt(); ?></p>
          <a class="button radius" href="#" data-reveal-id="myModal">SUBSCRIBE</a>
        </div>
      </div><!-- end row -->
    </div><!-- end blog-header -->

  <?php endif; ?>

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php if ( !is_user_logged_in () ) : ?>
<div class="blog-search-form">
  <div class="row large-row">
    <?php get_search_form( true ); ?>
  </div>
</div>
<?php endif; ?>

<section class="blog-posts-container">
  <div class="row large-row">
    <div class="small-12 medium-9 columns blog-main-content ">
      <div class="blog-main-inner" id="content">

        <?php get_template_part('content-blog'); ?>
      </div>
    </div><!-- end main post container -->

    <div class="small-12 medium-3 columns blog-sidebar">

      <div class="blog-sidebar-inner">

        <?php if ( is_user_logged_in () ) : ?>
          <?php dynamic_sidebar( 'front-left' ) ?>
        <?php endif; ?>

        <?php get_template_part( 'content-featured' ) ?>

        <?php if ( !is_user_logged_in () ) : ?>
          <?php get_template_part( 'content-popular' ) ?>
        <?php endif; ?>


      </div>
    </div><!-- end main post sidebar -->
  </div><!-- end row-large -->
</section><!-- end post page section -->

</main>
<?php get_footer(); ?>
