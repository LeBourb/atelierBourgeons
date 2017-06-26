<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


			
                add_filter( 'woocommerce_add_cart_item',  'add_cart_item' , 20, 1 );
                
                // Load cart data per page load
                add_filter( 'woocommerce_get_cart_item_from_session', 'get_cart_item_from_session' , 20, 2 );

                // Get item data to display
                //add_filter( 'woocommerce_get_item_data',  'add_cart_item' , 5, 1 );
                add_filter( 'woocommerce_get_item_data',  'get_item_data' , 10, 2 );

                // Add item data to the cart
                add_filter( 'woocommerce_add_cart_item_data',  'add_to_cart_product' , 10, 2 );

                // Validate when adding to cart
                add_filter( 'woocommerce_add_to_cart_validation',  'validate_add_cart_product' , 10, 3 );

                // Add meta to order
                add_action( 'woocommerce_add_order_item_meta',  'order_item_meta' , 10, 2 );

                add_filter( 'woocommerce_cart_item_price', 'cart_item_price', 10, 3 );
                function cart_item_price( $price, $cart_item, $cart_item_key ) {

                    return wc_price($cart_item[ 'data' ]->price);
                }
                
                

add_filter( 'woocommerce_cart_item_subtotal', 'cart_item_subtotal', 10, 3 );
function cart_item_subtotal( $subtotal, $cart_item, $cart_item_key ) {

    if ( $cart_item[ 'data' ]->price == 0 ) {
        $subtotal = __( 'To be determined', 'yourtheme' );
    }

   return wc_price($cart_item[ 'data' ]->price);//EURToJPY($cart_item[ 'data' ]->price));
}


function atelierb_package_rates( $rates, $package ) {
	//$destination = $package['destination'];
	//$country     = $destination['country'];
        //print_r($rates);
	// Make sure flat rate is available
	//if ( isset( $rates['flat_rate'] ) ) {
		// Check if the customer is in the United States or Canada
		//if ( $country == 'US' || $country == 'CA' ) {
			// Set flat rate to cost $10 more
			//$rates['flat_rate']->cost = $rates['flat_rate']->cost + 10;
		//}
	//}
    //print_r($rates);
    if(pll_current_language() == 'ja') { 
        foreach ($rates as $key => $value){
        //commandes
            if(substr( $key, 0, 9 ) === "flat_rate" ) {
                $rates[$key]->cost = EURToJPY($rates[$key]->cost);                   
            }
            /*else if ( substr( $key, 0, 13 ) === "free_shipping" ) {
                $rates[ $key ]->get_option('min_amount', EURToJPY($rates[ $key ]->get_option( 'min_amount')) );
            }*/
        }
       
    }

	return $rates;
}

add_filter( 'woocommerce_package_rates', 'atelierb_package_rates', 10, 2 );

		
		function add_to_cart_product( $cart_item_data,$product_id ) {
				
				if ( empty( $cart_item_data['options'] ) ) {
					
					$cart_item_data['options'] = array();
					
				}
				
				$array_options  = (array) get_post_meta( $product_id, '_product_custom_options', true );
				
					foreach ( $array_options as $options_key => $options ) {
						
						$val_post = $_POST['custom-options'][sanitize_title( $options['name'] )];
						
						$val_post = str_replace('\"','"',$val_post);
						$val_post = str_replace("\'","'",$val_post);
						
						if($val_post != '')
						{
							$data[] = array(
								'name'  => $options['label'],
								'value' => $val_post,
								'price' => $options['price']
							);
							
							$cart_item_data['options'] =  $data;
						}
						
					}
					//$cart_item_data->set_price('10000');
                                        //$cart_item_data = add_cart_item($cart_item_data);
					return $cart_item_data;
					
		}
			
		function validate_add_cart_product(  $passed, $product_id, $quantity ) {
			 $logger = new WC_Logger();                    
                    //$message = "passed: " + $passed + ",productId: " + $product_id + ",quantity: " + $quantity;
                    
                    //$logger->add('options_send',"add_cart_item: " + $cart_item_data );
			global $woocommerce;
			
			$array_options  = (array) get_post_meta( $product_id, '_product_custom_options', true );
                        
			
				foreach ( $array_options as $options_key => $options ) {
					
						
						$post_data =  $_POST['custom-options'][sanitize_title( $options['name'] )];
						
						if( $options['required'] == 1  )
						{
                                                    $logger->add('options_send',"options is required");
							if ( $post_data == "" && strlen( $post_data ) == 0 ) {
								
								$data = new WP_Error( 'error', sprintf( __( '"%s" is a required field.', 'atelierbourgeons' ), $options['label'] ) );
								
									wc_add_notice( $data->get_error_message(), 'error' );
									
									$data_msg = 1;
							}
							
						}
                                                 
						if ( strlen( $post_data ) > $options['max']) {
                                                   
							
							$data = new WP_Error( 'error', sprintf( __( 'The maximum allowed length for "%s" is %s letters.', 'atelierbourgeons' ), $options['label'], $options['max'] ) );
							
							wc_add_notice( $data->get_error_message(), 'error' );
							
							$data_msg = 1;
						}
						
				}
				
				if($data_msg == 1)
				{
					return false;
				}
						
				return $passed;
					
		}
		
		function get_item_data( $other_data, $cart_item_data ) {
			
			if ( ! empty( $cart_item_data['options'] ) ) {
				
				foreach ( $cart_item_data['options'] as $options ) {
									
					$name = $options['name'];

					if ( $options['price'] > 0 ) {
						
						$name .= ' (' . woocommerce_price( get_product_addition_options_price ( $options['price'] ) ) . ')';
					
					}

					$other_data[] = array(
						'name'    => $name,
						'value'   => $options['value'],
						'display' => ''
					);
				}
			}
			return $other_data;
		}
		

		function add_cart_item($cart_item_data) {
                    //$logger = new WC_Logger();
                    //$logger->add('options_send',"Hello World!!");
                    
		
			if ( ! empty( $cart_item_data['options'] ) ) {

				$extra_cost = 0;

				foreach ( $cart_item_data['options'] as $options ) {
					
					if ( $options['price'] > 0 ) {
						
						$extra_cost += $options['price'];
						
					}
				}
                                

				$cart_item_data['data']->adjust_price( $extra_cost );
			}
                        
                        //$cart_item_data['data']->adjust_price('10000');
                        $product           = $cart_item_data['data'];
                        if(pll_current_language() == 'ja') { 
                            $product->set_price(EURToJPY($cart_item_data['data']->price));
                        }
                        
			return $cart_item_data;
		}


		function get_cart_item_from_session($cart_item_data, $values) {
			
			if ( ! empty( $values['options'] ) ) {
				
				$cart_item_data['options'] = $values['options'];
				
				$cart_item_data = add_cart_item( $cart_item_data );
				
			}
                        $cart_item_data = add_cart_item($cart_item_data);
			return $cart_item_data;
		}

		

		function order_item_meta($item_id,$values) {
					
			if ( ! empty( $values['options'] ) ) {
				
				foreach ( $values['options'] as $options ) {

					$name = $options['name'];

					if ( $options['price'] > 0 ) {
						
						$name .= ' (' . woocommerce_price( get_product_addition_options_price( $options['price'] ) ) . ')';
					}

					  woocommerce_add_order_item_meta( $item_id, $name, $options['value'] );
					
				}
			}
			
		}
		
		function get_product_addition_options_price( $price ) {
			
			global $product;

			if ( $price === '' || $price == '0' ) {
				
				return;
				
			}

			if ( is_object( $product ) ) {
				
				$tax_display_mode = get_option( 'woocommerce_tax_display_shop' );
				
				$display_price    = $tax_display_mode == 'incl' ? $wc_get_price_excluding_tax( $product,array('qty'=> 1,'price' => $price)) : $wc_get_price_excluding_tax( $product,array('qty'=> 1,'price' => $price));
			
			} else {
				
				$display_price = $price;
				
			}

			return $display_price;
		}

?>