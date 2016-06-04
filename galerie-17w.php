<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Galerie17W
 *
 * @package storefront
 */ 
    get_header(); 
    
?>
<div class="galerie am-container" id="am-container">
<?php 
$images = get_attached_media('image', $post->ID);
foreach($images as $image) { 
   $image_attributes = wp_get_attachment_image_src($image->ID,'full');
   ?>
    <a href="#" class="am-wrapper" style="display:none"><img src="<?php echo $image_attributes[0]?>" /></a>
<?php } ?>
</div>