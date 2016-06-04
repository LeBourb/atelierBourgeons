<?php
    
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
            
            
        } else if ( is_shop() || is_product() || is_product_category()){
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
        else if ( is_home() ){
        wp_enqueue_style( 'blog-style', get_stylesheet_directory_uri() . '/css/blog.css' );
        wp_register_script( 'child-jquery', get_stylesheet_directory_uri() . '/js/jquery-1.7.1.js'); 
            wp_enqueue_script('child-jquery');
            wp_register_script( 'blog-stylejs', get_stylesheet_directory_uri() . '/js/blog.js' );
            wp_enqueue_script('blog-stylejs');
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
            wp_enqueue_style( 'child-galeriecss', get_stylesheet_directory_uri() . '/css/galerie.css');
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
            wp_register_script('script-homepage', get_stylesheet_directory_uri() . '/js/galerie.js' );
            wp_enqueue_script('script-homepage');
            
        }
       
    }
?>