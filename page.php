<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

 ?>


 <?php if(is_front_page()) : ?>		
 
 <?php
	/**
	 * @hooked storefront_header_widget_region - 10
	 */
	 get_header();
	 $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
	do_action( 'storefront_before_content' ); ?>

	   

<?php //wp_footer(); 
?>
	

 <?php else : get_header();	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				do_action( 'storefront_page_before' );
				?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
				/**
				 * @hooked storefront_display_comments - 10
				 */
				do_action( 'storefront_page_after' );
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //do_action( 'storefront_sidebar' ); ?>
<?php get_footer(); ?>
<?php endif; ?>