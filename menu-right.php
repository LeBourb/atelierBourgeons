<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!is_pll_wc('cart')) { 
?>
<div id="menu-right" class="snap-drawer snap-drawer-right" style="display:none;">
     
          <li class="menu-item"><a href="<?php echo get_pll_wc_url( 'cart', null);?>" data-cartquantity=""><?php _e('Cart','atelierbourgeons');?> (<?php echo WC()->cart->get_cart_contents_count(); ?>)</a></li>
      
      <?php  
      //get_signin();
      if (is_user_logged_in()) {
          $user_info = get_userdata(1);

          echo '<li class="menu-item"><a>' . $user_info->user_login . '</a></li>';
          echo '<li class="menu-item"><a href="'. wp_logout_url(get_permalink( wc_get_page_id( 'myaccount' ) )) .'">' . __('Log Out','atelierbourgeons') . '</a></li>';
        }
        elseif (!is_user_logged_in()) {
          echo '<li class="menu-item"><a href="'. get_pll_wc_url( 'myaccount', null ) .'">' . __('Log In','atelierbourgeons') . '</a></li>';        
        }
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
        echo '</div>';
                ?>
 </div>
<?php } ?>