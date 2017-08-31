<?php
/**
 * The template for displaying the about products page of Atelier Bourgeons.
 *
 * This page template will display
 *
 * Template name: Help
 *
 * @package AtelierBourgeons
 */ 
   
 require 'header-about.php';
?>
    <section>        
        <?php global $post; echo $post->post_content; ?>
    </section>
        
<?php
    require 'footer-about.php';
?>