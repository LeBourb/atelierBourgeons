<?php
/**
 * @package storefront
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/BlogPosting" style="display:none">

	<?php
	/**
	 * @hooked storefront_post_header - 10
	 * @hooked storefront_post_meta - 20
	 * @hooked storefront_post_content - 30
	 */
	storefront_post_content();
	?>

</article><!-- #post-## -->
