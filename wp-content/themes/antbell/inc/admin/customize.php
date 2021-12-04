<?php
// Reference: https://developer.wordpress.org/themes/customize-api/customizer-objects/
// Goto file following file for built in wp sections: wp-includes/class-wp-customize-manager.php

function antbell_customize_register($wp_customize) {
  $wp_customize->add_setting('site-track-url', array(
    'default' => '',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'theme_site_track', array(
    'label' => __('Site Track'),
    'section' => 'title_tagline',
    'settings' => 'site-track-url'
  )));
}
add_action('customize_register', 'antbell_customize_register');
