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

			<?php 
                            if(is_pll_wc('shop')) {
                                /*wc_get_template('content-product.php', array(
					'category' => 'NEW'
				));*/
                               ?><ul class="products cd-tabs-content">
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 12
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</ul><!--/.products--><?php
                            }else {
                                
                            
                            while ( have_posts() ) : the_post(); ?>

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

                            <?php endwhile; }// end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php //do_action( 'storefront_sidebar' ); ?>
<?php get_footer(); ?>
<?php endif; ?>