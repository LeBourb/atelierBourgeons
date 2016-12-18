<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<html <?php language_attributes();  ?> ><?php /*storefront_html_tag_schema();*/ ?>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<style>                    
                    @font-face {
                        font-family: Modesty;
                        src: url(<?php echo get_site_url ()?>/wp-content/themes/atelierbourgeons/fonts/ModestyFreshStyle.ttf);
                    }
</style>
</head>
<body style="height:100%;width:100%;">
    <?php 
    get_header(); 
 ?>
    <ul id="inline-menu">
        <li class="<?php if(is_page("About")) echo "current"; ?>"><a href="<?php echo get_pll_page_by_title("About");  ?>"><?php echo __( 'About', 'atelierbourgeons' );?></a></li>
        <li class="<?php if(is_page("Products")) echo "current"; ?>"><a href="<?php echo get_pll_page_by_title("Products");  ?>"><?php echo __( 'Our Products', 'atelierbourgeons' );?></a></li>
        <li class="<?php if(is_page("Help")) echo "current"; ?>"><a href="<?php echo get_pll_page_by_title("Help");  ?>"><?php echo __( 'Help', 'atelierbourgeons' );?></a></li>
    </ul>
    
    
    
    