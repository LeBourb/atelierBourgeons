<?php
/**
 * Plugin Name: Category and Taxonomy Image
 * Plugin URI: https://aftabhusain.wordpress.com/
 * Description: Category and Taxonomy Image Plugin allow you to add image with category/taxonomy.
 * Version: 1.0.0
 * Author: Aftab Husain
 * Author URI: https://aftabhusain.wordpress.com/
 * Author Email: amu02.aftab@gmail.com
 * License: GPLv2
 */


/*$options = get_option('aft_options');
$aft_taxonomies = $options['checked_taxonomies'];

if(!empty($aft_taxonomies)){
	
	foreach ($aft_taxonomies as $aft_taxonomy) {
	add_action($aft_taxonomy.'_add_form_fields','addcategoryimage');
	add_action($aft_taxonomy.'_edit_form_fields','editcategoryimage');
    }
}*/

// Add form



        
        
        /**
	 * wp_custom_attachment_save_category_fields function.
	 *
	 * @param mixed $term_id Term ID being saved
	 * @param mixed $tt_id
	 * @param string $taxonomy
	 */
        function wp_custom_attachment_save_category_fields( $term_id, $tt_id = '', $taxonomy = '' ) {
            print_r('toto is here' . $tot->tot);
            if ( isset( $_POST['product_cat_attachment_id'] ) && 'product_cat' === $taxonomy ) {
			update_woocommerce_term_meta( $term_id, 'product_cat_attachment', esc_attr( $_POST['product_cat_attachment_id'] ) );
		}
        }
        /**
	 * Edit category attachment field.
	 *
	 * @param mixed $term Term (category) being edited
	 */
	function wp_custom_edit_category_fields( $term ) {
		$attachment_id = absint( get_woocommerce_term_meta( $term->term_id, 'product_cat_attachment', true ) );
                print('attachment_id is:' . $attachment_id);
		if ( $attachment_id ) {
			$image = wp_get_attachment_thumb_url( $attachment_id );
		} else {
			$image = wc_placeholder_img_src();
		}
		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php _e( 'Sizing Guide', 'atelierbourgeons' ); ?></label></th>
			<td>
				<div id="product_cat_attachment" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" /></div>
				<div style="line-height: 60px;">
					<input type="hidden" id="product_cat_attachment_id" name="product_cat_attachment_id" value="<?php echo $attachment_id; ?>" />
					<button type="button" class="upload_attachment_button button"><?php _e( 'Upload/Add image', 'woocommerce' ); ?></button>
					<button type="button" class="remove_attachment_button button"><?php _e( 'Remove image', 'woocommerce' ); ?></button>
				</div>
				<script type="text/javascript">

					// Only show the "remove image" button when needed
					if ( '0' === jQuery( '#product_cat_attachment_id' ).val() ) {
						jQuery( '.remove_attachment_button' ).hide();
					}

					// Uploading files
					var file_frame;

					jQuery( document ).on( 'click', '.upload_attachment_button', function( event ) {

						event.preventDefault();

						// If the media frame already exists, reopen it.
						if ( file_frame ) {
							file_frame.open();
							return;
						}

						// Create the media frame.
						file_frame = wp.media.frames.downloadable_file = wp.media({
							title: '<?php _e( "Choose an image", "woocommerce" ); ?>',
							button: {
								text: '<?php _e( "Use image", "woocommerce" ); ?>'
							},
							multiple: false
						});

						// When an image is selected, run a callback.
						file_frame.on( 'select', function() {
							var attachment           = file_frame.state().get( 'selection' ).first().toJSON();
							var attachment_thumbnail = attachment.sizes.thumbnail || attachment.sizes.full;

							jQuery( '#product_cat_attachment_id' ).val( attachment.id );
							jQuery( '#product_cat_attachment' ).find( 'img' ).attr( 'src', attachment_thumbnail.url );
							jQuery( '.remove_attachment_button' ).show();
						});

						// Finally, open the modal.
						file_frame.open();
					});

					jQuery( document ).on( 'click', '.remove_attachment_button', function() {
						jQuery( '#product_cat_attachment' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
						jQuery( '#product_cat_attachment_id' ).val( '' );
						jQuery( '.remove_attachment_button' ).hide();
						return false;
					});

				</script>
				<div class="clear"></div>
			</td>
		</tr>
                <?php
        }
        
        
        /**
	 * Category thumbnail fields.
	 */
	function wp_custom_add_category_fields() {
		?>
		<div class="form-field term-display-type-wrap">
			<label for="display_type"><?php _e( 'Display type', 'woocommerce' ); ?></label>
			<select id="display_type" name="display_type" class="postform">
				<option value=""><?php _e( 'Default', 'woocommerce' ); ?></option>
				<option value="products"><?php _e( 'Products', 'woocommerce' ); ?></option>
				<option value="subcategories"><?php _e( 'Subcategories', 'woocommerce' ); ?></option>
				<option value="both"><?php _e( 'Both', 'woocommerce' ); ?></option>
			</select>
		</div>
		<div class="form-field term-attachment-wrap">
			<label><?php _e( 'Attachment', 'woocommerce' ); ?></label>
			<div id="product_cat_attachment" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" width="60px" height="60px" /></div>
			<div style="line-height: 60px;">
				<input type="hidden" id="product_cat_attachment_id" name="product_cat_attachment_id" />
				<button type="button" class="upload_image_button button"><?php _e( 'Upload/Add image', 'woocommerce' ); ?></button>
				<button type="button" class="remove_image_button button"><?php _e( 'Remove image', 'woocommerce' ); ?></button>
			</div>
			<script type="text/javascript">

				// Only show the "remove image" button when needed
				if ( ! jQuery( '#product_cat_attachment_id' ).val() ) {
					jQuery( '.remove_image_button' ).hide();
				}

				// Uploading files
				var file_frame;

				jQuery( document ).on( 'click', '.upload_image_button', function( event ) {

					event.preventDefault();

					// If the media frame already exists, reopen it.
					if ( file_frame ) {
						file_frame.open();
						return;
					}

					// Create the media frame.
					file_frame = wp.media.frames.downloadable_file = wp.media({
						title: '<?php _e( "Choose an image", "woocommerce" ); ?>',
						button: {
							text: '<?php _e( "Use image", "woocommerce" ); ?>'
						},
						multiple: false
					});

					// When an image is selected, run a callback.
					file_frame.on( 'select', function() {
						var attachment           = file_frame.state().get( 'selection' ).first().toJSON();
						var attachment_attachment = attachment.sizes.attachment || attachment.sizes.full;

						jQuery( '#product_cat_attachment_id' ).val( attachment.id );
						jQuery( '#product_cat_attachment' ).find( 'img' ).attr( 'src', attachment_attachment.url );
						jQuery( '.remove_image_button' ).show();
					});

					// Finally, open the modal.
					file_frame.open();
				});

				jQuery( document ).on( 'click', '.remove_image_button', function() {
					jQuery( '#product_cat_attachment' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
					jQuery( '#product_cat_attachment_id' ).val( '' );
					jQuery( '.remove_image_button' ).hide();
					return false;
				});

				jQuery( document ).ajaxComplete( function( event, request, options ) {
					if ( request && 4 === request.readyState && 200 === request.status
						&& options.data && 0 <= options.data.indexOf( 'action=add-tag' ) ) {

						var res = wpAjax.parseAjaxResponse( request.responseXML, 'ajax-response' );
						if ( ! res || res.errors ) {
							return;
						}
						// Clear Thumbnail fields on submit
						jQuery( '#product_cat_attachment' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
						jQuery( '#product_cat_attachment_id' ).val( '' );
						jQuery( '.remove_image_button' ).hide();
						// Clear Display type field on submit
						jQuery( '#display_type' ).val( '' );
						return;
					}
				} );

			</script>
			<div class="clear"></div>
		</div>
		<?php
	}
        
        add_action( 'edit_term',  'wp_custom_attachment_save_category_fields' ,10,3 );
add_action( 'create_term', 'wp_custom_attachment_save_category_fields', 10,3 );
add_action( 'product_cat_add_form_fields', 'wp_custom_add_category_fields' );
add_action( 'product_cat_edit_form_fields',  'wp_custom_edit_category_fields' );


?>