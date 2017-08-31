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
<img class="image-s" src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/About-s.jpg"; ?>" />
<div class="parallax-container">
   <!-- -->
    <div class="parallax">
        <img src ="<?php echo get_site_url() . "/wp-content/themes/atelierbourgeons/img/about/About.jpg"; ?>" />
    </div>
    <div class="about-text <?php if(pll_current_language()=='ja') echo 'ja'; ?>">
        <div><p class="title"><?php _e( 'about', 'atelierbourgeons' );?></p>
        <li class="text"><?php _e( 'about bourgeons', 'atelierbourgeons' );?></li>
        </div>
    </div>
</div>
<div style="width:100%; height:3em; background-color: white;"></div>
<img class="image-s" src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Concept-s.jpg"; ?>" />
<div class="parallax-container">
    <div class="parallax">
        <img src ="<?php echo get_site_url() . "/wp-content/themes/atelierbourgeons/img/about/Concept.jpg"; ?>" />
    </div>
    <div class="about-text <?php if(pll_current_language()=='ja') echo 'ja'; ?>">
        <div><p class="title"><?php _e( 'Concept', 'atelierbourgeons' );?></p>
        <li class="text"><?php _e( 'Concept bourgeons', 'atelierbourgeons' );?></li>
        </div>
    </div>    
</div>    
<div style="width:100%; height:3em; background-color: white;"></div>
<img class="image-s" src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Creator-s.jpg"; ?>" />
<div class="parallax-container">
    <div class="parallax">
        <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Creator.jpg"; ?>" />
    </div>
    <div  class="about-text <?php if(pll_current_language()=='ja') echo 'ja'; ?>">
        <div><p class="title"><?php _e( 'Creatrice', 'atelierbourgeons' );?></p>
        <li class="text"><?php _e( 'Creatrice bourgeons', 'atelierbourgeons' );?></li>
        </div>
    </div>    
</div>
    
<?php  
    require 'footer-about.php';
?>