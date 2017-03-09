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

</head>
<body style="height:100%;width:100%;overflow-x:hidden;">
    <?php 
 get_header(); 
 ?>
<div class="galerie am-container" id="am-container">
<?php 
// http://wordpress.stackexchange.com/questions/80408/how-to-get-page-post-gallery-attachment-images-in-order-they-are-set-in-backend
// helper function to return first regex match
function get_match( $regex, $content ) {
    preg_match($regex, $content, $matches);
    return $matches[1];
} 

// Extract the shortcode arguments from the $page or $post
$shortcode_args = shortcode_parse_atts(get_match('/\[gallery\s(.*)\]/isU', $post->post_content));

// get the ids specified in the shortcode call
$ids = $shortcode_args["ids"];

// get the attachments specified in the "ids" shortcode argument
$images = get_posts(
    array(
        'include' => $ids, 
        'post_status' => 'inherit', 
        'post_type' => 'attachment', 
        'post_mime_type' => 'image', 
        'order' => 'menu_order ID', 
        'orderby' => 'post__in', //required to order results based on order specified the "include" param
    )
);
 //print_r($attachments);
//$images = get_attached_media('image', $post->ID);
//$index = 0;

foreach($images as $image) { 
    $index++;
   $image_attributes = wp_get_attachment_image_src($image->ID,'large');
   
   $ratio = round(($image_attributes[2]/$image_attributes[1])*100);
   ?>
    <a  href="<?php echo $image_attributes[0]?>" data-lightbox="roadtrip" class="am-wrapper <?php echo "ratio_$ratio" ?>" style="" data-title="Optional caption." >
           <?php 
           //<img src="<?php echo $image_attributes[0];" />
            echo wp_get_attachment_image( $image->ID,
                    'large', false ,array(
				'title'	 => $props['title'],
				'alt'    => $props['alt'],
                                'sizes'       => '(max-width: 768px) 500px , 1920px'
			) );
            
            
            ?>
					<div class="overlay" style="opacity: 0.9; display:none;"></div>
				 
				</a>
<?php }
//wp_footer(); 
get_footer();
?>
</div>
    </body>
    </html>