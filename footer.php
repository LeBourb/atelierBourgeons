<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>
       		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">
                    
			<?php
			/**
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit - 20
			 */
                        //if(is_front_page())
                            //remove_action( 'storefront_footer', 'storefront_handheld_footer_bar', 999 );
			//do_action( 'storefront_footer' ); ?>
                    
                    <div class="footer_level footer_level1">
                        <div class="footer_wrap">
                            <div class="cols_3 clearfix">
                                <div class="column">
                                    <h5><?php _e('Express Delivery','atelierbourgeons'); ?></h5>                                    
                                </div>
                                <div class="column column_flag">
                                    <img src="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/flag.png" alt="France flag">                                     
                                    <h5><?php _e('Made in France','atelierbourgeons'); ?></h5>
                                    
                                </div>
                                <div class="column">
                                    <h5><?php _e('Secure payment','atelierbourgeons');?></h5>
                                    <div class="footer_iconSet"> 
                                        <img src="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/payment_icon1.png" alt="VISA">                                         
                                        <img src="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/payment_icon2.png" alt="MasterCard">
                                        <img src="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/payment_icon3.png" alt="American Express">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_level footer_level2">
                        <div class="footer_wrap">
                            <div class="cols_3 clearfix">
                                <div class="column">
                                    <h5>
                                        <a href="<?php echo get_pll_page_by_title("Help") . "/#frequent-questions"  ;  ?>"><?php _e('FAQ','atelierbourgeons');?></a>
                                    </h5>
                                    <h5>
                                        <a href="<?php echo get_pll_page_by_title("Legal Mentions") ;  ?>"><?php _e('Legal Notices','atelierbourgeons');?></a>
                                    </h5>
                                    <h5>
                                        <a href="<?php echo get_pll_page_by_title("Help") . "/#shipping"  ;  ?>"><?php _e('Shipping','atelierbourgeons');?></a>
                                    </h5>
                                    <h5>
                                        <a href="<?php echo get_pll_page_by_title("Help") . "/#cookies"  ;  ?>"><?php _e('Cookies','atelierbourgeons');?></a>
                                    </h5>
                                    <h5>
                                        <a href="<?php echo get_pll_page_by_title("Help") . "/#payment"  ;  ?>"><?php _e('Secure payment','atelierbourgeons');?></a>
                                    </h5>
                                </div>
                                <div class="column middle">
                                    <i class="fa fa-globe"></i>
                                    <?php
                                    echo '<select onChange="window.location.href=this.value">';
                                        if(pll_current_language() == 'fr') {
                                            echo '<option selected value="' . get_permalink(pll_get_post(get_the_ID() , 'fr')) . '" >FRANCE</option>';
                                            echo '<option  value="' . get_permalink(pll_get_post(get_the_ID() , 'ja')) . '">日本</option>';
                                        }else if (pll_current_language() == 'ja') {
                                            echo '<option selected  value="' . get_permalink(pll_get_post(get_the_ID() , 'ja')) . '">日本</option>';
                                            echo '<option  value="' . get_permalink(pll_get_post(get_the_ID() , 'fr')) . '" >FRANCE</option>';
                                        }                                       
                                        echo '</select>';
                                    ?>
                                    <h5><?php _e('Follow us','atelierbourgeons');?></h5>
                                    <ul class="social_icons">
                                        <li id="facebook" href="https://www.facebook.com/atelierbourgeons/" onclick="window.open(this.getAttribute('href'), 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" >
                                            <a class="fa fa-facebook fa-lg"></a>
                                        </li>
                                        <li id="instagram">
                                            <a class="fa fa-instagram fa-lg" href="https://www.instagram.com/atelier_bourgeons/" ></a>
                                        </li>
                                    </ul>
                                    <div style="clear:both">                                        
                                    </div>                                      
                                </div>
                                <div class="column column_info">
                                    <?php _e('Contact address mail','atelierbourgeons');?>                                    
                                </div>
                            </div>
                        </div>
                    </div>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php 
    //remove_action();
    global $cookie_notice;
    if(pll_current_language() == 'en' && $cookie_notice) {                
        $cookie_notice->options['general']['message_text'] = __('Cookie Notice','atelierbourgeons');
    }
    //remove_action( 'wp_footer', array( $cookie_notice, 'add_cookie_notice' ), 1000 );
    wp_footer(); ?>

</body>
</html>

        
 <?php //endif; ?>
