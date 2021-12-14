<?php
  function storefront_primary_navigation() {
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'storefront' ); ?>">
		<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span><?php echo esc_html( apply_filters( 'storefront_menu_toggle_text', __( 'Menu', 'storefront' ) ) ); ?></span></button>
			<?php
        wp_nav_menu(
          array(
            'theme_location'  => 'primary',
            'container_class' => 'primary-navigation',
            'walker'          => new Walker_Primary_Menu()
          )
        );

        wp_nav_menu(
          array(
            'theme_location'  => 'handheld',
            'container_class' => 'handheld-navigation',
          )
        );
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
