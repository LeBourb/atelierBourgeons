<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//if(!is_pll_wc('cart')) { 
?>
<div id="menu-right" class="snap-drawer snap-drawer-right" style="display:none; z-index:1;">
   <?php  
        $user_info = get_userdata(1);
        if(is_user_logged_in()) {
          echo '<li class="menu-item"><a style="text-align:center;">' . $user_info->user_login . '</a></li>';
        }
        if(WC()->cart->get_cart_contents_count() == 0)
            echo '<li class="menu-item"><a href="' . get_pll_wc_url( 'cart', null) . '" data-cartquantity=""> ' . __('Cart','atelierbourgeons') . '(' . WC()->cart->get_cart_contents_count() . ')' . '</a></li>';
        else 
            the_widget( 'WC_Widget_Cart', 'title=' );
        
      

        //get_signin();
        if (is_user_logged_in()) {  

          echo '<li class="menu-item"><a href="'. get_pll_wc_url( 'myaccount', null ) .'">' . __('Account','atelierbourgeons') . '</a></li>';
          echo '<li class="menu-item"><a href="'. wp_logout_url(get_permalink( wc_get_page_id( 'myaccount' ) )) .'">' . __('Log Out','atelierbourgeons') . '</a></li>';
        }
        elseif (!is_user_logged_in()) {
          echo '<li class="menu-item"><a href="'. get_pll_wc_url( 'myaccount', null ) .'">' . __('Log In','atelierbourgeons') . '</a></li>';        
        }
        /*
        echo '<div class="langue-menu">';
        if( $cur_lang != 'fr') {
              echo '<li><a href="'. $url_fr .'">Français</a></li>';
        }
        if($cur_lang != 'en') {
             echo '<li><a href="'. $url_en .'">English</a></li>';
        }
        if($cur_lang != 'jp') {
              echo '<li><a href="'. $url_jp .'">日本語</a></li>';
        }
        echo '</div>';*/
                ?>
 </div>