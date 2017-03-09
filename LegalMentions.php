<?php
/**
 * The template for displaying the about products page of Atelier Bourgeons.
 *
 * This page template will display
 *
 * Template name: Legal Mentions
 *
 * @package AtelierBourgeons
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
<body style="overflow-y: hidden;width:100%;">
    <?php 
    get_header(); 
 ?>
    <div class="legal_mentions">
    <?php echo $post->post_content; ?>    
    </div>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
    
//wp_footer(); 
get_footer();
?>

</body>
</html>
