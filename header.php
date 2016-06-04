<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront coucou
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php /*storefront_html_tag_schema();*/ ?>>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<?php /*if (! is_front_page()) :*/ ?>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php 
        
	do_action( 'storefront_before_header' ); ?>
<?php if ( is_shop() || is_product() || is_product_category()) :?>
    	<header id="masthead" class="site-header" role="banner" <?php if ( get_header_image() != '' ) { echo 'style="background-image: url(' . esc_url( get_header_image() ) . ');"'; } ?>>
		<div class="col-full">

			<?php
			/**
			 * @hooked storefront_skip_links - 0
			 * @hooked storefront_social_icons - 10
			 * @hooked storefront_site_branding - 20
			 * @hooked storefront_secondary_navigation - 30
			 * @hooked storefront_product_search - 40
			 * @hooked storefront_primary_navigation - 50
			 * @hooked storefront_header_cart - 60
			 */
			do_action( 'storefront_header' ); ?>

		</div>
	</header><!-- #masthead -->

	<?php
	/**
	 * @hooked storefront_header_widget_region - 10
	 */
	do_action( 'storefront_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		/**
		 * @hooked woocommerce_breadcrumb - 10
		 */
		//do_action( 'storefront_content_top' ); ?>
<?php elseif (is_home() || is_single()) : ?>          
<?php else: ?>          
	
	<?php
	/**
	 * @hooked storefront_header_widget_region - 10
	 */
	 $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
	//do_action( 'storefront_before_content' ); ?>

	
            <div id="cssmenu">                
                <ul id="menu-large">
                   <li id="sp_close" style="display:none"><a href="#" id="sp_close_button">メニューを閉じる</a></li>
                   <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
                   <li class="has-sub"><span class="submenu-button"></span><a href="#">Look book</a>
                      <ul>
                         <li class=""><span class="submenu-button"></span><a href="<?php echo get_permalink(get_page_by_title( 'Galerie17W' )); ?>">Automne-Hiver 2016</a>                            
                         </li>
                      </ul>
                   </li>
				   
                   <li id="menu-boutique"><a href=<?php echo($shop_page_url) ?>>Boutique</a></li>
                   <li id="menu-boutique"><a href=<?php echo get_permalink( get_option('page_for_posts' ) );?> >Blog</a></li>
                   <li id="menu-about"><a href="#">Concept</a></li>
                   <li><a href="#">Contact</a></li>
                </ul>
                <div id="menu-button"></div>
            </div>         

	
                
<?php endif;  ?>

                