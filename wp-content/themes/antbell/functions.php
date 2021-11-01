<?php

// disable admin bar
add_filter('show_admin_bar', '__return_false');

// enqueue font end bundles
if (!is_admin()) {
  wp_enqueue_style('bundle-css', get_theme_file_uri('/bundles/frontend.css'));
  wp_enqueue_script('bundle-js', get_theme_file_uri('/bundles/frontend.js'), array(), false, true);
}

// enqueue admin bundles
if (is_admin()) {
  wp_enqueue_style('admin-css', get_theme_file_uri('/bundles/admin.css'));
  wp_enqueue_script('admin-js', get_theme_file_uri('/bundles/admin.js'), array('wp-blocks', 'wp-editor', 'wp-components'), false, true);
}

// enqueue fonts
// function pgs_add_fonts() {
//   wp_enqueue_style( 'open-sans-font', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap', false );
//   wp_enqueue_style( 'raleway-font', 'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false );
// }
// add_action( 'wp_enqueue_scripts', 'pgs_add_fonts' );

// meta info
function antbell_add_meta_tags() {
  echo '<meta name="author" content="Hasani Rogers">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
  echo '<base href="/">';
  echo '<link rel="icon" href="'. get_theme_file_uri('/images/favicon.ico') .'">';
}
add_action('wp_head', 'antbell_add_meta_tags', '1');
