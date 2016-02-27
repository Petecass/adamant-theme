<!-- Exclude footer for logged in page -->
<?php if( !is_page( 'log-in' ) ) : ?>

  <footer class="footer">
    <div class="row full-width">
      <div class="small-12 medium-7 columns text-center medium-text-left footer-menu">

          <?php
              wp_nav_menu( array(
                                  'menu' => 'footer-menu',
                                  'container' => false,
                                  'menu-class' => 'member-nav'
                                  )
                                );
          ?>

      </div>
      <div class=" small-12 medium-5 columns text-center medium-text-right">
        <p class="footer-title">
          <?php bloginfo( 'name' ); echo " " . date('Y');  ?>
        </p>
      </div>
    </div>
  </footer>
<?php endif; ?>

    <a class="exit-off-canvas"></a><!-- to toggle main content away -->
    </div><!-- end inner wrap -->
    </div><!-- end outer wrap -->

  <?php wp_footer(); ?>
  </body>
</html>
