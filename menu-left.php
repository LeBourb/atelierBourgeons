<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    if(!is_pll_wc('cart')) { ?>
    <ul id="menu-left" class="snap-drawer snap-drawer-left" style="display:none;">
        <?php storefront_product_search(); ?>
       
            
    <li class="menu-item first" ><a href="<?php echo get_home_url(); ?>"><?php _e('Home','atelierbourgeons') ?></a></li>
    <li class="menu-item list"><a><?php _e('Shop','atelierbourgeons'); ?><i class="fa fa-chevron-down"></i></a></li>
    <li style="display:none" class="menu-item">
        <a href="<?php echo get_pll_wc_url('shop', null); ?>"> <?php _e('News','atelierbourgeons'); ?> </a>


        <?php
        $product_categories = get_terms( 'product_cat');
        foreach ( $product_categories as $woo_cat ) {
                $woo_cat_id = $woo_cat->term_id; //category ID
                $woo_cat_name = $woo_cat->name; //category name
        ?>

                <a href="<?php echo get_term_link( $woo_cat_id ,'product_cat' ); ?>"> 
                    <?php echo $woo_cat_name; ?> 
                </a>



        <?php } ?>
    </li>
    <li class="menu-item" ><a href="<?php echo get_permalink( $blog_id);?>"> <?php _e('Blog','atelierbourgeons'); ?> </a></li>
    <li class="menu-item" ><a href="<?php echo get_pll_page_by_title("Galerie17W");?>"><?php _e('17W','atelierbourgeons') ?></a></li>
    <li class="menu-item list" ><a><?php _e('About','atelierbourgeons') ?><i class="fa fa-chevron-down"></i></a></li>
    <li style="display:none" class="menu-item">
        <a href="<?php echo get_pll_page_by_title("About"); ?>"> <?php _e('About','atelierbourgeons'); ?> </a>
        <a href="<?php echo get_pll_page_by_title("Products"); ?>"> <?php _e('Our Products','atelierbourgeons'); ?> </a>        
    </li>
    <li class="menu-item list" >
        <a><?php _e('Help','atelierbourgeons') ?><i class="fa fa-chevron-down"></i>
        </a>
    </li>
    <li style="display:none" class="menu-item">
        <a href="<?php echo get_pll_page_by_title("Help") . '/#frequents-question'; ?>"> <?php _e('FAQ','atelierbourgeons'); ?> </a>
        <a href="<?php echo get_pll_page_by_title("Help") . '/#legal'; ?>"> <?php _e('Legal Notices','atelierbourgeons'); ?> </a>
        <a href="<?php echo get_pll_page_by_title("Help") . '/#shipping'; ?>"> <?php _e('Shipping','atelierbourgeons'); ?> </a>
        <a href="<?php echo get_pll_page_by_title("Help") . '/#cookies'; ?>"> <?php _e('Cookies','atelierbourgeons'); ?> </a>
        <a href="<?php echo get_pll_page_by_title("Help") . '/#payment'; ?>"> <?php _e('Payment','atelierbourgeons'); ?> </a>
    </li>
    
</ul>
    <?php }?>
