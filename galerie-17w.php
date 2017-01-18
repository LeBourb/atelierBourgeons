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
   
    
?>
<html <?php language_attributes();  ?> ><?php /*storefront_html_tag_schema();*/ ?>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
</head>
<body style="height:100%;width:100%;overflow-x:hidden;">
    <?php 
 get_header(); 
 ?>
<div class="galerie am-container" id="am-container">
<?php 
 
$images = get_attached_media('image', $post->ID);
$index = 0;

foreach($images as $image) { 
    $index++;
   $image_attributes = wp_get_attachment_image_src($image->ID,'large');
   
   $ratio = round(($image_attributes[2]/$image_attributes[1])*100);
   ?>
    <a  href="<?php echo $image_attributes[0]?>" data-lightbox="roadtrip" class="am-wrapper <?php echo "ratio_$ratio" ?>" style="" data-title="Optional caption." ><img src="<?php echo $image_attributes[0];?>" />
    
					<div class="overlay" style="opacity: 0.9; display:none;"></div>
				 
				</a>
<?php }
//wp_footer(); 
get_footer();
?>
</div>
    </body>
    </html>