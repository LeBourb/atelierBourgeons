<?php
/*    
    function custom_query_vars_filter($vars) {
        $vars[] .= 'langue';
        return $vars;
      }
    add_filter( 'query_vars', 'custom_query_vars_filter' );
    
function add_rewrite_rules($aRules) {
$aNewRules = array('/fr' => '');
$aRules = $aNewRules + $aRules;
return $aRules;
}
 
// hook add_rewrite_rules function into rewrite_rules_array
add_filter('rewrite_rules_array', 'add_rewrite_rules');

function add_query_args()
{ 
    add_query_arg( 'langue', 'fr' );
}
add_action('init','add_query_args');
 * 
 * is_pll_cart

*/
function is_pll_wc( $wc_page)
{ 
   global $polylang;
    $cart_ids = $polylang->model->get_translations('page', wc_get_page_id( $wc_page));
    // j'affiche le contenu de la page About dans la langue courrante        
    return is_page( $cart_ids[pll_current_language()] ) || defined( 'WOOCOMMERCE_CART' ) ;
}

function get_pll_wc_url( $wc_page)
{ 
   global $polylang;
    $cart_ids = $polylang->model->get_translations('page', wc_get_page_id( $wc_page));
    // j'affiche le contenu de la page About dans la langue courrante        
    return get_permalink( $cart_ids[pll_current_language()] );
   
}


function get_pll_url($lang)
{ 
    //print_r("url: "+$url);
    global $polylang;
    $cart_ids = $polylang->model->get_translations('page', get_the_ID());                
                // j'affiche le contenu de la page About dans la langue courrante     
     //           print_r($cart_ids);
    //print_r($cart_ids);
    if($cart_ids[$lang] == "")  {
        return "";
    }
    return get_permalink( $cart_ids[$lang] );
}

    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );    

    
    function theme_enqueue_styles() {
                
        require (STYLESHEETPATH  . '/inc/init.php');    
        
         if(is_front_page()) {                     
          
            wp_register_script( 'child-jquery', get_stylesheet_directory_uri() . '/js/jquery-1.7.1.js'); 
            wp_enqueue_script('child-jquery');
            wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );  
            wp_register_style( 'menu-stylecss', get_stylesheet_directory_uri() . '/css/menu.css' );
            wp_register_script( 'menu-stylejs', get_stylesheet_directory_uri() . '/js/menu.js' );
            wp_register_style( 'child-sidemenucss', get_stylesheet_directory_uri() . '/css/jquery.sidr.light.css');
            wp_register_script( 'child-sidemenu', get_stylesheet_directory_uri() . '/js/jquery.sidr.min.js');  
            wp_enqueue_script('child-sidemenu');
            wp_enqueue_style('child-sidemenucss');
            wp_enqueue_script('menu-stylejs');
            wp_enqueue_style('menu-stylecss');
            wp_register_style('style-homepage', get_stylesheet_directory_uri() . '/css/homepage.css' );
            wp_enqueue_style('style-homepage');
            wp_register_script('script-homepage', get_stylesheet_directory_uri() . '/js/homepage.js' );
            wp_enqueue_script('script-homepage');
            
            
            
            wp_register_style( 'lightboxcss', get_stylesheet_directory_uri() . '/css/lightbox.css' );
            wp_register_script( 'lightboxjs', get_stylesheet_directory_uri() . '/js/lightbox.js'); 
            wp_enqueue_script('lightboxjs');
            wp_enqueue_style('lightboxcss');
            
            wp_enqueue_style( 'child-galeriecss', get_stylesheet_directory_uri() . '/css/galerie.css');
            wp_register_script('script-galerie', get_stylesheet_directory_uri() . '/js/galerie.js' );
            wp_enqueue_script('script-galerie');
            
            
        } else if ( is_pll_wc('shop') || is_shop() || is_product() || is_product_category() || is_pll_wc('cart')){
            wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
            
            wp_enqueue_style( 'shop-style', get_stylesheet_directory_uri() . '/css/shop.css' );
            
            wp_register_script( 'child-jquery', get_stylesheet_directory_uri() . '/js/jquery-1.7.1.js'); 
            wp_enqueue_script('child-jquery');
            
            wp_register_script('shop-rollover', get_stylesheet_directory_uri() . '/js/shop-rollover.js' );
            wp_enqueue_script('shop-rollover');
            
            wp_register_style( 'menu-stylecss', get_stylesheet_directory_uri() . '/css/menu-shop.css' );
            wp_enqueue_style('menu-stylecss');
            
            wp_register_script( 'menu-stylejs', get_stylesheet_directory_uri() . '/js/menu.js' );
            wp_enqueue_script('menu-stylejs');
            
        }
        else if ( is_account_page() ){
            wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
            
            //wp_enqueue_style( 'shop-style', get_stylesheet_directory_uri() . '/css/shop.css' );
            
            wp_register_script( 'child-jquery', get_stylesheet_directory_uri() . '/js/jquery-1.7.1.js'); 
            wp_enqueue_script('child-jquery');
            
            wp_register_script('shop-rollover', get_stylesheet_directory_uri() . '/js/shop-rollover.js' );
            wp_enqueue_script('shop-rollover');
            
            wp_register_style( 'menu-stylecss', get_stylesheet_directory_uri() . '/css/menu-shop.css' );
            wp_enqueue_style('menu-stylecss');
            
            wp_register_script( 'menu-stylejs', get_stylesheet_directory_uri() . '/js/menu.js' );
            wp_enqueue_script('menu-stylejs');
            
        }
        else if ( is_home() ){
        wp_enqueue_style( 'blog-style', get_stylesheet_directory_uri() . '/css/blog.css' );
        wp_register_script( 'child-jquery', get_stylesheet_directory_uri() . '/js/jquery-1.7.1.js'); 
            wp_enqueue_script('child-jquery');
            wp_register_script( 'blog-stylejs', get_stylesheet_directory_uri() . '/js/blog.js' );
            wp_enqueue_script('blog-stylejs');
            wp_register_script( 'instafeedjs', get_stylesheet_directory_uri() . '/js/instafeed.js' );
            wp_enqueue_script('instafeedjs');
            
        }else if(is_single()) {
            wp_enqueue_style( 'blog-post-style', get_stylesheet_directory_uri() . '/css/blog-post.css' );
            wp_enqueue_style( 'font-awesome-post-style', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
            
        }
        
        if(is_page_template( 'galerie-17w.php' )) {
            wp_register_script( 'child-jquery', get_stylesheet_directory_uri() . '/js/jquery-1.7.1.js'); 
            wp_enqueue_script('child-jquery');
            wp_register_style( 'menu-stylecss', get_stylesheet_directory_uri() . '/css/menu.css' );
            wp_register_style( 'lightboxcss', get_stylesheet_directory_uri() . '/css/lightbox.css' );
            wp_register_script( 'menu-stylejs', get_stylesheet_directory_uri() . '/js/menu.js' );
            wp_register_style( 'child-sidemenucss', get_stylesheet_directory_uri() . '/css/jquery.sidr.light.css');
            
            wp_register_script( 'child-sidemenu', get_stylesheet_directory_uri() . '/js/jquery.sidr.min.js'); 
            wp_register_script( 'lightboxjs', get_stylesheet_directory_uri() . '/js/lightbox.js'); 
            wp_enqueue_script('child-sidemenu');
            
            wp_enqueue_style('child-sidemenucss');
            wp_enqueue_script('menu-stylejs');
            wp_enqueue_style('menu-stylecss');
            
            wp_enqueue_script('lightboxjs');
            wp_enqueue_style('lightboxcss');
            //wp_register_script( 'automatic-image-montagejs', get_stylesheet_directory_uri() . '/js/automatic-image-montage.js' );
            //wp_enqueue_script('automatic-image-montagejs');
            //wp_enqueue_style( 'automatic-image-montage', get_stylesheet_directory_uri() . '/css/automatic-image-montage.css' );
            wp_enqueue_style( 'child-galeriecss', get_stylesheet_directory_uri() . '/css/galerie.css');
            wp_register_script('script-galerie', get_stylesheet_directory_uri() . '/js/galerie.js' );
            wp_enqueue_script('script-galerie');
            
        }
       
    }
    
    function get_pll_page_by_title( $page_title, $output = OBJECT, $post_type = 'page' ) {
    global $wpdb;
 
    if ( is_array( $post_type ) ) {
        $post_type = esc_sql( $post_type );
        $lang = pll_current_language();
        $post_type_in_string = "'" . implode( "','", $post_type ) . "'";
        $sql = $wpdb->prepare( "
            SELECT ID
            FROM $wpdb->posts
            WHERE post_title = %s
            AND post_type IN ($post_type_in_string)                 
            AND lang = %s
        ", $page_title , $lang );
    } else {
        $lang = pll_current_language();
        $sql = $wpdb->prepare( "
            SELECT ID
            FROM $wpdb->posts
            WHERE post_title = %s
            AND post_type = %s
            AND lang = %s
        ", $page_title, $post_type, $lang );
    }
 
    $page = $wpdb->get_var( $sql );
 
    if ( $page ) {
        return get_post( $page, $output );
    }
}
?>