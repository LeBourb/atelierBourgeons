<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// define the woocommerce_countries_shipping_countries callback 
function atelierb_woocommerce_countries_shipping_countries( $countries ) { 
    // make filter magic happen here... 
    $countries = array('JP');
    return $countries; 
}; 
         
// add the filter 
//add_filter( 'woocommerce_countries_shipping_countries', 'atelierb_woocommerce_countries_shipping_countries', 10, 1 ); 

?>