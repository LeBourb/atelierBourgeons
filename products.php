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


<div class="original">
    <p class="title"><?php _e('Original Collection','atelierbourgeons')?></p> 
    <div>        
        <div class="text-right">            
            <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Fabrics.jpg"; ?>" />
            <div><?php _e('Fabrics and Accessories','atelierbourgeons')?>                
            </div>
        </div>
        <div class="separator"></div>
        <div class="text-left">
            <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Packaging.jpg"; ?>" />
            <div><?php _e('Design and Production','atelierbourgeons')?>
            </div>
        </div>
        <div class="separator"></div>
        <div class="text-right">
            <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Sewing.jpg"; ?>" />
            <div><?php _e('Card, Label, Packaging','atelierbourgeons')?>                
            </div>
        </div>
    </div>
</div>
<div class="about-right container">
    
    <div>
        <?php _e('Vintage and Second Hand','atelierbourgeons')?>        
    </div>
    <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Vintage.jpg"; ?>" />
</div>
<div class="about-left container">
    
    <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Tailor-made.jpg"; ?>" />

    <div>
        <?php _e('Tailor-made clothes','atelierbourgeons')?>        
        
    </div>
</div>
    <div class="cards-container">
        <?php _e('Tailor-made steps','atelierbourgeons')?>     
        <div class="cards">
            <div class="card" >              
                <?php _e('Tailor-made design','atelierbourgeons')?>                                       
            </div>
            <div class="card" >              
                <?php _e('Tailor-made measure','atelierbourgeons')?>                                       
            </div>
                 <div class="card" >              
                     <?php _e('Tailor-made first fitting','atelierbourgeons')?>
                 </div>
                 <div class="card" >              
                     <?php _e('Tailor-made second fitting','atelierbourgeons')?>                                                    
            </div>
                 <div class="card" >              
                    <?php _e('Tailor-made presentation','atelierbourgeons')?>
            </div>
        </div>
        <p class="details">
            <?php _e('Tailor-made details','atelierbourgeons')?>
</p>
    </div>
    <div class="cards-container">
        
        <p class="title"><?php _e('Rate - Tailor-made','atelierbourgeons')?></p>
        <div class="cards fee">
            <?php _e('Rate - Tailor-made details','atelierbourgeons')?>
        </div>
        <div class="price">
            <?php _e('Rate - Tailor-made price 1','atelierbourgeons')?>        
        </div>
        <div class="price">
            <?php _e('Rate - Tailor-made price 2','atelierbourgeons')?>        
        </div>
        
    </div>
    <div class="about-left container">
    
    <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Gift.jpg"; ?>" />

    <div>
        <?php _e('Gift Wrapping text','atelierbourgeons')?>                
    </div>
    </div>
</div>

<?php
require 'footer-about.php';
?>