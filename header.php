<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront coucou
 */
function has_banner() {
    if ( (!is_product() && !is_front_page() && !is_page()) 
               || is_pll_wc('cart')
               || is_pll_wc('checkout')
               || is_pll_wc('myaccount')
               || is_page("About")
               || is_page("Legal Mentions")
       ) {
        return true;
    }
    else { 
        return false;
    }
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php /*storefront_html_tag_schema();*/ ?>>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<LINK REL="SHORTCUT ICON" href="<?php echo get_site_url (); ?>/wp-content/themes/atelierbourgeons/ico/logo_seul.ico">
<script>
    function gotohome() {
        window.location.href="<?php echo get_home_url();?>";
    };
    
</script>
<?php wp_head(); ?>
</head>

<?php /*if (! is_front_page()) :*/
    global $polylang;
    $pageids = get_option('page_for_posts' );  
    $blog_ids = $polylang->model->get_translations('page', $pageids);  
    $blog_id = $blog_ids[pll_current_language()];

    $shop_id = woocommerce_get_page_id( 'shop' );
    $shop_ids = $polylang->model->get_translations('page', $shop_id);  
    $shop_id = $shop_ids[pll_current_language()];    
    
    $url_fr = get_pll_url('fr');
    $url_en = get_pll_url('en');
    $url_jp = get_pll_url('jp');
    
    $cur_lang = pll_current_language(); 
                    
    function get_signin () {
        wc_get_template( 'myaccount/form-login.php' );
        if (is_user_logged_in()) {
          $user_info = get_userdata(1);

          echo '<li><a>' . $user_info->user_login . '</a></li>';
          echo '<li><a href="'. wp_logout_url(get_permalink( wc_get_page_id( 'myaccount' ) )) .'">' . _e('Log Out','atelierbourgeons') . '</a></li>';
        }
        elseif (!is_user_logged_in()) {
            //echo '<li><a href="'. site_url('wp-login.php') .'">Log In</a></li>';
        }
    }
    
    
?>




<body <?php body_class(); ?>>
    <?php
    require 'menu-left.php';
    require 'menu-right.php';
    ?>
<div id="page" class="hfeed site">
	<?php 
        
	do_action( 'storefront_before_header' ); ?>
<?php  if ( !is_pll_wc('checkout')) /*is_shop() || is_pll_wc('shop') || is_product() || is_product_category() || is_pll_wc('cart') || is_account_page())*/  :
    
       ?>
    <header id="masthead" class="site-header-menu  <?php if(has_banner() || is_front_page() || is_page_template( 'galerie-17w.php' )) echo "banner "; if ( is_product() ) echo "product"; if ( current_user_can('administrator') ) echo 'admin';?> " role="banner" <?php if ( get_header_image() != '' ) { echo 'style="background-image: url(' . esc_url( get_header_image() ) . ');'; } ?>>


      
	<?php
        $cur_lang = pll_current_language(); 
                global $wp;
                //$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
                //$current_url = the_permalink();
                $url_fr = get_permalink(pll_get_post(get_the_ID() , 'fr'));//get_pll_wc_url('shop','fr');
                $url_en = get_permalink(pll_get_post(get_the_ID() , 'en')); //get_pll_wc_url(esc_attr( the_title_attribute() ) ,'en'); ////
                $url_jp = get_permalink(pll_get_post(get_the_ID() , 'jp'));//get_pll_wc_url('shop','jp');
            
                
                //$url = get_term_link( $product_categories[0]->ID, 'product_cat' );
                //echo $url;
                
                //if($cur_lang == 'fr') {
                $NEW =  __( 'News', 'atelierbourgeons' );//__( 'Order', 'atelierbourgeons' ); //__( 'menu.news', 'atelierbourgeons-menu' );//"Dernier Articles";
                /*}else {
                    $NEW = __( 'Suggest a feature', 'storefront' );
                }*/
                
              /*  if( is_home() || is_singular('post') )
                    return;*/
                if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			jetpack_the_site_logo();
		} else { ?>                        
                        <div class="site-branding">
                            
                            <div id="menu-button-left"></div>  
                            <div class="site-logo" onclick="gotohome()">
                                   <!--<img src="<?php //echo esc_url( home_url( '/wp-content/themes/atelierbourgeons/icons/atelier_bourgeons.bmp' ) ); ?>"></div> -->
                                <?php require 'svg-logo.php'; ?>
                            </div>
                           
                            <div id="menu-button-right">
                               <i class="fa fa-home"></i>
                            </div>  
                            <div id="cssmenu">                
                                <div class="menu-left">
                                <ul id="menu-large">
                                    
                                   <li id="sp_close" style="display:none"><a href="#" id="sp_close_button">メニューを閉じる</a></li>
                                   <li><a href="<?php echo get_pll_wc_url('shop', null); ?>"> <?php _e('News','atelierbourgeons'); ?> </a></li>
                              <?php     $product_categories = get_terms( 'product_cat');
                foreach ( $product_categories as $woo_cat ) {
                    $woo_cat_id = $woo_cat->term_id; //category ID
                    $woo_cat_name = $woo_cat->name; //category name
                    ?>
                    <li><a href="<?php echo get_term_link( $woo_cat_id ,'product_cat' ); ?>"> <?php echo $woo_cat_name; ?> </a></li>
                    <?php } ?>
                                    
                                </ul>
                                    </div>
                                <div class="menu-right">
                                <ul href="" class="">
                                    <li><a id="button-home"  href="<?php echo get_pll_page_by_title("About"); ?>"><?php _e('About','atelierbourgeons'); ?></a></li>
                                    <li><a id="button-galerie17w" href="<?php echo get_pll_page_by_title("Galerie17W")?>"><?php _e('17W','atelierbourgeons'); ?></a></li>
                                    <li><a id="button-blog" href="<?php echo get_permalink( $blog_id);?>"><?php _e('Blog','atelierbourgeons'); ?> </a></li>
                                    <?php if (is_user_logged_in()) { 
                                        echo '<li><a id="button-account" href="'. get_pll_wc_url( 'myaccount' ,null) .'">' . __('Account','atelierbourgeons') . '</a></li>';
                                    } 
                                        else { 
                                        echo '<li><a id="button-signin">' . __('Sign In','atelierbourgeons') . '</a></li>';
                                    } ?>
                                </ul>
                                
                                
                                <ul href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" class="menu-shop">
                                <i class="fa fa-shopping-cart fa-lg">
                                    <a>(<?php echo WC()->cart->get_cart_contents_count(); ?>)</a>  
                                </i>
                                                              
				                         
                                </ul>
                            
                            
                                <ul id="menu-langue">
                                    <li>                                        
                                        <?php 
                                        $prefix = "";
                                        $url = "";
                                        if (pll_current_language() == "fr") {
                                            $prefix = "Fr";
                                            $url = $url_fr;
                                        } else if (pll_current_language() == "en") {
                                            $prefix = "En";
                                            $url = $url_en;
                                        } else if (pll_current_language() == "jp") {
                                            $prefix = "jp";
                                            $url = $url_fr;
                                        }
                                        echo '<a href="#">'. $prefix  .'</a>'; ?>                                    
                                    </li>
                                </ul>
                                    
                                <ul class="menu-search">
                                   <span id="open-search" class="fa fa-search" href="#"></span>
                                </ul>
                                
                                </div>
                                <div id="search-box" style="display:none;">    
                                    <?php storefront_product_search(); ?>
                                </div>    
                            </div> 
		<?php } 


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
        <div id="signid" style="display:none">
            
                            <?php     global $polylang;
                //echo $get_option('woocommerce_myaccount_page_id');
                //do_action('woocommerce_account_content');
                
                  //$current_user = wp_get_current_user();
      wc_get_template( 'myaccount/form-login.php' );
                if (is_user_logged_in()) {
                  $user_info = get_userdata(1);
                  
                  echo '<li><a>' . $user_info->user_login . '</a></li>';
                  echo '<li><a href="'. wp_logout_url(get_permalink( wc_get_page_id( 'myaccount' ) )) .'">Log Out</a></li>';
                }
                elseif (!is_user_logged_in()) {
                    //echo '<li><a href="'. site_url('wp-login.php') .'">Log In</a></li>';
                }
                  
                  //print_r($current_user);
                  //if($current_user->user_nicename != "")
                    //echo '<div>' + $current_user->user_nicename + '<div/>';   
                //$post_ids = $polylang->model->get_translations('page', );                
                // j'affiche le contenu de la page About dans la langue courrante 
                //echo get_post($post_ids[pll_current_language()])->post_content;      
                
        ?> 
        </div>
            <div id="cart-widget" style="display:none">
        <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>       
            </div>
            <div id="langue-widget" style="display:none">
   
                <?php              
                 
                if( $cur_lang != 'fr') {
                    echo '<li><a href="'. $url_fr .'">Français</a></li>';
                }
                if($cur_lang != 'en') {
                    echo '<li><a href="'. $url_en .'">English</a></li>';
                }
                if($cur_lang != 'jp') {
                    echo '<li><a href="'. $url_jp .'">日本語</a></li>';
                }
                ?>                                    
   
            </div>
	</header><!-- #masthead -->
       <?php  
       
       if ( has_banner() ){ ?>
            <div class="header-shop" style="background: url(<?php echo the_post_thumbnail_url( 'full' ); //get_site_url();?>) no-repeat top center;">                
                <h1 class="header-title"> <?php 
                    if (!is_product() && !is_front_page()){
                        if(is_home()) {
                            echo "Blog";
                        }
                        else if (is_woocommerce()) {
                            echo woocommerce_page_title();
                        }else {
                            _e(get_the_title(),'atelierbourgeons');
                        }
                    }
                ?>
                </h1>
            </div>
        
        

	<?php
	/**
	 * @hooked storefront_header_widget_region - 10
	 */
	//do_action( 'storefront_before_content' ); 
        if(!is_front_page()) {
        ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
        }
      } 
		/**
		 * @hooked woocommerce_breadcrumb - 10
		 */
		//do_action( 'storefront_content_top' ); ?>
<?php elseif (is_checkout()) ://|| is_single()) : 
?>  
<div id="checkout-banner">    
</div>

      
<?php endif;  ?>

                