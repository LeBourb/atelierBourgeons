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

<div itemscope itemtype="" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
                
                
	?>
    
        
        
           
	
        <div class="summary entry-summary">
            <li class="tags-product">
            <?php 

                $tags =  get_the_terms($product->get_id(),'product_tag');
                foreach ( $tags as $tag ) {
                    if( !startsWith($tag->name,'['  ) && !endsWith($tag->name , ']' ) ) {
                        echo '<span class="product-tags">' . $tag->name . '</span>' ; 
                    }
                }
            ?>
            </li>
            <?php
                // Le titre                        
                the_title( '<h1 class="product_title entry-title">', '</h1>' );
            ?>
            <ul class="share-product" >
                
                <li id="facebook" href="http://www.facebook.com/share.php?u=<?php echo get_permalink () ?>" onclick="window.open(this.getAttribute('href'), 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" >
                     <img src="<?php echo get_site_url ( )?>/wp-content/themes/atelierbourgeons/icons/facebook.png"  />
                </li>
                <li id="twitter" href="https://twitter.com/intent/tweet?text=<?php echo "atelier Bourgeons - " . $product->get_title(); ?>&url=<?php echo get_permalink () ?>" onclick="window.open(this.getAttribute('href'), 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><img src="<?php echo get_site_url ( )?>/wp-content/themes/atelierbourgeons/icons/twitter.png" /></li>                
            </ul>
		<?php
			
                                       
                        /**
                         * Le but est de mettre Titre du produit > Prix > Description > Achat
                         */
                        woocommerce_template_single_add_to_cart();
                        add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
                        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
                        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
                        do_action( 'woocommerce_after_single_product_summary' );
                        
                        // Là on va afficher les attributes/
                        // matériel, couleur ...                         
                        ?>
            
<table class="lisTable" border="0" cellpadding="0" cellspacing="0">
  <colgroup><col class="lisTableItems">
  <col class="liswTableText">
  </colgroup><tbody class="shop-attribute">
      <?php
      
      global $product;
      
use Hyyan\WPI\Utilities;

$attributes = Utilities::getProductTranslationByObject($product,'fr')->get_attributes();

foreach ( $attributes as $attribute ) :
		if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
			continue;
		} else {
			$has_row = true;
		}
                
		?>
        
		<tr>
			<th><?php echo esc_html__( wc_attribute_label( $attribute['name'] ), 'atelierbourgeons' );?></th>
			<td><span><?php
                                
				if ( $attribute['is_taxonomy']) {

					//$values = wc_get_product_terms( Utilities::getProductTranslationByObject($product,'fr')->get_id(), $attribute['name'], array( 'fields' => 'ids', 'order_by' => 'menu_order' ) );
                                        $values = wp_get_post_terms( Utilities::getProductTranslationByObject($product,'fr')->get_id(), $attribute['name'], array( 'fields' => 'ids', 'order_by' => 'menu_order' ) );
                                        $pll_values = array();
                                        foreach ( $values as $value ) :                                                    
                                            array_push ( $pll_values , get_pll_term($value) );
                                        endforeach;
                                        $values = $pll_values;
                                        
					if(count($values)>1 && in_array("TABLE",$values)) {
                                               $index = array_search("TABLE", $values);
                                               unset($values[$index]);
                                               echo '<table class="dimensions"><tr class="dimension">';
                                               $attrs = array();
                                               $vals = array();
                                               foreach ( $values as $value ) :                                                                                                       
                                                   $att = explode(':',$value);
                                                   array_push($attrs, $att[0]);
                                                   array_push($vals , $att[1]);
                                                   endforeach;
                                               foreach($attrs as $attr) : 
                                                   echo '<td>' . $attr . '</td>';
                                               endforeach;
                                               echo '</tr><tr class="dimension">';
                                               foreach($vals as $val) : 
                                                   echo '<td>' . $val . '</td>';
                                               endforeach;
                                               echo '</tr>';
                                               echo '</table>';
                                        } else {
                                            echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $pll_values ) ) ), $attribute, $pll_values );                                            
                                        }
                                        //print_r($values);
                                        //explode ( ',' ,  );

				} else {
                                        //print_r($values);
					// Convert pipes to commas and display values
					$values = array_map( 'trim', explode( WC_DELIMITER, $attribute['value'] ) );
					echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

				}
			?></span></td>
		</tr>
	<?php endforeach; ?>
  
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
            
            if(pll_current_language() == 'jp') {
            }else {                
            }
            $rate = get_rate_eurjpy();
            if(pll_current_language() == 'ja') {
                $product->set_price( EURToJPY($product->get_price()) ); 
            }
                         remove_filter('woocommerce_single_product_summary','woocommerce_template_single_title',5);
			do_action( 'woocommerce_single_product_summary' );     
                
                       
		?>

	</div><!-- .summary -->

	<?php
		
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
