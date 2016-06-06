<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */ 
    //get_header(); 
?>

<html <?php language_attributes(); ?> <?php /*storefront_html_tag_schema();*/ ?>>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<div class="overlay-loader show" id="loader" style="position: fixed; top: 0px; right: 0px; bottom: 0px; left: 0px; width: 100%;">
    <div style="position: absolute; top: 0px; right: 0px; bottom: 0px; left: 0px; background-color: rgb(255, 255, 255); display: block;" class="loader-background"></div>
    <svg version="1.1" class="loader-icon spinning-cog" data-cog="cog06" id="cog6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="96px" height="96px" viewBox="0 0 96 96" enable-background="new 0 0 96 96" xml:space="preserve" style="position: absolute; top: 50%; left: 50%; margin: -48px 0px 0px -48px; font-size: 96px; color: rgb(255, 0, 0);">
			<path fill="black" d="M87.27,48c0-0.98-0.076-1.942-0.147-2.905c3.842-1.229,6.871-2.402,8.833-3.448l-0.704-3.963
			c-2.202-0.317-5.449-0.391-9.479-0.242c-0.534-1.886-1.201-3.711-2.001-5.469c3.181-2.456,5.62-4.584,7.101-6.23l-2.027-3.484
			c-2.18,0.449-5.259,1.483-8.997,2.992c-1.146-1.578-2.391-3.077-3.755-4.466c2.141-3.386,3.699-6.212,4.522-8.261L77.51,9.937
			c-1.888,1.159-4.417,3.169-7.399,5.845c-1.611-1.092-3.325-2.036-5.095-2.884c0.848-3.917,1.339-7.107,1.406-9.316l-3.809-1.375
			c-1.379,1.735-3.068,4.493-4.956,8.035c-1.879-0.473-3.795-0.852-5.771-1.045C51.335,5.245,50.7,2.092,50.004,0H45.95
			c-0.695,2.092-1.331,5.245-1.883,9.196c-1.976,0.193-3.892,0.572-5.77,1.045c-1.888-3.542-3.577-6.3-4.956-8.035l-3.809,1.375
			c0.066,2.208,0.559,5.399,1.406,9.316c-1.771,0.848-3.484,1.792-5.095,2.884c-2.983-2.676-5.512-4.687-7.4-5.845l-3.105,2.586
			c0.824,2.049,2.382,4.875,4.523,8.261c-1.365,1.389-2.61,2.888-3.755,4.466c-3.739-1.509-6.818-2.543-8.998-2.992l-2.026,3.484
			c1.48,1.646,3.919,3.774,7.101,6.23c-0.801,1.758-1.468,3.583-2.001,5.469c-4.03-0.148-7.277-0.075-9.479,0.242L0,41.646
			c1.961,1.046,4.99,2.219,8.832,3.448C8.761,46.058,8.685,47.02,8.685,48s0.076,1.942,0.147,2.904C4.99,52.135,1.961,53.307,0,54.354
			l0.703,3.963c2.202,0.317,5.449,0.391,9.479,0.242c0.533,1.886,1.2,3.711,2.001,5.469c-3.182,2.456-5.62,4.583-7.101,6.23
			l2.026,3.484c2.18-0.449,5.259-1.483,8.998-2.992c1.145,1.578,2.39,3.076,3.755,4.465c-2.142,3.387-3.699,6.213-4.523,8.263
			l3.105,2.585c1.889-1.158,4.418-3.168,7.4-5.845c1.61,1.093,3.324,2.036,5.095,2.884c-0.848,3.917-1.34,7.107-1.406,9.315
			l3.809,1.376c1.379-1.734,3.068-4.492,4.956-8.035c1.878,0.474,3.794,0.853,5.77,1.046c0.552,3.952,1.188,7.104,1.883,9.196h4.054
			c0.696-2.092,1.331-5.244,1.883-9.196c1.976-0.193,3.892-0.572,5.771-1.046c1.888,3.543,3.577,6.301,4.956,8.035l3.809-1.376
			c-0.067-2.208-0.559-5.398-1.406-9.315c1.77-0.848,3.483-1.791,5.095-2.884c2.982,2.677,5.512,4.687,7.399,5.845l3.105-2.585
			c-0.823-2.05-2.382-4.876-4.522-8.263c1.364-1.389,2.609-2.887,3.755-4.465c3.738,1.509,6.817,2.543,8.997,2.992l2.027-3.484
			c-1.48-1.647-3.92-3.774-7.101-6.23c0.8-1.758,1.467-3.583,2.001-5.469c4.029,0.148,7.276,0.075,9.479-0.242l0.704-3.963
			c-1.962-1.047-4.991-2.219-8.833-3.449C87.193,49.942,87.27,48.98,87.27,48z M62.938,24.666c2.36-2.343,6.188-2.343,8.548,0
			c2.361,2.343,2.361,6.142,0,8.485c-2.36,2.344-6.188,2.344-8.548,0C60.577,30.808,60.577,27.009,62.938,24.666z M47.978,15
			c3.339,0,6.045,2.687,6.045,6s-2.706,6-6.045,6s-6.045-2.687-6.045-6S44.639,15,47.978,15z M24.468,24.666
			c2.36-2.343,6.188-2.343,8.549,0c2.361,2.343,2.36,6.142,0,8.485c-2.36,2.344-6.188,2.344-8.549,0
			C22.107,30.808,22.107,27.009,24.468,24.666z M14.729,48c0-3.314,2.706-6,6.045-6s6.045,2.686,6.045,6s-2.706,6-6.045,6
			S14.729,51.314,14.729,48z M33.017,71.334c-2.36,2.344-6.188,2.344-8.549,0c-2.36-2.343-2.36-6.142,0-8.484
			c2.36-2.344,6.188-2.344,8.549,0C35.377,65.192,35.378,68.991,33.017,71.334z M47.978,81c-3.339,0-6.045-2.687-6.045-6
			c0-3.314,2.706-6,6.045-6s6.045,2.686,6.045,6C54.022,78.313,51.316,81,47.978,81z M47.978,63c-8.347,0-15.113-6.716-15.113-15
			s6.767-15,15.113-15S63.09,39.716,63.09,48S56.324,63,47.978,63z M71.486,71.334c-2.36,2.344-6.188,2.344-8.548,0
			c-2.361-2.343-2.361-6.142,0-8.484c2.36-2.344,6.188-2.344,8.548,0C73.848,65.192,73.848,68.991,71.486,71.334z M75.18,54
			c-3.338,0-6.045-2.686-6.045-6s2.707-6,6.045-6c3.339,0,6.045,2.686,6.045,6S78.519,54,75.18,54z"></path>
		</svg>
    
		<div class="loadingtext" style="position: absolute; top: 50%; left: 0px; width: 100%; text-align: center; margin-top: 60px; font-size: 30px; font-weight: bold; color: rgb(0, 0, 0); display: block;"><p style="font-family:sans-serif;">Chargement...</p></div>
	</div>
<?php wp_head(); ?>
</head>
<body>
    <div id="cssmenu">                
                <ul id="menu-large">
                   <li id="sp_close" style="display:none"><a href="#" id="sp_close_button">メニューを閉じる</a></li>
                   <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
                   <li class="has-sub"><span class="submenu-button"></span><a href="#">Look book</a>
                      <ul>
                         <li id="menu-17w"><span class="submenu-button"></span><a>Automne-Hiver 2016</a>                            
                         </li>
                      </ul>
                   </li>
				   
                   <li id="menu-boutique"><a href=<?php echo($shop_page_url) ?>>Boutique</a></li>
                   <li id="menu-blog"><a href=<?php echo get_permalink( get_option('page_for_posts' ) );?> >Blog</a></li>
                   <li id="menu-about"><a>Concept</a></li>
                   <li><a href="#">Contact</a></li>
                </ul>
                <div id="menu-button"></div>
                
            </div>        
    <section id="home">
        
        <div id="bgimgs" class="board">
            <img src ="wp-content/themes/storefront-child/img/homepage.jpg" />        
        </div>
    </section>
    <section id="galerie17w">
        <div class="galerietitre"><div> Hiver 2017</div></div>
    <div class="galerie am-container" id="am-container">
<?php 
$gal17w = get_page_by_title( 'Galerie17W' );
$images = get_attached_media('image', $gal17w->ID);
$index = 0;
foreach($images as $image) { 
    $index++;
   $image_attributes = wp_get_attachment_image_src($image->ID,'full');
   ?>
    <a href="<?php echo $image_attributes[0]?>" data-lightbox="roadtrip" class="am-wrapper" data-title="Optional caption."><img src="<?php echo $image_attributes[0]?>" />
    
					<div class="overlay" style="opacity: 0.9; display:none;"></div>
				 
				</a>
<?php } ?>
</div>
        <div class="galerieopen">    <img id='about-close' src ="wp-content/themes/storefront-child/img/down-chevron.png" /></div>
            </section>
    <section id="about">
<div id="about-page">
    <div class='board-left'>
        <img id='about-img' accesskey=""src ="wp-content/themes/storefront-child/img/concept.jpg" />
    </div>
    <div id='about-txt' class='board-right'>
          <?php $post = get_page_by_title( 'About' ); echo $post->post_content;  ?>
    </div>
</div>
        </section>
</div> 


<?php 

//wp_footer(); 
get_footer();
?>
</body>
</html>
	
