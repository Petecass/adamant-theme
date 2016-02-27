<?php
/*
  Template Name: contact
*/

 ?>

<?php get_header(); ?>
<?php get_template_part( 'content-registration' ) ?>

<h1 class="page-title">Contact us</h1>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>

      <div class="contact-header row">
        <div class="small-12 columns">
          <div class="row contact-header-content">
            <div class="small-12 columns">
              <h2 class="contact-header-title"><?php the_title() ?></h2>
              <p class="contact-header-intro"><?php the_field('intro'); ?></p>
            </div>
          </div>
        </div>
      </div>
      <section class="row">
        <div class="small-12 columns">
          <?php the_content() ?>
        </div>
      </section>

    <?php endwhile; endif; wp_reset_postdata();?>

<?php get_footer(); ?>
