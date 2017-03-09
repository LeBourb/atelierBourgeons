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
//require get_template_directory() . '/functions/setup.php';

/**
 * Structure.
 * Template functions used throughout the theme.
 */

// supprimé ??? 
//require get_template_directory() . '/structure/post.php';
//require get_template_directory() . '/structure/page.php';
require_once('structure/header.php');

require_once('structure/post.php');

require_once('class-storefront.php');
//require_once('storefront-functions.php');
//require_once('storefront-template-functions.php');
require_once('storefront-template-hooks.php');

require_once('structure/hooks.php');

/**
 * Custom functions that act independently of the theme templates.
 */
//require get_template_directory() . '/functions/extras.php';

/**
 * Customizer additions.
 */
//
/*if ( is_storefront_customizer_enabled() ) {
	
	//require get_template_directory() . '/customizer/custom-header.php';
}*/
//require get_template_directory() . '/customizer/class-storefront-customizer.php';
	
	//require get_template_directory() . '/customizer/class-storefront-customizer-control-more.php';
	//require get_template_directory() . '/customizer/class-storefront-customizer-control-radio-image.php';
	//require get_template_directory() . '/customizer/class-storefront-customizer-control-arbitrary.php';
/**
 * Load Jetpack compatibility file.
 */
require_once('jetpack/class-storefront-jetpack.php');
//require get_template_directory() . '/jetpack/functions.php';

/**
 * Welcome screen
 */
if ( is_admin() ) {
	//require get_template_directory() . '/admin/welcome-screen/welcome-screen.php';
}

/**
 * Load WooCommerce compatibility files.
*/
//if ( is_woocommerce_activated() ) {
	//require get_template_directory() . '/woocommerce/class-storefront-woocommerce.php';
	//require get_template_directory() . '/woocommerce/storefront-woocommerce-template-functions.php';
	//require get_template_directory() . '/woocommerce/storefront-woocommerce-template-hooks.php';
	
	require_once('woocommerce/functions.php');
	//require_once('woocommerce/template-tags.php');
	//require get_template_directory() . '/woocommerce/integrations.php';
        //include_once('woocommerce/includes/wc-template-hooks.php' );
//} 
/*if ( is_woocommerce_activated() ) {
  ///require get_template_directory() . '/woocommerce/functions.php';
    require('woocommerce/template-tags.php');
} */