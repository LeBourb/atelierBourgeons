<?php
/**
 * The template for displaying the about products page of Atelier Bourgeons.
 *
 * This page template will display
 *
 * Template name: Products
 *
 * @package AtelierBourgeons
 */ 
   
    require 'header-about.php';
?>


<img class="image-s" src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Fabrics-s.jpg"; ?>" />
<div class="parallax-container">
<!-- -->
<div class="parallax">
    <img src ="<?php echo get_site_url() . "/wp-content/themes/atelierbourgeons/img/about/Fabrics.jpg"; ?>" />
</div>
<div class="about-text <?php if(pll_current_language()=='ja') echo 'ja'; ?>">    
    <div><h2 class="title"><?php _e( 'Fabrics and Accessories Title', 'atelierbourgeons' );?></h2>
    <li class="text"><?php _e( 'Fabrics and Accessories', 'atelierbourgeons' );?></li>
    </div>
</div>
</div>
<div style="width:100%; height:3em; background-color: white;"></div>
<img class="image-s" src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Sewing-s.jpg"; ?>" />
<div class="parallax-container">
<!-- -->
<div class="parallax">
    <img src ="<?php echo get_site_url() . "/wp-content/themes/atelierbourgeons/img/about/Sewing.jpg"; ?>" />
</div>
<div class="about-text <?php if(pll_current_language()=='ja') echo 'ja'; ?>">
    <div>
    <h2 class="title"><?php _e( 'Design and Production Title', 'atelierbourgeons' );?></h2>
    <li class="text"><?php _e( 'Design and Production', 'atelierbourgeons' );?></li>
    </div>
</div>
</div>
<div style="width:100%; height:3em; background-color: white;"></div>
<img class="image-s" src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/packaging-s.jpg"; ?>" />
<div class="parallax-container">
<!-- -->
<div class="parallax">
    <img src ="<?php echo get_site_url() . "/wp-content/themes/atelierbourgeons/img/about/packaging.jpg"; ?>" />
</div>
<div class="about-text <?php if(pll_current_language()=='ja') echo 'ja'; ?>">
    <div>
    <h2 class="title"><?php _e( 'Card, Label, Packaging Title', 'atelierbourgeons' );?></h2>
    <li class="text"><?php _e( 'Card, Label, Packaging', 'atelierbourgeons' );?></li>
    </div>
</div>
</div> 
<div style="width:100%; height:3em; background-color: white;"></div>
<img class="image-s" src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Vintage-s.jpg"; ?>" />
<div class="parallax-container">
<!-- -->
<div class="parallax">
    <img src ="<?php echo get_site_url() . "/wp-content/themes/atelierbourgeons/img/about/Vintage.jpg"; ?>" />
</div>
<div class="about-text <?php if(pll_current_language()=='ja') echo 'ja'; ?>">
    <div>
    <h2 class="title"><?php _e( 'Vintage and Second Hand Title', 'atelierbourgeons' );?></h2>
    <li class="text"><?php _e( 'Vintage and Second Hand', 'atelierbourgeons' );?></li>
    </div>
</div>
</div>
<?php
require 'footer-about.php';
?>