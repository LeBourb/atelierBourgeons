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

require (STYLESHEETPATH  . '/plugin.php');    
        
function is_pll_wc( $wc_page)
{ 
    global $polylang;
    $cart_ids = $polylang->model->get_translations('page', wc_get_page_id( $wc_page));
    if(count($cart_ids)==0) {
	return false;
    }
    // j'affiche le contenu de la page About dans la langue courrante        
    return is_page( $cart_ids[pll_current_language()] ) || defined( 'WOOCOMMERCE_CART' ) ;
}

function get_pll_wc_url( $wc_page, $lang = null)
{ 
   global $polylang;
    $cart_ids = $polylang->model->get_translations('page', wc_get_page_id( $wc_page));
    
    // j'affiche le contenu de la page About dans la langue courrante        
    if( $lang == null) {
        return get_permalink( $cart_ids[pll_current_language()] );
    }else {
        return get_permalink( $cart_ids[$lang] );
    }
    
   
}


function is_sub_account_menu() {
    global $wp;
    if(is_account_page()  
            && ( (strpos($wp->request, '/orders') !== false)
            || (strpos($wp->request, '/download') !== false)
            || (strpos($wp->request, '/edit-address') !== false)
            || (strpos($wp->request, '/edit-account') !== false)
            || (strpos($wp->request, '/logout') !== false)            
            )
            ) {
        return true;
    }        
    else {
        return false;
    }
};



// Logout Redirect

function atelierb_logout_redirect()
{
    wp_redirect(get_home_url());
    exit;
}

add_action('wp_logout', 'atelierb_logout_redirect');


function get_pll_url($lang)
{ 
    //print_r("url: "+$url);
    global $polylang;
    $cart_ids = $polylang->model->get_translations('page', get_the_ID());                
                // j'affiche le contenu de la page About dans la langue courrante     
     //           print_r($cart_ids);
    //echo get_the_ID(); 
    //print_r($cart_ids);
    if($cart_ids[$lang] == "")  {
        return "";
    }
    return get_permalink( $cart_ids[$lang] );
}

    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );    

    
    function theme_enqueue_styles() {
              
        require (STYLESHEETPATH  . '/inc/init.php');    
        
        wp_register_script( 'child-jquery', get_stylesheet_directory_uri() . '/js/jquery-3.1.1.min.js'); 
        wp_enqueue_script('child-jquery');
         if(is_front_page()) {                     
          
            wp_register_style( 'child-sidemenucss', get_stylesheet_directory_uri() . '/css/jquery.sidr.light.css');
            wp_register_script( 'child-sidemenu', get_stylesheet_directory_uri() . '/js/jquery.sidr.min.js');  
            wp_enqueue_script('child-sidemenu');
            wp_enqueue_style('child-sidemenucss');
            wp_register_style('style-homepage', get_stylesheet_directory_uri() . '/css/homepage.css' );
            wp_enqueue_style('style-homepage');
 
            
            
            
            wp_register_style( 'lightboxcss', get_stylesheet_directory_uri() . '/css/lightbox.css' );
            wp_register_script( 'lightboxjs', get_stylesheet_directory_uri() . '/js/lightbox.js'); 
            wp_enqueue_script('lightboxjs');
            wp_enqueue_style('lightboxcss');
            
           // wp_enqueue_style( 'child-galeriecss', get_stylesheet_directory_uri() . '/css/galerie.css');
            //wp_register_script('script-galerie', get_stylesheet_directory_uri() . '/js/galerie.js' );
            //wp_enqueue_script('script-galerie');
            
            //wp_register_script('script-galerie17w', get_stylesheet_directory_uri() . '/js/galerie17w.js' );
            //wp_enqueue_script('script-galerie17w');
            
        } else if ( is_pll_wc('shop') || is_shop() || is_product() || is_product_category() || is_pll_wc('cart')){
                        
            wp_enqueue_style( 'shop-style', get_stylesheet_directory_uri() . '/css/shop.css' );
            
            wp_register_script('shop-rollover', get_stylesheet_directory_uri() . '/js/shop-rollover.js' );
            wp_enqueue_script('shop-rollover');
            
            wp_register_script('custom-options', get_stylesheet_directory_uri() . '/js/custom-options.js' );
            wp_enqueue_script('custom-options');
            
                        
        }
        else if ( is_account_page() ){
            wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
            
            //wp_enqueue_style( 'shop-style', get_stylesheet_directory_uri() . '/css/shop.css' );           
            wp_enqueue_style( 'account-style', get_stylesheet_directory_uri() . '/css/account.css' );           
            
        }
        else if ( is_home() ){
            wp_enqueue_style( 'blog-style', get_stylesheet_directory_uri() . '/css/blog.css' );
            wp_enqueue_style( 'blog-style-common', get_stylesheet_directory_uri() . '/css/blog-common.css' );
            
            wp_register_script( 'blog-stylejs', get_stylesheet_directory_uri() . '/js/blog.js' );
            wp_enqueue_script('blog-stylejs');            
            wp_enqueue_style( 'font-awesome-post-style', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
            
            wp_register_style( 'menu-stylecss', get_stylesheet_directory_uri() . '/css/menu-shop.css' );
            wp_enqueue_style('menu-stylecss');
            
            wp_register_script( 'menu-stylejs', get_stylesheet_directory_uri() . '/js/menu.js' );
            wp_enqueue_script('menu-stylejs');
        }else if(is_single()) {
            wp_enqueue_style( 'blog-style-common', get_stylesheet_directory_uri() . '/css/blog-common.css' );
            wp_register_script( 'menu-stylejs', get_stylesheet_directory_uri() . '/js/menu.js' );
            wp_enqueue_script('menu-stylejs');
            
            wp_enqueue_style( 'blog-post-style', get_stylesheet_directory_uri() . '/css/blog-post.css' );
            wp_enqueue_style( 'font-awesome-post-style', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
            
        }
        
        if(is_product()) {
            wp_enqueue_style( 'shop-product-page-style', get_stylesheet_directory_uri() . '/css/shop-product-page.css' );
        }
        
        if(is_page_template( 'galerie-17w.php' )) {
            
            wp_register_style( 'lightboxcss', get_stylesheet_directory_uri() . '/css/lightbox.css' );
            
            wp_register_style( 'child-sidemenucss', get_stylesheet_directory_uri() . '/css/jquery.sidr.light.css');
            
            wp_register_script( 'child-sidemenu', get_stylesheet_directory_uri() . '/js/jquery.sidr.min.js'); 
            wp_register_script( 'lightboxjs', get_stylesheet_directory_uri() . '/js/lightbox.js'); 
            wp_enqueue_script('child-sidemenu');
            
            wp_enqueue_style('child-sidemenucss');
            
            wp_enqueue_script('lightboxjs');
            wp_enqueue_style('lightboxcss');
            wp_enqueue_style( 'child-galeriecss', get_stylesheet_directory_uri() . '/css/galerie.css');
            wp_register_script('script-galerie', get_stylesheet_directory_uri() . '/js/galerie.js' );
            wp_enqueue_script('script-galerie');
            
        }
        
        if(is_product()) {
            wp_register_style( 'content-single-product', get_stylesheet_directory_uri() . '/css/content-single-product.css' );
            wp_enqueue_style('content-single-product');
        }
        
        if(is_page("About") || is_page("Products") || is_page("Help")) {
            wp_register_style( 'about-stylecss', get_stylesheet_directory_uri() . '/css/about.css' );
            wp_enqueue_style('about-stylecss');
            wp_register_script('script-about', get_stylesheet_directory_uri() . '/js/about.js' );
            wp_enqueue_script('script-about');
        }
        
        if(is_page("Products")) {
            wp_register_style( 'cards-stylecss', get_stylesheet_directory_uri() . '/css/cards.css' );
            wp_enqueue_style('cards-stylecss');
        }
        
        //wp_register_script( 'child-jquery', get_stylesheet_directory_uri() . '/js/jquery-1.7.1.js'); 
        //wp_enqueue_script('child-jquery');
            
        
        wp_register_style( 'menu-stylecss', get_stylesheet_directory_uri() . '/css/menu-shop.css' );
        wp_enqueue_style('menu-stylecss');

        wp_register_script( 'menu-stylejs', get_stylesheet_directory_uri() . '/js/menu.js' );
        wp_enqueue_script('menu-stylejs');
       
    }
    
    function get_pll_page_id_by_title( $page_title, $lang = null) {
        $page_l = get_page_by_title( $page_title );        
        //$post_slug = pll_get_post($page_l->ID, 'en');
        global $polylang;
        $cart_ids =  $polylang->model->get_translations('page', $page_l->ID);
        if( $lang == null) {
            return $cart_ids[pll_current_language()];
        }else {
            return $cart_ids[$lang];
        }
    }
        
    function get_pll_page_by_title( $page_title, $lang = null) {        
        return get_permalink( get_pll_page_id_by_title( $page_title) , $lang);
    }
    
    

/**
         * Save subscriber into database (refactor @ 2.0.4)
         * 
         * @since 2.0.0
         * @global object $wpdb
         * @throws Exception
         */
        function add_ab_subscriber() {
            global $wpdb;
            
            
            try {
                $_POST = array_map('trim', $_POST);

                // checks
                if (empty($_POST['email']) || !is_email($_POST['email'])) {
                    throw new Exception(__('Please enter a valid email address.', $this->plugin_slug));
                }
                
                if (!isset($newsletter)) $newsletter = new Newsletter();

                
                $subscriber = array();
                $subscriber['email'] = $newsletter->normalize_email(stripslashes($_POST['email']));

                
                $options_feed = get_option('newsletter_feed', array());
                if ($options_feed['add_new'] == 1) $subscriber['feed'] = 1;

                $options_followup = get_option('newsletter_followup', array());
                if ($options_followup['add_new'] == 1) {
                  $subscriber['followup'] = 1;
                  $subscriber['followup_time'] = time() + $options_followup['interval'] * 3600;
                }

                $subscriber['status'] = 'C';

                // TODO: add control for already subscribed emails
                
                NewsletterUsers::instance()->save_user($subscriber);
                wp_send_json_success('You successfully subscribed. Thanks!');

            } catch (Exception $ex) {
                wp_send_json_error($ex->getMessage());
            }
        }
        
add_action('wp_ajax_wpab_add_subscriber', 'add_ab_subscriber');  
add_action( 'wp_ajax_nopriv_wpab_add_subscriber', 'add_ab_subscriber' );
add_filter( 'woocommerce_show_page_title', '__return_false' );

//R14: redirect to pll page ! 
//add_filter('woocommerce_get_checkout_url', 'pll_woocommerce_get_page_id');
add_filter('woocommerce_get_checkout_page_id', 'pll_woocommerce_get_page_id');
add_filter('woocommerce_get_cart_page_id', 'pll_woocommerce_get_page_id');
add_filter('woocommerce_get_myaccount_page_id', 'pll_woocommerce_get_page_id');
add_filter('woocommerce_get_edit_address_page_id', 'pll_woocommerce_get_page_id');
add_filter('woocommerce_get_view_order_page_id', 'pll_woocommerce_get_page_id');
add_filter('woocommerce_get_change_password_page_id', 'pll_woocommerce_get_page_id');
add_filter('woocommerce_get_thanks_page_id', 'pll_woocommerce_get_page_id');
add_filter('woocommerce_get_shop_page_id', 'pll_woocommerce_get_page_id');
add_filter('woocommerce_get_terms_page_id', 'pll_woocommerce_get_page_id');
add_filter('woocommerce_get_pay_page_id', 'pll_woocommerce_get_page_id');

function pll_woocommerce_get_page_id($id) 
{
        return pll_get_post($id); // translate the page to current language
}

add_action( 'after_setup_theme', 'my_theme_setup' );
function my_theme_setup(){
    // Chargement des traductions... 
    //print(get_stylesheet_directory_uri());
    load_child_theme_textdomain( 'atelierbourgeons', get_stylesheet_directory() . '/languages' );
    //load_theme_textdomain( 'atelierbourgeons', get_stylesheet_directory_uri() . '/languages' );
}

function add_attachment_field_position_x( $form_fields, $post ) {
    $form_fields['focus_position_x'] = array(
        'label' => 'Focus Position X (%)',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'focus_position_x', true ),
        'helps' => '% of image on x axis'
    );
    return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'add_attachment_field_position_x', 10, 2 );

function add_attachment_field_position_x_save( $post, $attachment ) {
    if( isset( $attachment['focus_position_x'] ) )
    update_post_meta( $post['ID'], 'focus_position_x', $attachment['focus_position_x'] );

    return $post;
}
add_filter( 'attachment_fields_to_save', 'add_attachment_field_position_x_save', 10, 2 );

?>