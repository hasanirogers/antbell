<?php

// includes
include_once('inc/admin/gutenberg.php');

// disable admin bar
add_filter('show_admin_bar', '__return_false');

// enqueue font end bundles
if (!is_admin()) {
  wp_enqueue_style('bundle-css', get_theme_file_uri('/bundles/frontend.css'));
  wp_enqueue_script('bundle-js', get_theme_file_uri('/bundles/frontend.js'), array(), false, true);

  wp_enqueue_style('parent-css', get_template_directory_uri() . '/style.css');
}

// enqueue admin bundles
if (is_admin()) {
  wp_enqueue_style('admin-css', get_theme_file_uri('/bundles/admin.css'));
  wp_enqueue_script('admin-js', get_theme_file_uri('/bundles/admin.js'), array('wp-blocks', 'wp-block-editor', 'wp-components', 'wp-element'), false, true);
}

// enqueue fonts
function antbell_add_fonts() {
  wp_enqueue_style( 'fjalla-one', 'https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap', false );
  wp_enqueue_style( 'fira-sans', 'https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Fjalla+One&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'antbell_add_fonts' );

// meta info
function antbell_add_meta_tags() {
  echo '<meta name="author" content="Hasani Rogers">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
  echo '<base href="/">';
  echo '<link rel="icon" href="'. get_theme_file_uri('/images/favicon.ico') .'">';
}
add_action('wp_head', 'antbell_add_meta_tags', '1');

// body class
function antbell_body_classes($classes) {
  global $post;

  $slug = $post->post_name;
  $classes[] = 'antbell';
  $classes[] = 'antbell--' . $slug;

  return $classes;
}
add_filter('body_class', 'antbell_body_classes');


// menus
register_nav_menu('footer-menu', 'Social media links that appear in the footer.');
