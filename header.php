<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link rel="apple-touch-icon" href="apple-touch-icon.png">
Place favicon.ico in the root directory -->

  <?php wp_head(); ?>

  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript">
    jQuery.noConflict();
    jQuery(document).ready(function($){
      $('img').each(function(){
        $(this).removeAttr('width')
        $(this).removeAttr('height');
      });
    });
  </script>

</head>
<body <?php body_class() ?>>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <div class="off-canvas-wrap" data-offcanvas>
    <div class="inner-wrap">

<!-- Exclude nav for login page -->
<?php if( !is_page( 'log-in' ) ) : ?>

  <nav class="navbar">
    <a href="<?php echo bloginfo( 'url' ) ?>" class="main-logo">Adamant Research</a>

      <!-- Extra menu for logged in users -->
      <?php if ( is_user_logged_in() ) : ?>

        <?php

          wp_nav_menu( array(
                              'menu' => 'members-menu',
                              'container' => false,
                              'menu-class' => 'member-nav'
                              )
                            );
        ?>
        <?php endif; ?><!-- End extra members-menu -->

    <div class="navbar-right">

      <!-- Display user meta data if logged in  -->
      <?php if( is_user_logged_in() ) : ?>
        <?php

          global $current_user;
          get_currentuserinfo(); ?>

          <div class="user-meta-data">
          <?php  echo get_avatar( $current_user->ID, 32 ); ?>
          </div>

          <?php echo '<p class="user-meta-data__name">' . $current_user->user_firstname . ' ' . $current_user->user_lastname . '</p>'; ?>

    <?php else : ?><!-- Else display login/signup links -->

      <ul class="login-links inline-list">
        <li><a href="#myModal" data-reveal-id="myModal">Sign Up</a></li>
        <li><a href="<?php echo bloginfo( 'url' ) ?>/log-in">Log in</a></li>
      </ul>
    <?php endif; ?><!-- End user meta if -->
      <!-- Menu icon button -->
      <a href="#" class="right-off-canvas-toggle menu-icon"><span></span></a>

    </div>
  </nav>

  <!-- Off canvas menu -->
  <aside class="right-off-canvas-menu">

      <?php $defaults = array(
        'container' => false,
        'theme_location' => 'primary-menu',
        'menu-class' => 'off-canvas-list'
      );

      wp_nav_menu( $defaults ); ?>

  </aside>
  <!-- End Off canvas menu -->

<?php endif; ?>
