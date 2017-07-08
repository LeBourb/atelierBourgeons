<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    //if(!is_pll_wc('cart')) { ?>
    <div id="menu-left" class="snap-drawer snap-drawer-left" style="display:none; z-index:1;">

      <?php storefront_product_search(); ?>
       
            
    <li class="menu-item first" ><a href="<?php echo get_home_url(); ?>"><?php _e('Home','atelierbourgeons') ?></a></li>
    

<li class="menu-item list" ><a><?php _e('Shop','atelierbourgeons') ?><i class="fa fa-chevron-down"></i></a></li>
<div style="display:none;">
        <?php
        $parent_cats = array();
        $product_categories = get_terms(  array( 'taxonomy' => 'product_cat') );//'product_cat');
        foreach ( $product_categories as $woo_cat ) {
                $woo_cat_id = $woo_cat->term_id; //category ID
                $woo_cat_name = $woo_cat->name; //category name


        // gets an array of all parent category levels
        $product_parent_categories_all_hierachy = get_ancestors( $woo_cat_id , 'product_cat' );  

        // This cuts the array and extracts the last set in the array
        $last_parent_cat = array_slice($product_parent_categories_all_hierachy, -1, 1, true);        
        foreach($last_parent_cat as $last_parent_cat_value){
            // $last_parent_cat_value is the id of the most top level category, can be use whichever one like                        
            if (!in_array($last_parent_cat_value, $parent_cats)) {               
               array_push($parent_cats, $last_parent_cat_value);
               $parent_cat_name = get_term( $last_parent_cat_value, 'product_cat' )->name;
               echo '<li class="menu-item list level-2" ><a href="#">' . $parent_cat_name . '<i class="fa fa-chevron-down"></i></a></li>';
               $args = array(
                   'hierarchical' => 1,
                   'show_option_none' => '',
                   'hide_empty' => 0,
                   'parent' => $last_parent_cat_value,
                   'taxonomy' => 'product_cat'
                );
                $subcats = get_categories($args);
                echo '<div style="display:none">';
                foreach ($subcats as $sc) {
                  $link = get_term_link( $sc->slug, $sc->taxonomy );
                    echo '<li class="menu-item level-3" ><a href="'. $link .'">'.$sc->name.'</a></li>';
                }
                echo '</div>';
               
               // display the parent category
            }
        }       
    } 
?>
</div>

    <li class="menu-item" ><a href="<?php echo get_permalink( $blog_id);?>"> <?php _e('Blog','atelierbourgeons'); ?> </a></li>
    <?php $pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'galerie-17w.php'
            ));            
            foreach($pages as $page){
                // Check if page is in the current language. 
                if( pll_get_post_language($page->ID) == pll_current_language() ) {
                     echo '<li class="menu-item" ><a href="' . get_page_link($page->ID) . '">' . get_the_title( $page ) . '</a></li>';
                }
            }
            $pages_s = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'galerie-17s.php'
            ));            
            foreach($pages_s as $page){
                // Check if page is in the current language. 
                if( pll_get_post_language($page->ID) == pll_current_language() ) {
                     echo '<li class="menu-item" ><a href="' . get_page_link($page->ID) . '">' . get_the_title( $page ) . '</a></li>';
                }
            }
    ?>   
    <li class="menu-item list" ><a><?php _e('About','atelierbourgeons') ?><i class="fa fa-chevron-down"></i></a></li>
    <div style="display:none">
        <li class="menu-item"><a href="<?php echo get_pll_page_by_title("About"); ?>"> <?php _e('About','atelierbourgeons'); ?> </a></li>
        <li class="menu-item"><a href="<?php echo get_pll_page_by_title("Products"); ?>"> <?php _e('Our Products','atelierbourgeons'); ?> </a></li>
    </div>
    <li class="menu-item list" >
        <a><?php _e('Help','atelierbourgeons') ?><i class="fa fa-chevron-down"></i>
        </a>
    </li>
    <div style="display:none" >
        <li class="menu-item"><a href="<?php echo get_pll_page_by_title("Help") . '/#frequents-question'; ?>"> <?php _e('FAQ','atelierbourgeons'); ?> </a></li>
        <li class="menu-item"><a href="<?php echo get_pll_page_by_title("Help") . '/#legal'; ?>"> <?php _e('Legal Notices','atelierbourgeons'); ?> </a></li>
        <li class="menu-item"><a href="<?php echo get_pll_page_by_title("Help") . '/#shipping'; ?>"> <?php _e('Shipping','atelierbourgeons'); ?> </a></li>
        <li class="menu-item"><a href="<?php echo get_pll_page_by_title("Help") . '/#cookies'; ?>"> <?php _e('Cookies','atelierbourgeons'); ?> </a></li>
        <li class="menu-item"><a href="<?php echo get_pll_page_by_title("Help") . '/#payment'; ?>"> <?php _e('Payment','atelierbourgeons'); ?> </a></li>
    </div>
    
</div>
