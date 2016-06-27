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
<?php if ( is_shop() || is_pll_wc('shop') || is_product() || is_product_category() || is_pll_wc('cart') || is_account_page())  :?>
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
<?php elseif (is_home()) ://|| is_single()) : 
//else:
    ?><div id="cssmenu">                
                <ul id="menu-large">
                   <li id="sp_close" style="display:none"><a href="#" id="sp_close_button">Close</a></li>                   
                 				   
                   <li id="menu-boutique"><a>Boutique</a></li>
                   <li id="menu-blog"><a>Home</a></li>
                   <li id="menu-about"><a>About Me</a></li>
                   <li><a href="#">Contact</a></li>
                </ul>
                <div id="menu-button"></div>
                
            </div>  
<?php else: 
           $cur_lang = pll_current_language(); 
                
    if($cur_lang == 'fr') {
        $close = "fermer le menu";
        $galerie= "Galerie";
        $galerie17w= "Automne Hiver 2017";
        $boutique= "Boutique";
        $blog= "Blog";
        $concept= "Concept";
        $contact= "Contact";
    } else  {
        $close = "close menu";
        $galerie= "Look Book";
        $galerie17w= "Winter 17";
        $boutique= "Shop";
        $blog= "Blog";
        $concept= "Concept";
        $contact= "Contact";
    }
    global $polylang;
    $pageids = get_option('page_for_posts' );  
    $blog_ids = $polylang->model->get_translations('page', $pageids);  
    $blog_id = $blog_ids[pll_current_language()];
    
    $shop_id = woocommerce_get_page_id( 'shop' );
    $shop_ids = $polylang->model->get_translations('page', $shop_id);  
    $shop_id = $shop_ids[pll_current_language()];
    
                // j'affiche le contenu de la page About dans la langue courrante 
         //       print_r($blog_ids);
    
    ?>
                    
    <div id="cssmenu">                
                <ul id="menu-large">
                   <li id="sp_close" style="display:none"><a href="#" id="sp_close_button"><?php echo $close ?></a></li>                   
                   <li class="has-sub"><span class="submenu-button"></span><a href="#"><?php echo $galerie ?></a>
                      <ul>
                         <li id="menu-17w"><span class="submenu-button"></span><a><?php echo $galerie17w ?></a>                            
                         </li>
                      </ul>
                   </li>
				   
                   <li id="menu-boutique"><a href=<?php echo get_permalink( get_page($shop_id) ) ?>><?php echo $boutique ?></a></li>
                   <li id="menu-blog"><a href=<?php echo get_permalink( get_page($blog_id) );?> ><?php echo $blog ?></a></li>
                   <li id="menu-about"><a><?php echo $concept ?></a></li>
                   <li><a href="#"><?php echo $contact ?></a></li>
                </ul>
                <div id="menu-button"></div>
                
            </div>        <?php endif;  ?>

                