<?php
/**
 * @package storefront
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/BlogPosting">

	<?php
	/**
	 * @hooked storefront_post_header - 10
	 * @hooked storefront_post_meta - 20
	 * @hooked storefront_post_content - 30
	 */
        remove_action('storefront_single_post','storefront_post_header',10);
        remove_action( 'storefront_single_post',		'storefront_child_post_header',		10 );
        remove_action( 'storefront_single_post',		'storefront_post_meta',		20 );
	do_action( 'storefront_single_post' );
	?>
     
<ul class="share-product" >
     
     <li id="facebook" href="http://www.facebook.com/share.php?u=<?php echo get_permalink () ?>" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" >
         <i class="fa fa-facebook fa-lg"></i>
       </li>
       <li id="twitter" href="https://twitter.com/intent/tweet?text=<?php echo "atelier Bourgeons - " . wp_title() ?>&url=<?php echo get_permalink () ?>" onclick="window.open(this.getAttribute('href'), 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;">
           <i class="fa fa-twitter fa-lg" ></i>
       </li>            
       <li id="google-plus" href="https://plus.google.com/share?url=<?php echo get_permalink () ?>" onclick="window.open(this.getAttribute('href'), 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;">
           <i class="fa fa-google-plus fa-lg"  ></i>
       </li>
       <li id="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink (); ?>&title=<?php wp_title(); ?>&source=atelier Bourgeons" onclick="window.open(this.getAttribute('href'), 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;">
           <i class="fa fa-linkedin fa-lg"  ></i>
       </li>
  </ul>
</article><!-- #post-## -->
 