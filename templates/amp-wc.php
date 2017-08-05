<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); ?>>
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
            #container {
                max-width: 500px;
                padding: 1px 16px 64px 16px;
                margin: auto;
                background: white;
            }
            .amp-wc-add-to-cart-button a {
                background: black;
                color: #fff;
                padding: 7px 20px;
                text-decoration: none;
                border-radius: 5px;
            }
            #header {
                padding: 5px;
                margin: 0;
                background:white;
            } 
            .mdl-color-text--white {
                color: #fff;
            } 
            .mdl-color--black {
                background-color: #000;
            }
            .site-logo {
                width: 100px;        
                margin-left: auto;
                margin-right: auto;
            }
            .site-logo svg {
                width: 100%; 
                height: 100%; 
                display: inline; 
            }            
            .redirect {
                position: absolute;
                top: 60px;
                right: 20px;    
                background-color: white;
                color: black;
                outline: none;
                z-index: 100;
                cursor:pointer;
            }
            #body {
                background: lightgrey;
            }
            
           <?php //$this->load_parts( array( 'style' ) ); ?>
            <?php do_action( 'amp_post_template_css', $this ); ?>
            <?php do_action( 'amp_post_wc_specific_template_css', $this ); ?>
            
	</style>
</head>

<body id="body" class="<?php echo esc_attr( $this->get( 'body_class' ) ); ?>">

<?php //$this->load_parts( array( 'header-bar' ) );

?>
    <header id="header">
<div class="site-logo">
                                   <!--<img src="<?php //echo esc_url( home_url( '/wp-content/themes/atelierbourgeons/icons/atelier_bourgeons.bmp' ) ); ?>"></div> -->
                                <?php require __DIR__.'/../svg-logo.php'?>
                            </div>
        </header>
<div id="container">

	

		

	<?php //$this->load_parts( array( 'featured-image' ) ); ?>

	<div class="amp-wp-article-content">
		<h2 class="amp-wp-title"><?php echo wp_kses_data( $this->get( 'post_title' ) ); ?></h2>
		<?php do_action('amp_woocommerce_before_the_content'); ?>
		<?php do_action('amp_woocommerce_after_the_content'); ?>
                <?php echo $this->get( 'post_amp_content' ); // amphtml content; no kses ?>
                <?php $this->load_parts( apply_filters( 'amp_post_article_header_meta', array( ) ) ); ?>

	</div>

	<footer class="amp-wp-article-footer">
		<?php $this->load_parts( apply_filters( 'amp_post_article_footer_meta', array( ) ) ); ?>
	</footer>

</div>
    
    <a href="<?php global $wp; $current_url = home_url(add_query_arg(array(),$wp->request)); echo chop($current_url,'/amp')?>"><button class="redirect">atelier Bourgeons</button></a>

<?php //$this->load_parts( array( 'footer' ) ); ?>

<?php //do_action( 'amp_post_template_footer', $this ); ?>

</body>
</html>