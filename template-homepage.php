<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */ 
    get_header(); 
?>
<div id="bgimgs">
    <img src ="wp-content/themes/storefront-child/img/homepage.jpg" class="bgimg show" />
    <img src ="wp-content/themes/storefront-child/img/homepage-2.jpg" class="bgimg hide" />
    <img src ="wp-content/themes/storefront-child/img/homepage-3.jpg" class="bgimg hide" />
</div>    
<div id="about-page">
    <img id='about-close' src ="wp-content/themes/storefront-child/img/down-chevron.png" />
    <img id='about-img' src ="wp-content/themes/storefront-child/img/concept.jpg" />
    <div id='about-txt'>
            <?php //$id=54; $post = get_page($id); echo $post->post_content;  ?>
    </div>
</div>
</div> 
<?php wp_footer(); 
?>
</body>
</html>
	
