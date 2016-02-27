<?php get_header(); ?>
<?php get_template_part( 'content-registration' ) ?>


<section class="row full-width homepage-header">
  <div class="small-12 columns text-center">

      <h4 class="homepage-header__blog-name page-title"><?php bloginfo('name'); ?></h4>
      <h1 class="homepage-header__tagline"><?php the_field('top_tagline'); ?></h1>

      <a href="#" data-reveal-id="myModal" class="button radius homepage-cta">GET FREE REPORT</a>

  <div class="row testimonial--featured-container" data-equalizer id="featured-testimonials">


      <?php
        $args = array(
          'post_type' => 'testimonial'
        );
        $query = new WP_Query( $args );
        $i = 1;
       ?>
       <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
         <?php if( in_category( 'featured-testimonial' )) : ?>
         <div class="testimonial--featured small-12 large-4 columns" >
           <div class="testimonial--featured-text" data-equalizer-watch>

             <h2 class="testimonial--featured-quote">&ldquo;</h2>
             <p class="testimonial--featured-paragraph"><?php the_field('testimonial');?></p>
             <p class="testimonial-name"><strong><?php the_field('name'); ?></strong></p>
           </div>
           <img class="image-round--light testimonial-image" src="<?php the_field('photo'); ?>" alt="<?php get_field('name'); ?>" />
         </div>
       <?php endif ?>
      <?php endwhile; endif; wp_reset_postdata()?>

  </div>
</section>

<div class="homepage-intro">
  <section class="row homepage-intro-inner">
    <div class="small-12 columns text-center">
      <?php the_field('intro'); ?>
    </div>
  </section>
</div>


<section class="row full-width homepage-newsletter">
  <div class="small-12 columns">
    <div class="row">
      <div class="small-12 medium-8 medium-centered columns">
        <?php the_field('newsletter_details'); ?>
      </div>
      <div class="small-12 medium-10 medium-centered columns">
        <div class="text-center">
          <h2 style="color:#fff;">Join the Adamant Newsletter and get instant access to expert advice</h2>
          <a href="#" data-reveal-id="myModal" class="button radius homepage-cta">GET ACCESS NOW</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="testimonial-carousel">
  <?php
    $args = array(
      'post_type' => 'testimonial'
    );
    $query = new WP_Query( $args );
   ?>
   <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
     <?php if( !in_category( 'featured-testimonial' )) : ?>
     <div class="testimonial" data-equalizer>
       <div class="testimonial-text text-center" data-equalizer-watch>

         <h2 class="testimonial-quote">&ldquo;</h2>
         <p class="testimonial-paragraph"><strong><?php the_field('testimonial');?></strong></p>
         <div class="row">
           <div class="small-6 columns text-right">
             <img class="image-round--light testimonial-image" src="<?php the_field('photo'); ?>" alt="<?php get_field('name'); ?>" />
           </div>

           <div class="small-6 columns text-left">
             <p class="testimonial-name"><strong><?php the_field('name'); ?></strong></p>
             <p class="testimonial-position"><?php the_field('position'); ?></p>
             <p class="testimonial-company"><?php the_field('company'); ?></p>
           </div>

         </div>

       </div>

     </div>
   <?php endif ?>
  <?php endwhile; endif; wp_reset_postdata()?>

</section>

<div class="gradient-wrapper">

  <section class="row homepage-bio">
    <div class="small-12 medium-6 columns homepage-bio-image">
      <img class="image-round"src="<?php the_field('bio_image'); ?>" />
    </div>
    <div class="small-12 medium-6 columns homepage-bio-text">
      <?php the_field('bio'); ?>
    </div>
  </section>

  <div class="row">
    <div class="columns small-12">
      <hr class="section-break--home">
    </div>
  </div>


  <section class="row homepage-final-cta">
    <div class="small-12 medium-8 medium-centered columns text-center">

        <?php the_field('final_cta'); ?>
        <a href="#" data-reveal-id="myModal" class="button radius homepage-cta">YES, I WANT EXPERT ADVICE</a>

    </div>
  </section>

</div><!-- end gradient-wrapper -->
<?php get_footer(); ?>
