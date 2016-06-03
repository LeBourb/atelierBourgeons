<?php
/**
 * Template functions used for the site header.
 *
 * @package storefront
 */

if ( ! function_exists( 'storefront_header_widget_region' ) ) {
	/**
	 * Display header widget region
	 * @since  1.0.0
	 */
	function storefront_header_widget_region() {
		if ( is_active_sidebar( 'header-1' ) ) {
		?>
		<div class="header-widget-region" role="complementary">
			<div class="col-full">
				<?php dynamic_sidebar( 'header-1' ); ?>
			</div>
		</div>
		<?php
		}
	}
}

if ( ! function_exists( 'storefront_child_site_branding' ) ) {
	/**
	 * Display Site Branding
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_child_site_branding() {
		if( is_home() || is_singular('post') )
                    return;
                if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			jetpack_the_site_logo();
		} else { ?>
			<div class="site-branding">
                            
                            <div href="" class="menu-langue"><li>Fr</li><li>Jp</li><li class="langCurrent">En</li></div>
                            
                            <a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" class="menu-shop">
                                <img src="<?php echo esc_url( home_url( '/wp-content/themes/storefront-child/icons/shop.png' ) ); ?>">
                                <div class="badge"><?php echo WC()->cart->get_cart_contents_count(); ?></div>  
                                
				<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
                                
                            </a>
                            
                            
                            
			    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            
                            <div class="site-logo"><img src="<?php echo esc_url( home_url( '/wp-content/themes/storefront-child/icons/atelier_bourgeons.bmp' ) ); ?>"></div>
				
                            <div id="cssmenu">                
                                <ul id="menu-large">
                                   <li id="sp_close" style="display:none"><a href="#" id="sp_close_button">メニューを閉じる</a></li>
                                   <li><a href="#">SHIRT&TOPS</a></li>
                                   <li><a href="#">DRESSES</a></li>
                                   <li><a href="#">KNIT WEARS</a></li>
                                   <li><a href="#">JACKETS&COATS</a></li>
                                   <li><a href="#">SKIRTS</a></li>
                                   <li><a href="#">PANTS&CULOTTES</a></li>
                                   <li><a href="#">ACCESSORIES</a></li>                                  
                                </ul>
                                <div id="menu-button"></div>                            
                            </div> 
                               
			</div>
		<?php }
	}
}

if ( ! function_exists( 'storefront_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_primary_navigation() {
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'storefront' ); ?>">
		<button class="menu-toggle" aria-controls="primary-navigation" aria-expanded="false"><?php echo esc_attr( apply_filters( 'storefront_menu_toggle_text', __( 'Navigation', 'storefront' ) ) ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location'	=> 'primary',
					'container_class'	=> 'primary-navigation',
					)
			);

			wp_nav_menu(
				array(
					'theme_location'	=> 'handheld',
					'container_class'	=> 'handheld-navigation',
					)
			);
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( 'storefront_secondary_navigation' ) ) {
	/**
	 * Display Secondary Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_secondary_navigation() {
		?>
		<nav class="secondary-navigation" role="navigation" aria-label="<?php _e( 'Secondary Navigation', 'storefront' ); ?>">
			<?php
				wp_nav_menu(
					array(
						'theme_location'	=> 'secondary',
						'fallback_cb'		=> '',
					)
				);
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( 'storefront_skip_links' ) ) {
	/**
	 * Skip links
	 * @since  1.4.1
	 * @return void
	 */
	function storefront_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php _e( 'Skip to navigation', 'storefront' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'storefront' ); ?></a>
		<?php
	}
}


