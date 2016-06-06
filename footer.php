<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */
?>

 <?php// if(is_front_page())</body></html> : ?>		



 <?php //else : ?>
        		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit - 20
			 */
                        if(is_front_page)
                            remove_action( 'storefront_footer',                  'storefront_handheld_footer_bar',         999 );
			do_action( 'storefront_footer' ); ?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

        
 <?php //endif; ?>
