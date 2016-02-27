<?php
/*
  Template Name: Reports
*/
?>

<?php get_header(); ?>

<section class="row">
  <div class="small-12 columns">
    <h1 class="page-title"><?php the_title(); ?></h1>
  </div>
</section>
    <?php
    $args = array(
      'post_type' => 'report',
      'cat' => '-7'
    );
    $query = new WP_Query( $args );
     ?>
    <div class="row reports-container">
      <div class="small-12 columns">
        <h4 class="blog-section-header">Newsletters</h4>
      </div>
    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();  ?>
      <?php $file = get_field('report'); ?>

        <div class="small-6 medium-4 columns report">
          <h5 class="report-title"><?php the_title(); ?></h5>
          <a class="report-link" href="<?php echo $file['url']; ?>" target="_blank" >Adamant Newsletter <?php the_time( 'F Y' ); ?> (pdf)</a>
        </div>

    <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    <hr class="section-break">

    <?php

     ?>
    <!-- <div class="row">
      <div class="small-12 columns">

      </div>
    </div> -->



    <div class="reports-container">
      <div class="row">
        <div class="small-12 columns">
          <h4 class="blog-section-header">Special Reports</h4>
        </div>
      </div>

      <div class="row" data-equalizer>

      <?php
        $i = 870;
        $args2 = array(
          'post_type' => 'report',
          'category_name' => 'special-report'
        );
        $query2 = new WP_Query($args2);
        if ( $query2->have_posts() ) : while ( $query2->have_posts() ) : $query2->the_post();  ?>

        <?php
        $i += 2 ;
        $featured_image_url = ( has_post_thumbnail() ? wp_get_attachment_url( get_post_thumbnail_id() ) : "https://unsplash.it/300/200?image=".$i );
        $file = get_field('report'); ?>

      <div class="small-6 medium-4 columns special-report" data-equalizer-watch>
        <a href="<?php echo $file['url']; ?>" target="_blank" class="special-report-image" style="background-image: url('<?php echo $featured_image_url ?>');"></a>
        <p class="special-report-title"><?php the_title(); ?></p>
      </div>

    <?php endwhile; endif; wp_reset_postdata(); ?>

</div>
</div>



<?php get_footer(); ?>
