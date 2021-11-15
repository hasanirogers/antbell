<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">
      <div class="site-copyright">
        <p>&copy; <?php echo get_bloginfo('name') . ' ' . date("Y"); ?>
      </div>

			<?php
        /**
         * Functions hooked in to storefront_footer action
         *
         * @hooked storefront_footer_widgets - 10
         * @hooked storefront_credit         - 20
         */

        // do_action( 'storefront_footer' );

        // $args = array(
        //   'menu_class'  => 'footer-menu',
        //   'theme_location' => 'footer-menu',
        //   'items_wrap' => ''
        // );

        // wp_nav_menu($args);

        $menus = get_nav_menu_locations();
        $menuID = $menus['footer-menu'];
        $menuFooter = wp_get_nav_menu_items($menuID);

        echo '<ul class="footer-menu">';
          foreach ($menuFooter as $footerItem) {
            ?>
              <li class="<?php echo $footerItem->title; ?>">
                <a href="<?php echo $footerItem->url; ?>">
                  <span><?php echo $footerItem->title; ?></span>
                </a>
              </li>
            <?php
          }
        echo '</ul>';
			?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<section class="site-audio">
  <lrndesign-audio-player
    color="#28ccd2"
    title="Get the title"
    src="http://antbell.local/wp-content/uploads/2021/10/Mega-Man-X8-Booster-Forest-Ride-Armor-Cyclops.mp3">
  </lrndesign-audio-player>
</section>

<?php wp_footer(); ?>

</body>
</html>
