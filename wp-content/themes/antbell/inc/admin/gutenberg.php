<?php
  function antbell_gutenberg_default_colors() {
    add_theme_support(
      'editor-color-palette',
      array(
        array(
          'name' => 'Aqua',
          'slug' => 'aqua',
          'color' => '#28ccd2'
        ),
        array(
          'name' => 'Gray',
          'slug' => 'gray',
          'color' => '#3e3f4c'
        ),
        array(
          'name' => 'Dark Gray',
          'slug' => 'dark-gray',
          'color' => '#2b2d3b'
        ),
        array(
          'name' => 'Light Gray',
          'slug' => 'light-gray',
          'color' => '#7a7e85'
        )
      )
    );

    add_theme_support(
      'editor-font-sizes',
      array(
        array(
          'name' => 'Normal',
          'slug' => 'normal',
          'size' => 16
        ),
        array(
          'name' => 'Large',
          'slug' => 'large',
          'size' => 24
        )
      )
    );
  }
  add_action( 'init', 'antbell_gutenberg_default_colors' );

  function antbell_gutenberg_blocks() {
      $args = array(
        'editor_script' => 'page-background-js'
      );

      register_block_type('antbell/page-background', $args);
  }
  add_action( 'init', 'antbell_gutenberg_blocks' );
