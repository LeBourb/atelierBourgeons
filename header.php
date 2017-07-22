<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront coucou
 */

/*if( (pll_current_language() != 'fr' && pll_current_language() != 'ja' ) && !current_user_can('administrator') ) {
    wp_redirect( get_permalink(pll_get_post(get_the_ID() , 'fr')) );
    exit;
}*/

function has_banner() {
    if ( (!is_product() && !is_front_page() && !is_page()) 
               || is_pll_wc('cart')
               || is_pll_wc('checkout')
               || is_pll_wc('myaccount')
               || is_page("About")
               || is_page("Legal Mentions")
               || is_page("Products")
               || is_page("Help")
               || is_home()               
       ) {
        return true;
    }
    else { 
        return false;
    }
}

?>
<html <?php language_attributes(); ?> <?php /*storefront_html_tag_schema();*/ ?>>


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
    $pageids = get_option('page_for_posts' );  
    global $polylang;
    //$blog_ids = $polylang->model->get_translations('page', $pageids); 
    $blog_ids = PLL()->model->post->get_translations($pageids);  
    
    $blog_id = $blog_ids[pll_current_language()];

    $shop_id = wc_get_page_id( 'shop' );
    $shop_ids = PLL()->model->post->get_translations($shop_id);  
    $shop_id = $shop_ids[pll_current_language()];    
    
    $url_fr = get_pll_url('fr');
    $url_en = get_pll_url('en');
    $url_jp = get_pll_url('ja');
    
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
        
	//do_action( 'storefront_before_header' ); ?>
<?php  if ( !is_pll_wc('checkout')) /*is_shop() || is_pll_wc('shop') || is_product() || is_product_category() || is_pll_wc('cart') || is_account_page())*/  :
    
       ?>
    <header id="masthead" class="site-header-menu  <?php if(has_banner() || is_front_page() || is_page_template( 'galerie-17w.php' )) echo "banner overlay-mobile "; if ( is_product() ) echo "product"; if ( current_user_can('administrator') ) echo 'admin'; ?> " role="banner" >


      
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
                        <div class="site-branding <?php if(has_banner() || is_front_page() || is_page_template( 'galerie-17w.php' )) echo "invert"; ?>">
                            
                            <div id="menu-button-left"></div>  
                            <div class="site-logo" onclick="gotohome()">
                                   <!--<img src="<?php //echo esc_url( home_url( '/wp-content/themes/atelierbourgeons/icons/atelier_bourgeons.bmp' ) ); ?>"></div> -->
                                <?php require 'svg-logo.php'; ?>
                            </div>
                            <!--<div>
                                <i id="open-search-mobile" class="fa fa-search fa-lg"></i>
                            </div>-->
                            <div id="menu-button-right">                               
                               <!--<ul href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" class="menu-shop">-->
                               <a>
                                   <i class="fa fa-shopping-cart"></i>
                                   (<?php echo WC()->cart->get_cart_contents_count(); ?>)
                               </a>
                               </ul>
                            </div>  
                            <div id="cssmenu">                
                                <div class="menu-left">
                                <ul id="menu-large">
                                    
                                   <li class="menu-parent-category" id="button-eshop" ><a><?php _e('Shop','atelierbourgeons'); ?></a></li>
  
                                    
                                </ul>
                                    </div>
                                <div class="menu-right">
                                <ul href="" class="">
                                    <li><a id="button-home"  href="<?php echo get_pll_page_by_title("About"); ?>"><?php _e('About','atelierbourgeons'); ?></a></li>
                                    <li id="button-collection" ><a><?php _e('Galleries','atelierbourgeons'); ?></a></li>
                                    <li><a id="button-blog" href="<?php echo get_permalink( $blog_id);?>"><?php _e('Blog','atelierbourgeons'); ?> </a></li>
                                    <?php if (is_user_logged_in()) { 
                                        echo '<li><a id="button-account" href="'. get_pll_wc_url( 'myaccount' ,null) .'">' . __('Account','atelierbourgeons') . '</a></li>';
                                    } 
                                        else { 
                                        echo '<li><a id="button-signin">' . __('Sign In','atelierbourgeons') . '</a></li>';
                                    } ?>
                               
                                
                                <?php if( is_pll_wc('myaccount') || is_pll_wc('shop') || is_shop() || is_product() || is_product_category() ) { ?>
                                    <li><a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" class="menu-shop" >
                                <i class="fa fa-shopping-cart fa-lg">                                    
                                </i>
                                <span>(<?php echo WC()->cart->get_cart_contents_count(); ?>)</span>
                                </a>
                                </li>
                                <?php } ?>
                                                              
				<li style="cursor: unset;">
                                    
                                        <?php 
                                        $prefix = "";
                                        $url = "";
                                        if (pll_current_language() == "fr") {
                                            $prefix = "Fr";
                                            $url = $url_fr;
                                        } else if (pll_current_language() == "en") {
                                            $prefix = "En";
                                            $url = $url_en;
                                        } else if (pll_current_language() == "ja") {
                                            $prefix = "Jp";
                                            $url = $url_fr;
                                        }
                                        echo '<a>'. $prefix  .'</a>'; ?>                                    
                                </li>
                                <li><a><i id="open-search" class="fa fa-search fa-lg"></i></a></li>
                                <li id="search-box" style="display:none;">    
                                    <?php require 'woocommerce/product-searchform.php'; ?>
                                </li>   
                                </ul>
                                
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
            
                            <?php     
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
                            
                // j'affiche le contenu de la page About dans la langue courrante 
                //echo get_post($post_ids[pll_current_language()])->post_content;      
                
        ?> 
        </div>
            <div id="cart-widget" class="sub-header-menu" style="display:none">
        <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?> 
                
            </div>
            <div id="langue-widget" class="sub-header-menu" style="display:none">
   
                <?php              
                 
                if( $cur_lang != 'fr') {
                    echo '<li><a href="'. $url_fr .'">Français</a></li>';
                }
                if($cur_lang != 'en') {
                    echo '<li><a href="'. $url_en .'">English</a></li>';
                }
                if($cur_lang != 'ja') {
                    echo '<li><a href="'. $url_jp .'">日本語</a></li>';
                }
                ?>                                    
   
            </div>
        <?php 
            // Sub-Categories widget !
            // 
            function display_subcats_from_parentcat_by_ID($parent_cat_ID) {
                $args = array(
                   'hierarchical' => 1,
                   'show_option_none' => '',
                   'hide_empty' => 0,
                   'parent' => $parent_cat_ID,
                   'taxonomy' => 'product_cat'
                );
                $subcats = get_categories($args);
                
                foreach ($subcats as $sc) {
                    $link = get_term_link( $sc->slug, $sc->taxonomy );                    
                   
                    $thumbnail_id = absint( get_woocommerce_term_meta( $sc->term_id, 'thumbnail_id', true ) );
                    $image = "";
                    if ( $thumbnail_id ) {
                        $image = wp_get_attachment_image_url( $thumbnail_id , 'large' );
                    }
                    echo '<li class="sub-category-elem" thumbnail-url="'. $image . '" ><a href="'. $link .'" >' . $sc->name . '</a></li>';
                }
            }
            // FOR HIDE/SHOW
            echo '<div id="sub-menu-button-eshop" style="display:none" class="sub-header-menu">';
            echo '<div id="eshop-categories-container">';
            
            $parent_cats = array();
            $product_categories = null;
           $product_categories = get_terms( array( 'taxonomy' => 'product_cat'));
                    //'product_cat', array( 'taxonomy' => 'product_cat' ));
            //print_r($product_categories);
            foreach ( $product_categories as $woo_cat ) {
                    $woo_cat_id = $woo_cat->term_id; //category ID
                    $woo_cat_name = $woo_cat->name; //category name


                // gets an array of all parent category levels
                $product_parent_categories_all_hierachy = get_ancestors( $woo_cat_id , 'product_cat' );  

                // This cuts the array and extracts the last set in the array
                $last_parent_cat = array_slice($product_parent_categories_all_hierachy, -1, 1, true);        
                foreach($last_parent_cat as $last_parent_cat_value){
                    // $last_parent_cat_value is the id of the most top level category, can be use whichever one like                        
                    if (!in_array($last_parent_cat_value, $parent_cats)) {               
                        array_push($parent_cats, $last_parent_cat_value);
                    }
                }
            }
            foreach ( $parent_cats as $parent_cat ) {
                echo '<div class="sub-category-section">';
                $parent_term = get_term($parent_cat);
                echo '<h5>' . $parent_term->name . '</h5>';
                echo '<ul>';
                display_subcats_from_parentcat_by_ID($parent_cat);
                echo '</ul>';    
                echo '</div>';
            }
            echo '</div>';
            
            echo '<div id="eshop-categories-meta">';
            echo '<img id="eshop-categories-image" />';
            echo '</div>';
            
            echo '</div>';
            
            echo '<div id="sub-menu-collection" style="display:none" class="sub-menu-section sub-header-menu"><div class="gallery-menu-items" style="display:inline-flex; float:right;">';
            $pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'galerie-17w.php'
            ));            
            foreach($pages as $page){
                // Check if page is in the current language. 
                if( pll_get_post_language($page->ID) == pll_current_language() ) {
                    echo '<a href="' . get_page_link($page->ID) . '">';
                    echo wp_get_attachment_image( get_post_thumbnail_id ( $page->ID )  , 'thumbnail' );
                    echo '<h5>' . get_the_title( $page ) . '</h5>';
                    echo'</a>';
                }
            }
            $pages_s = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'galerie-17s.php'
            ));            
            foreach($pages_s as $page){
                // Check if page is in the current language. 
                if( pll_get_post_language($page->ID) == pll_current_language() ) {
                    echo '<a href="' . get_page_link($page->ID) . '">';
                    echo wp_get_attachment_image( get_post_thumbnail_id ( $page->ID )  , 'thumbnail' );
                    echo '<h5>' . get_the_title( $page ) . '</h5>';
                    echo'</a>';
                }
            }
            
            
            echo '</div></div>';
        ?>
            
	</header><!-- #masthead -->
       <?php  
       
       if ( has_banner() ){ ?>
            <div class="header-shop" style="background: url('<?php 
                if(is_product_category()){
                    $categories = get_the_category();
                    //print_r(get_term($wp_query->get_queried_object()->term_id,'product_cat'));
                    $thumb_id = get_woocommerce_term_meta( $wp_query->get_queried_object()->term_id, 'thumbnail_id', true );
                    //$term_img = wp_get_attachment_url(  $thumb_id );
                    $image_meta = wp_get_attachment_image_src( $thumb_id, 'large' );
                    //$image_meta = wp_get_attachment_image_src( get_post_thumbnail_id( woocommerce_get_page_id('shop') ), 'large' );
                }
                else if(is_product_tag()){
                   // $categories = get_the_category();
                    //print_r(get_term($wp_query->get_queried_object()->term_id,'product_tag'));
                    $taxonomy = get_term($wp_query->get_queried_object()->term_id,'product_tag');
                    $thumbnail_id = absint( get_woocommerce_term_meta( $taxonomy->term_id, 'thumbnail_id', true ) );

                    if ( $thumbnail_id ) {
                            $image_meta = wp_get_attachment_image_src( $thumbnail_id , 'large' );
                    }
                    //$thumb_id = get_woocommerce_term_meta( $wp_query->get_queried_object()->term_id, 'thumbnail_id', true );
                    //$term_img = wp_get_attachment_url(  $thumb_id );
                    //$image_meta = wp_get_attachment_image_src( $thumb_id, 'large' );
                    //$image_meta = wp_get_attachment_image_src( get_post_thumbnail_id( woocommerce_get_page_id('shop') ), 'large' );
                }
                else if (is_home()) {
                    $image_meta = wp_get_attachment_image_src( get_post_thumbnail_id(get_pll_page_id_by_title('Blog') ), 'large' );
                }
                else {
                    $image_meta = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
                }
                echo $image_meta[0];
                //esc_url(the_post_thumbnail_url( 'large' )) //get_site_url();
                ?>') no-repeat top center; background-size:cover;">                
                
                <h1 class="header-title <?php if(pll_current_language() == 'ja') echo "jp";  ?>"> <?php 
                
                    if (!is_product() && !is_front_page()){
                        if(is_home()) {
                            _e('Blog','atelierbourgeons');
                        }
                        else if (is_shop()) {
                            _e('Shop','atelierbourgeons');
                        }
                        else if (is_woocommerce()) {
                            
                            //_e(preg_replace('/\s+/', '', woocommerce_page_title()),'atelierbourgeons');
                            _e(woocommerce_page_title(),'atelierbourgeons');
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

	<div id="content" class="site-content " tabindex="-1">
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

                