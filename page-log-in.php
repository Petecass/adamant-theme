

<?php get_header(); ?>
<?php
global $userdata;
get_currentuserinfo();
?>
<div class="row full-width login" >
  <div class="medium-6 columns login-background" >

  </div>

  <div class="small-12 medium-6 columns login-form-container">
    <a href="<?php echo bloginfo( 'url' ) ?>" class="main-logo">Adamant Research</a>

    <form class="login-form" id="innercirclelogin" method="post" action="<?php echo bloginfo( 'url' ) ?>/wp-login.php">

      <h4 class="login-form-title">LOGIN</h4>

      <input type="hidden" name="redirect_to" value="wishlistmember" />

      <input  type="text" name="log" value="Username" onfocus="if (this.value == 'Username') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Username';}" placeholder="Username" />

      <input  type="password" name="pwd" value="Password" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password';}" placeholder="Password" />

      <!-- <input type="checkbox" name="rememberme" value="forever" /> Remember Me -->

      <input class="button radius button-submit" type="submit" id="button" name="wp-submit" value="LOGIN" />


      <p class="fineprint">
          <a href="<?php bloginfo('url') ?>/wp-login.php?action=lostpassword">Forgot Password?</a>
      </p>


    </form>

    <p class="login-footer">
      <?php bloginfo( 'name' ); echo " " . date('Y');  ?>
    </p>
  </div>

</div>



<?php get_footer(); ?>
