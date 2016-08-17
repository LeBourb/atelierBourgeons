<?php
/**
 * storefront engine room
 *
 * @package storefront
 */

/**
 * Setup.
 * Enqueue styles, register widget regions, etc.
 */
 // supprimé ??? 
//require get_template_directory() . '/inc/functions/setup.php';

/**
 * Structure.
 * Template functions used throughout the theme.
 */

// supprimé ??? 
//require get_template_directory() . '/inc/structure/post.php';
//require get_template_directory() . '/inc/structure/page.php';
require_once(STYLESHEETPATH . '/inc/structure/header.php');

require_once(STYLESHEETPATH . '/inc/structure/post.php');

//require get_template_directory() . '/inc/class-storefront.php';
//require get_template_directory() . '/inc/storefront-functions.php';
//require get_template_directory() . '/inc/storefront-template-functions.php';
//require get_template_directory() . '/inc/storefront-template-hooks.php';

require_once(STYLESHEETPATH . '/inc/structure/hooks.php');

/**
 * Custom functions that act independently of the theme templates.
 */
//require get_template_directory() . '/inc/functions/extras.php';

/**
 * Customizer additions.
 */
//
/*if ( is_storefront_customizer_enabled() ) {
	
	//require get_template_directory() . '/inc/customizer/custom-header.php';
}*/
//require get_template_directory() . '/inc/customizer/class-storefront-customizer.php';
	
	//require get_template_directory() . '/inc/customizer/class-storefront-customizer-control-more.php';
	//require get_template_directory() . '/inc/customizer/class-storefront-customizer-control-radio-image.php';
	//require get_template_directory() . '/inc/customizer/class-storefront-customizer-control-arbitrary.php';
/**
 * Load Jetpack compatibility file.
 */
require_once(STYLESHEETPATH . '/inc/jetpack/class-storefront-jetpack.php');
//require get_template_directory() . '/inc/jetpack/functions.php';

/**
 * Welcome screen
 */
if ( is_admin() ) {
	//require get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php';
}

/**
 * Load WooCommerce compatibility files.
*/
//if ( is_woocommerce_activated() ) {
	//require get_template_directory() . '/inc/woocommerce/class-storefront-woocommerce.php';
	//require get_template_directory() . '/inc/woocommerce/storefront-woocommerce-template-functions.php';
	//require get_template_directory() . '/inc/woocommerce/storefront-woocommerce-template-hooks.php';
	
	require_once(STYLESHEETPATH . '/inc/woocommerce/functions.php');
	require_once(STYLESHEETPATH . '/inc/woocommerce/template-tags.php');
	//require get_template_directory() . '/inc/woocommerce/integrations.php';
        //include_once(STYLESHEETPATH . '/inc/woocommerce/includes/wc-template-hooks.php' );
//} 
/*if ( is_woocommerce_activated() ) {
  ///require get_template_directory() . '/inc/woocommerce/functions.php';
    require(STYLESHEETPATH . '/inc/woocommerce/template-tags.php');
} */