<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
                
                
	?>
    
        
        <?php echo $product->get_tags( ', ', '<span class="onsale">' . _n( '', '', $tag_count, 'woocommerce' ) . ' ', '</span>' ); ?>
           
	
        <div class="summary entry-summary">

            <ul class="share-product" >
                <li id="facebook" href="http://www.facebook.com/share.php?u=<?php echo get_permalink () ?>" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" >
                     <img src="<?php echo get_site_url ( )?>/wp-content/themes/atelierbourgeons/icons/facebook.png"  />
                </li>
                <li id="twitter"><img src="<?php echo get_site_url ( )?>/wp-content/themes/atelierbourgeons/icons/twitter.png" /></li>
                <li id="instagram"><img src="<?php echo get_site_url ( )?>/wp-content/themes/atelierbourgeons/icons/instagram.png" /></li>
            </ul>
		<?php
			
                        // Le titre                        
                        woocommerce_template_single_title();
                
                        /**
                         * Le but est de mettre Titre du produit > Prix > Description > Achat
                         */
                        do_action( 'woocommerce_after_single_product_summary' );
                        
                        // Là on va afficher les attributes/
                        // matériel, couleur ...                         
                        ?>
            
<table class="lisTable" border="0" cellpadding="0" cellspacing="0">
  <colgroup><col class="lisTableItems">
  <col class="lisTableText">
  </colgroup><tbody><tr>
    <th>material</th>
    <td><span><?php echo $product->get_attribute('material'); ?></span></td>
  </tr>
  <tr>
    <th>colour</th>
    <td><?php echo $product->get_attribute('colour'); ?></td>
  </tr>
  <tr>
    <th>SIZE (cm)</th>
    <td><?php echo $product->get_attribute('size'); ?></td>
  </tr>
</tbody></table>
            
            <?php
                        
                        /**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );     
                
                       
		?>

	</div><!-- .summary -->

	<?php
		
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
