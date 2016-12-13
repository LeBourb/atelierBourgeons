<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */
?>

 <?php if($cur_lang == 'fr') {
     $Titre_Livraison="Livraison express";
     $Text_Livraison="en France et à l'internationale";
     $Fabrication="Fabriqué en france";
     $Paiement_Titre="Paiement sécurisé";
 }else {
     $Titre_Livraison="Express Delivery";
     $Text_Livraison="in France and abroad";
     $Fabrication="Made in france";
     $Paiement_Titre="Paiement sécurisé";
 } ?>		



 <?php //else : ?>
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
                                    <h5><?php echo $Titre_Livraison; ?></h5> 
                                        <?php echo $Text_Livraison; ?>
                                </div>
                                <div class="column column_flag">
                                    <img src="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/flag.png" alt="France flag">                                     
                                    <h5><?php echo $Fabrication;?></h5>
                                </div>
                                <div class="column">
                                    <h5><?php echo $Paiement_Titre;?></h5>
                                    <div class="footer_iconSet"> 
                                        <img src="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/payment_icon1.png" alt="VISA">                                         
                                        <img src="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/payment_icon2.png" alt="MasterCard">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_level footer_level2">
                        <div class="footer_wrap">
                            <div class="cols_3 clearfix">
                                <div class="column">
                                    <h4>
                                        <a href="#">FAQ</a>
                                    </h4>
                                    <h4>
                                        <a href="#">CGV</a>
                                    </h4>
                                    <h4>
                                        <a href="#">CONTACT</a>
                                    </h4>
                                    <h4>
                                        <a href="#">MENTIONS LéGALES</a>
                                    </h4>
                                </div>
                                <div class="column middle">
                                    <h5>suivez-nous</h5>
                                    <ul class="social_icons">
                                        <li id="facebook" href="http://www.facebook.com/share.php?u=<?php echo get_permalink () ?>" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" >
                                            <i class="fa fa-facebook fa-lg"></i>
                                        </li>
                                        <li id="twitter">
                                            <i class="fa fa-twitter fa-lg" ></i>
                                        </li>
                                        <li id="instagram">
                                            <i class="fa fa-instagram fa-lg" ></i>
                                        </li>
                                        <li id="google-plus">
                                            <i class="fa fa-google-plus fa-lg"  ></i>
                                        </li>
                                        <li id="linkedin">
                                            <i class="fa fa-linkedin fa-lg"  ></i>
                                        </li>
                                    </ul>
                                    <div style="clear:both">                                        
                                    </div>                                      
                                </div>
                                <div class="column column_info">
                                    <a>atelier Bourgeons</a><br />
                                    <a>24 rue Traversière</a><br />
                                    <a>92100, Boulogne-Billancourt</a><br />
                                    <a>FRANCE</a><br />
                                    <a>contact@atelierbourgeons.com</a><br />
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
        $cookie_notice->options['general']['message_text'] = "We use cookies to ensure that we give you the best experience on our website. If you continue without changing your settings, you consent to our cookies on this device in accordance with our cookie policy.";
    }
    //remove_action( 'wp_footer', array( $cookie_notice, 'add_cookie_notice' ), 1000 );
    wp_footer(); ?>

</body>
</html>

        
 <?php //endif; ?>
