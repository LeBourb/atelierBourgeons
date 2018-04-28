<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<html <?php language_attributes();  ?> ><?php /*storefront_html_tag_schema();*/ ?>
<head>
<style>                    
    <?php
    
        if( pll_current_language() == 'fr') {
            echo '@font-face {
                        font-family: Modesty;
                        src: url(' . get_site_url () . '/wp-content/themes/atelierbourgeons/fonts/ModestyFreshStyle.ttf);
            }
            .title {
                font-family: Modesty;
                font-size: 5em;
                font-weight: 200;
                text-align: center;
                margin: 0;
                margin-bottom: 0.1em;
            }
            ';
        }else if (pll_current_language() == 'ja') {
            echo '@font-face {
                        font-family: Utsukushi;
                        src: url(' . get_site_url () . '/wp-content/themes/atelierbourgeons/fonts/02UtsukushiMincho.ttf);
            }
            .about-text.ja .title {
                font-family: Utsukushi;
                text-align: center;                
            }';
        }
    ?>
    
</style>
<?php 
    get_header(); 
 ?>
</head>
<body style="height:auto;width:100%;">
    
    <ul id="inline-menu">
        <li class="<?php if(is_page("About")) echo "current"; ?>"><a href="<?php echo get_pll_page_by_title("About");  ?>"><?php echo __( 'About', 'atelierbourgeons' );?></a></li>
        <li class="<?php if(is_page("Products")) echo "current"; ?>"><a href="<?php echo get_pll_page_by_title("Products");  ?>"><?php echo __( 'Our products & Services', 'atelierbourgeons' );?></a></li>
        <li class="<?php if(is_page("Help")) echo "current"; ?>"><a href="<?php echo get_pll_page_by_title("Help");  ?>"><?php echo __( 'Help', 'atelierbourgeons' );?></a></li>
    </ul>
    
    
    
    