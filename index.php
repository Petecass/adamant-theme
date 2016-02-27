<?php get_header(); ?>
<?php get_template_part( 'content-registration' ) ?>


  <?php $i = 905;
        $post_count = 1; ?>

<main id="blogContainer">

  <?php $featured_image_url = ( has_post_thumbnail() ? wp_get_attachment_url( get_post_thumbnail_id() ) : "https://unsplash.it/1600/1200" ) ?>


  <div class="blog-header small-12 columns" style="background-image: url('<?php echo $featured_image_url ?>');">
    <div class="row large-row">
      <div class="small-12 columns">
        <div class="private-blog-header-title">
          <h3 class=""><a href="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
          <p class="private-blog-header-date">&nbsp;</p>
        </div>
      </div>
    </div><!-- end row -->
  </div><!-- end blog-header -->




  <div class="blog-search-form">
    <div class="row large-row">
      <?php get_search_form( true ); ?>
    </div>
  </div>


  <section class="blog-posts-container">
    <div class="row large-row">
      <div class="small-12 medium-9 columns blog-main-content ">
        <div class="blog-main-inner" id="content">

          <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        </div>
      </div><!-- end main post container -->

      <div class="small-12 medium-3 columns blog-sidebar">
        <div class="blog-sidebar-inner">
          <?php dynamic_sidebar( 'front-left' ) ?>
          <?php get_template_part( 'content-featured' ) ?>
          <?php get_template_part( 'content-popular' ) ?>
        </div>
      </div><!-- end main post sidebar -->
    </div><!-- end row-large -->
  </section><!-- end post page section -->

</main>

<?php get_footer(); ?>
