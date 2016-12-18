<?php
/**
 * The template for displaying the about page of Atelier Bourgeons.
 *
 * This page template will display
 *
 * Template name: About
 *
 * @package AtelierBourgeons
 */ 
   
 require 'header-about.php';
?>

<div class="about-right container">
    <div>
        <p class="title"><?php _e( 'about', 'atelierbourgeons' );?></p>
        <li class="text"><?php _e( 'about bourgeons', 'atelierbourgeons' );?></li>
    </div>
    <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/About.jpg"; ?>" />
</div>
<div class="about-left container">
    
    <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Concept.jpg"; ?>" />

    <div>
        <p class="title"><?php _e( 'Concept', 'atelierbourgeons' );?></p>
        <li class="text"><?php _e( 'Concept bourgeons', 'atelierbourgeons' );?></li>
    </div>
</div>    
<div class="about-right container">
    
    

    <div>
        <p class="title"><?php _e( 'Creatrice', 'atelierbourgeons' );?></p>
        <li class="text"><?php _e( 'Creatrice bourgeons', 'atelierbourgeons' );?></li>
    </div>
    <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Creator.jpg"; ?>" />
</div>
    
<?php  
    require 'footer-about.php';
?>