

<?php
  class Walker_Primary_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
      $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		  $classes[] = 'menu-item-' . $item->ID;
      $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		  $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

      if ($depth == 0) {
        $isActive = $item->current || $item->current_item_parent ? 'active' : null;
        $caret = $args->walker->has_children ? 'caret' : null;

        $output .= '<li'. $class_names .'><abm-button '. $caret .' '. $isActive .' link="'. $item->url .'">'. $item->title .'</abm-button>';
      } else {
        $output .= '<li><a href="' . $item->url . '">'. $item->title;
      }
    }

    function end_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
      if ($depth == 0) {
        $output .= '</li>';
      } else {
        $output .= '</a></li>';
      }
    }
  }
