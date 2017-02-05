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

add_action('product_tag'.'_add_form_fields','addcategoryimage');
add_action('product_tag'.'_edit_form_fields','editcategoryimage');

//Function to add category/taxonomy image
function addcategoryimage($taxonomy){ ?>
    <div class="form-field term-thumbnail-wrap">
			<label><?php _e( 'Thumbnail', 'woocommerce' ); ?></label>
			<div id="product_tag_thumbnail" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" width="60px" height="60px" /></div>
			<div style="line-height: 60px;">
				<input type="hidden" id="product_tag_thumbnail_id" name="product_tag_thumbnail_id" />
				<button type="button" class="upload_image_button button"><?php _e( 'Upload/Add image', 'woocommerce' ); ?></button>
				<button type="button" class="remove_image_button button"><?php _e( 'Remove image', 'woocommerce' ); ?></button>
			</div>
			<script type="text/javascript">

				// Only show the "remove image" button when needed
				if ( ! jQuery( '#product_tag_thumbnail_id' ).val() ) {
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
						var attachment = file_frame.state().get( 'selection' ).first().toJSON();

						jQuery( '#product_tag_thumbnail_id' ).val( attachment.id );
						jQuery( '#product_tag_thumbnail' ).find( 'img' ).attr( 'src', attachment.sizes.thumbnail.url );
						jQuery( '.remove_image_button' ).show();
					});

					// Finally, open the modal.
					file_frame.open();
				});

				jQuery( document ).on( 'click', '.remove_image_button', function() {
					jQuery( '#product_tag_thumbnail' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
					jQuery( '#product_tag_thumbnail_id' ).val( '' );
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
						jQuery( '#product_tag_thumbnail' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
						jQuery( '#product_tag_thumbnail_id' ).val( '' );
						jQuery( '.remove_image_button' ).hide();
						// Clear Display type field on submit
						jQuery( '#display_type' ).val( '' );
						return;
					}
				} );

			</script>
			<div class="clear"></div>

<?php }//aft_script_css(); }


//Function to edit category/taxonomy image
function editcategoryimage($taxonomy){ 
    $display_type = get_woocommerce_term_meta( $taxonomy->term_id, 'display_type', true );
		$thumbnail_id = absint( get_woocommerce_term_meta( $taxonomy->term_id, 'thumbnail_id', true ) );
                    
		if ( $thumbnail_id ) {
			$image = wp_get_attachment_thumb_url( $thumbnail_id );
		} else {
			$image = wc_placeholder_img_src();
		}?>

			<th scope="row" valign="top"><label><?php _e( 'Thumbnail', 'woocommerce' ); ?></label></th>
			<td>
				<div id="product_tag_thumbnail" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" /></div>
				<div style="line-height: 60px;">
					<input type="hidden" id="product_tag_thumbnail_id" name="product_tag_thumbnail_id" value="<?php echo $thumbnail_id; ?>" />
					<button type="button" class="upload_image_button button"><?php _e( 'Upload/Add image', 'woocommerce' ); ?></button>
					<button type="button" class="remove_image_button button"><?php _e( 'Remove image', 'woocommerce' ); ?></button>
				</div>
				<script type="text/javascript">

					// Only show the "remove image" button when needed
					if ( '0' === jQuery( '#product_tag_thumbnail_id' ).val() ) {
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
							var attachment = file_frame.state().get( 'selection' ).first().toJSON();

							jQuery( '#product_tag_thumbnail_id' ).val( attachment.id );
							jQuery( '#product_tag_thumbnail' ).find( 'img' ).attr( 'src', attachment.sizes.thumbnail.url );
							jQuery( '.remove_image_button' ).show();
						});

						// Finally, open the modal.
						file_frame.open();
					});

					jQuery( document ).on( 'click', '.remove_image_button', function() {
						jQuery( '#product_tag_thumbnail' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
						jQuery( '#product_tag_thumbnail_id' ).val( '' );
						jQuery( '.remove_image_button' ).hide();
						return false;
					});

				</script>
				<div class="clear"></div>
			
<?php }//aft_script_css(); }

//edit_$taxonomy
add_action('edit_term','categoryimagesave');
add_action('create_term','categoryimagesave');
function categoryimagesave($term_id){
    if(isset($_POST['tag-image'])){
        if(isset($_POST['tag-image']))
            update_option('_category_image'.$term_id,$_POST['tag-image'] );
    }
    if ( isset( $_POST['product_tag_thumbnail_id'] )) {
            update_woocommerce_term_meta( $term_id, 'thumbnail_id', absint( $_POST['product_tag_thumbnail_id'] ) );
    }
    
}

?>