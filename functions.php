<?php

function pc_theme_styles() {

  wp_enqueue_style( 'mains_css', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'googleFonts_css', 'https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,500italic,300|Montserrat:400,700|PT+Serif' );
}
add_action( 'wp_enqueue_scripts', 'pc_theme_styles' );

function pc_theme_js() {

  wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/vendor/modernizr.js', '', '', false );
  // wp_enqueue_script( 'foundation_js', get_template_directory_uri() . '/js/vendor/foundation.min.js', array('jquery'), '', true );
  wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/app.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'pc_theme_js' );

add_theme_support( 'html5', array( 'search-form' ) );
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'featured-content', array(
    'featured_content_filter'     => 'pc_featured_posts',
    'max_posts'  => 10,

) );


function adamant_infinite_scroll_render() {
    get_template_part( 'content-blog' );
}

function adamant_infinite_scroll_init(){
  add_theme_support( 'infinite-scroll', array(
      'type' => 'click',
      'container' => 'content',
      'render' => 'adamant_infinite_scroll_render',
      'footer' => false,
  ) );
}

add_action( 'after_setup_theme', 'adamant_infinite_scroll_init' );



// Add featured image sizes
add_image_size( 'featured-large', 640, 294, true ); // width, height, crop
add_image_size( 'featured-small', 320, 147, true );

// Add other useful image sizes for use through Add Media modal
add_image_size( 'medium-width', 480 );
add_image_size( 'medium-height', 9999, 480 );
add_image_size( 'medium-something', 480, 480 );

// Register the three useful image sizes for use in Add Media modal
add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
function wpshout_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'medium-width' => __( 'Medium Width' ),
        'medium-height' => __( 'Medium Height' ),
        'medium-something' => __( 'Medium Something' ),
    ) );
}

function pc_get_featured_posts() {
    return apply_filters( 'pc_featured_posts', array() );
}

function register_theme_menus() {

  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary-menu' )
    )
  );

}

add_action( 'init', 'register_theme_menus' );

function pc_excerpt_length( $length ) {
  return 30;
}
add_filter( 'excerpt_length', 'pc_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// count post views
function pc_set_post_views($postID) {
    $count_key = 'pc_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


function pc_get_post_views($postID){
    $count_key = 'pc_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

function pc_new_contactmethods( $contactmethods ) {
$contactmethods['twitter'] = 'Twitter';
$contactmethods['facebook'] = 'Facebook';
$contactmethods['googleplus'] = 'Google+';
$contactmethods['linkedin'] = 'LinkedIn';
$contactmethods['reddit'] = 'Reddit';
return $contactmethods;
}
add_filter('user_contactmethods','pc_new_contactmethods',10,1);

function create_widget($name, $id, $description) {

  register_sidebar(array(
    'name' => __( $name ),
    'id' => $id,
    'description' => __( $description ),
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
}

create_widget( 'Front page left', 'front-left', 'Displays on the sidebar' );
create_widget( 'Modal', 'modal', 'Displays on the homepage modal' );

add_action('after_setup_theme', 'remove_admin_bar');


// remove admin bar for subscribers
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

// exclude categories from sidebar widget

// function exclude_widget_categories($args){
//   $exclude = "9,7"; // The IDs of the excluding categories
//   $args["exclude"] = $exclude;
//   return $args;
// }
// add_filter("widget_categories_args","exclude_widget_categories");

add_filter( 'widget_categories_args', 'wpsites_exclude_widget_category', 10, 1 );
add_filter( 'widget_categories_dropdown_args', 'wpsites_exclude_widget_category', 10, 1 );
function wpsites_exclude_widget_category( $cat_args ) {
$cat_args['exclude'] = array('9','7'); //the categories removed
return $cat_args;
}


?>
