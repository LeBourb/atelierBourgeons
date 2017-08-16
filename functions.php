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
//$STYLESHEETPATH = '';
// custom options
add_theme_support( 'woocommerce' );

require ('plugin.php');    
require('amp-woocommerce.php');
// product tag image 
require ('wp-custom-taxonomy-image.php');
require ('wp-custom-taxonomy-attachment.php');

/**
 * Storefront  functions.
 *
 * @package storefront
 */

if ( ! function_exists( 'storefront_is_woocommerce_activated' ) ) {
	/**
	 * Query WooCommerce activation
	 */
	function storefront_is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}


/**
 * Query WooCommerce activation
 */
function is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}
        
function is_pll_wc( $wc_page)
{ 
    $cart_ids = PLL()->model->post->get_translations(wc_get_page_id( $wc_page));
    if(count($cart_ids)==0) {
	return false;
    }
    // j'affiche le contenu de la page About dans la langue courrante        
    return is_page( $cart_ids[pll_current_language()] ) || defined( 'WOOCOMMERCE_CART' ) ;
}

function get_pll_wc_url( $wc_page, $lang = null)
{ 
   $cart_ids = PLL()->model->post->get_translations(wc_get_page_id( $wc_page));
    
    // j'affiche le contenu de la page About dans la langue courrante        
    if( $lang == null) {
        return get_permalink( $cart_ids[pll_current_language()] );
    }else {
        return get_permalink( $cart_ids[$lang] );
    }
    
   
}

function get_pll_term ($value) {    
    $term_id = pll_get_term($value, pll_current_language());
    $term = get_term_by('term_taxonomy_id', $term_id, 'product_cat');     
    $pll_name = $term->name;    
    if( $pll_name != null && $pll_name!= "") {        
        return $pll_name;                
    }
    else {        
        return get_term_by('id', $value, 'product_cat')->name;        
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
    $cart_ids = PLL()->model->post->get_translations(get_the_ID());                
                // j'affiche le contenu de la page About dans la langue courrante     
     //           print_r($cart_ids);
    //echo get_the_ID(); 
    
    if(!in_array($lang, $cart_ids))  {
        return "";
    }
    return get_permalink( $cart_ids[$lang] );
}

    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );    

    
    function theme_enqueue_styles() {
              
        require ('inc/init.php');    
        
        wp_register_script( 'child-jquery', get_template_directory_uri() . '/js/jquery-3.1.1.min.js'); 
        wp_enqueue_script('child-jquery');
        wp_enqueue_style( 'font-awesome-post-style', get_template_directory_uri() . '/css/font-awesome.min.css' );
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style-storefront.min.css' , array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/style-storefront.min.css' )  );
        
        if(is_front_page()) {                     
            wp_register_style('style-homepage', get_template_directory_uri() . '/css/homepage.min.css', array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/css/homepage.min.css' )  );
            wp_enqueue_style('style-homepage');
            
            
        } else if ( is_pll_wc('shop') || is_shop() || is_product() || is_product_category() || is_pll_wc('cart')){
            wp_enqueue_style( 'shop-style', get_template_directory_uri() . '/css/shop.min.css' , array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/css/shop.min.css' )  );
            
            wp_enqueue_script( 'jquery-ui-js', get_template_directory_uri() . '/js/jquery-ui-1.12.1.min.js',  array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/js/jquery-ui-1.12.1.min.js' ));
            wp_enqueue_style( 'jquery-ui-css', get_template_directory_uri() . '/css/jquery-ui-1.12.1.min.css',  array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/css/jquery-ui-1.12.1.min.css' ) );
            
            wp_enqueue_script( 'viewerjs', get_template_directory_uri() . '/js/viewer.min.js',  array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/js/viewer.min.js' ));
            wp_enqueue_style( 'viewercss', get_template_directory_uri() . '/css/viewer.min.css' ,  array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/css/viewer.min.css' ));            
            
            wp_register_script('shop-rollover', get_template_directory_uri() . '/js/shop-rollover.min.js', array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/js/shop-rollover.min.js' ) );
            wp_enqueue_script('shop-rollover');
            
            wp_register_script('custom-options', get_template_directory_uri() . '/js/custom-options.min.js' );
            wp_enqueue_script('custom-options');
            
            wp_register_style( 'lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css' );
            wp_enqueue_style('lightboxcss');
           
            
            
                        
        }
        else if ( is_pll_wc('checkout')) {           
        }
        else if ( is_account_page() ){                   
            wp_enqueue_style( 'account-style', get_template_directory_uri() . '/css/account.min.css' );           
            
        }
        else if ( is_home() ){
            wp_enqueue_style( 'blog-style', get_template_directory_uri() . '/css/blog.min.css', array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/css/blog.min.css' ) );
            wp_enqueue_style( 'blog-style-common', get_template_directory_uri() . '/css/blog-common.min.css' );
            
            wp_register_script( 'blog-stylejs', get_template_directory_uri() . '/js/blog.min.js' );
            wp_enqueue_script( 'blog-stylejs');
            
        } else if(is_single()) {
            wp_enqueue_style( 'blog-style-common', get_template_directory_uri() . '/css/blog-common.min.css' );             
            wp_enqueue_style( 'blog-post-style', get_template_directory_uri() . '/css/blog-post.min.css' );
        } else if(is_product()) {
            wp_enqueue_style( 'shop-product-page-style', get_template_directory_uri() . '/css/shop-product-page.min.css' );
            wp_register_style( 'content-single-product-css', get_template_directory_uri() . '/css/content-single-product.min.css' );
            wp_enqueue_style('content-single-product-css');            
            
        } else if (is_page_template( 'galerie-17w.php' )) {
            wp_register_script( 'viewerjs', get_template_directory_uri() . '/js/viewer.min.js',  array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/js/viewer.min.js' ));
            wp_register_style( 'viewercss', get_template_directory_uri() . '/css/viewer.min.css' ,  array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/css/viewer.min.css' ));            
            wp_enqueue_script('viewerjs');            
            wp_enqueue_style('viewercss');
            wp_enqueue_style( 'child-galeriecss', get_template_directory_uri() . '/css/galerie.min.css' , array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/css/galerie.min.css' )  );
            wp_register_script('script-galerie', get_template_directory_uri() . '/js/galerie.min.js' , array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/js/galerie.min.js' )  );
            wp_enqueue_script('script-galerie');            
        }
        
        
        if(is_page("About") || is_page("Products") || is_page("Help")) {
            wp_register_style( 'about-stylecss', get_template_directory_uri() . '/css/about.min.css' , array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/css/about.min.css' )  );
            wp_enqueue_style('about-stylecss');
            wp_register_style( 'parallaxcss', get_template_directory_uri() . '/css/parallax.min.css' , array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/css/parallax.min.css' )  );
            wp_enqueue_style('parallaxcss');
            wp_register_script('parallaxjs', get_template_directory_uri() . '/js/parallax.min.js',  array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/js/parallax.min.js' )); 
            wp_enqueue_script('parallaxjs');            
            wp_register_script('script-about', get_template_directory_uri() . '/js/about.min.js' , array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/js/about.min.js' ));
            wp_enqueue_script('script-about');
      
        }
        
        if(is_page("Products")) {
            wp_register_style( 'cards-stylecss', get_template_directory_uri() . '/css/cards.min.css' );
            wp_enqueue_style('cards-stylecss');
        }
        
        wp_register_style( 'menu-stylecss', get_template_directory_uri() . '/css/menu-shop.css', array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/css/menu-shop.css' )  );
        wp_enqueue_style('menu-stylecss');

        wp_register_script( 'menu-stylejs', get_template_directory_uri() . '/js/menu.js', array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/js/menu.js' )  );
        wp_enqueue_script('menu-stylejs');
        
       // wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style-storefront.min.css' , array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/style-storefront.min.css' )  );
        wp_enqueue_style( 'force-ab-style', get_template_directory_uri() . '/style.min.css' , array(), filemtime( getcwd() .  '/wp-content/themes/atelierbourgeons/style.min.css' )  );
        
        
        /**************** amp *******************/
        
        
        
/******* storefront **********/
$theme              = wp_get_theme( 'atelierbourgeons' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
//require 'woocommerce/includes/class-wc-frontend-scripts.php';
require 'inc/storefront-template-functions.php';

//require 'templates/feed.php';
/*require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';


$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 * /
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);


if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}*/
//WC_Frontend_Scripts::init();


if ( storefront_is_woocommerce_activated() ) {
	/*$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';*/
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';
}
/******* storefront **********/ 
        
        
    }
    
    function get_pll_page_id_by_title( $page_title, $lang = null) {
        $page_l = get_page_by_title( $page_title );        
        //$post_slug = pll_get_post($page_l->ID, 'en');
        $cart_ids =  PLL()->model->post->get_translations($page_l->ID);
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
    //print(get_template_directory_uri());
    load_child_theme_textdomain( 'atelierbourgeons', get_stylesheet_directory() . '/languages' );
    //load_theme_textdomain( 'atelierbourgeons', get_template_directory_uri() . '/languages' );
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

function add_attachment_field_position_y( $form_fields, $post ) {
    $form_fields['focus_position_y'] = array(
        'label' => 'Focus Position Y (%)',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'focus_position_y', true ),
        'helps' => '% of image on y axis'
    );
    return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'add_attachment_field_position_y', 11, 2 );


function add_attachment_field_position_x_save( $post, $attachment ) {
    if( isset( $attachment['focus_position_x'] ) )
    update_post_meta( $post['ID'], 'focus_position_x', $attachment['focus_position_x'] );

    return $post;
}
add_filter( 'attachment_fields_to_save', 'add_attachment_field_position_x_save', 10, 2 );

function add_attachment_field_position_y_save( $post, $attachment ) {
    if( isset( $attachment['focus_position_y'] ) )
    update_post_meta( $post['ID'], 'focus_position_y', $attachment['focus_position_y'] );

    return $post;
}
add_filter( 'attachment_fields_to_save', 'add_attachment_field_position_y_save', 11, 3 );

// Our filter callback function
function woocommerce_currency_atelierb( $string ) {
    // (maybe) modify $string
    if(pll_current_language() == 'ja')
        return 'JPY';
    else 
        return 'EUR';
}
add_filter( 'woocommerce_currency', 'woocommerce_currency_atelierb', 10, 3 );

/**
 * Trim zeros in price decimals
 **/
// Our filter callback function
function woocommerce_price_trim_zeros_atelierb( $string ) {
    // (maybe) modify $string
    if(pll_current_language() == 'ja')
        return true;
    else 
        return false;
}
 add_filter( 'woocommerce_price_trim_zeros', woocommerce_price_trim_zeros_atelierb );
 
 
 /**
 * position symbol / prix
 **/
// Our filter callback function
function woocommerce_price_format_atelierb( $format ) {
    // (maybe) modify $string
    if(pll_current_language() == 'ja')
        return '%1$s%2$s';
    else 
        return $format;
}
add_filter( 'woocommerce_price_format', 'woocommerce_price_format_atelierb' );

 
 function EURToJPY ($price) {
    $rate = get_rate_eurjpy();
    return intval(round($price * $rate / 100 + 1 ) * 100);
 }
 
function get_rate_eurjpy(){
    $today = date("m.d.y");                         // 03.10.01
    $filename = "yahoo-EURJPY-'. $today . '.txt";
    $json = '';
    if(!file_exists ( $filename )){
        $response = wp_remote_get( 'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20csv%20where%20url%3D%22http%3A%2F%2Ffinance.yahoo.com%2Fd%2Fquotes.csv%3Fe%3D.csv%26f%3Dnl1d1t1%26s%3Deurjpy%3DX%22%3B&format=json&callback=' );
        $today = date("m.d.y"); 
        if( is_array($response)  ) {
          $header = $response['headers']; // array of http header lines
          $json = $response['body']; // use the content


          $myfile = fopen($filename, "w") or die("Unable to open file!");
            fwrite($myfile, $json);
            fclose($myfile);
        }
    }else {
       $myfile = fopen($filename, "r") or die("Unable to open file!");
       $json = stream_get_contents($myfile);
    }
    $obj = json_decode($json);
    $rate = $obj->{'query'}->{'results'}->{'row'}->{'col1'};
    return $rate;
}


function calculate_shipping($target_country, $item_price, $shipping_class) {
    //print_r('inputs are: ' . $target_country . ', price: ' . $item_price . ', class: ' . $shipping_class);
    $package= array();
    $package['destination']['country'] = $target_country;
    $package['destination']['state'] = '';
    $package['destination']['postcode'] = '';
    $status_options  = get_option( 'woocommerce_status_options', array() );
    $shipping_zone  = WC_Shipping_Zones::get_zone_matching_package( $package );
    //print_r('zone matching: ' . $shipping_zone);
    $all_methods = $shipping_zone->get_shipping_methods( true );
    //print_r($all_methods);
    foreach($all_methods as $method)
    {
        if($method->id == 'free_shipping_atelierb')
        {
                $fg = 0;	
                foreach($method->countries as $country)
                {
                        if( $target_country == $country)
                        {
                                $fg = 1;	
                        }
                }
                if( $fg == 1 && ($method->min_amount <= $item_price )) {
                    $cost = 0;
                    break;
                }
        }else
        {		
            $fg = 0;	
            foreach($method->countries as $country)
            {
                    if($target_country == $country)
                    {
                            $fg = 1;	
                    }
            }
            $total_cost = 0;
            $shipping_class_term = get_term_by( 'slug', $shipping_class, 'product_shipping_class' );
            $cost = $method->get_option( 'class_cost_' . $shipping_class_term->term_id, $method->get_option( 'class_cost_' . $shipping_class, '' ) ) ;
            //$cost = $method->cost;	
            
            
        }
    }
    //print_r('return cost:' . $cost);
    return $cost;
}

function pll_get_product($product,$lang) {
    $product_id = pll_get_post($product->get_id(),$lang);
    $_pf = new WC_Product_Factory();
    return $_pf->get_product($product_id);    
}

?>