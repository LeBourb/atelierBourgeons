<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Galerie17W
 *
 * @package storefront
 */ 
   
    
?>
<html <?php language_attributes();  ?> ><?php /*storefront_html_tag_schema();*/ ?>
<head>

</head>
<body style="height:100%;width:100%;overflow-x:hidden;">
    <?php 
 get_header(); 
 ?>
<ul class="galerie am-container" id="am-container">
<?php 
// http://wordpress.stackexchange.com/questions/80408/how-to-get-page-post-gallery-attachment-images-in-order-they-are-set-in-backend
// helper function to return first regex match
function get_match( $regex, $content ) {
    preg_match($regex, $content, $matches);
    return $matches[1];
} 

// Extract the shortcode arguments from the $page or $post
$shortcode_args = shortcode_parse_atts(get_match('/\[gallery\s(.*)\]/isU', $post->post_content));

// get the ids specified in the shortcode call
$ids = $shortcode_args["ids"];

// get the attachments specified in the "ids" shortcode argument
$images = get_posts(
    array(
        'include' => $ids, 
        'post_status' => 'inherit', 
        'post_type' => 'attachment', 
        'post_mime_type' => 'image', 
        'order' => 'menu_order ID', 
        'orderby' => 'post__in', //required to order results based on order specified the "include" param
    )
);
 //print_r($attachments);
//$images = get_attached_media('image', $post->ID);
//$index = 0;

foreach($images as $image) { 
    $index++;
   $image_attributes = wp_get_attachment_image_src($image->ID,'large');
   
   $ratio = $image_attributes[2]/$image_attributes[1];
   ?>
    <li  href="<?php echo $image_attributes[0]?>" data-lightbox="roadtrip" class="am-wrapper" <?php echo 'ratio="' . $ratio . '"'; ?> style="" data-title="Optional caption." >
           <?php 
            //echo '<img src="' . $image_attributes[0] . '" />';
            echo wp_get_attachment_image( $image->ID,
                    'large', false ,array(
				'title'	 => $props['title'],
				'alt'    => $props['alt'],
                                'sizes'       => '(max-width: 768px) 500px , 1920px'
			) );
            
            
            ?>
					<div class="overlay" style="opacity: 0.9; display:none;"></div>
                                        
				 
				</li>
<?php } ?>
                                </ul>
<script id='galerie' type="text/javascript">
        /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//var galerie = function() {
//$(window).on("load", function() {
    //$(function() {
    console.log('*****************************************************');
    console.log('*************Hello World***************');
    console.log('*****************************************************');
    var prev_width = 0;
    var onresize = function () {
    $main = $('#am-container');
    $articles = $('.am-wrapper');
    
    // longeur de section == hauteur d'écran.
    
    $('#galerie17w').css({
        height: window.innerHeight
    })
    $('.galerieopen').on('click', function () {
        $('body').css({
           overflow: hidden
        });
        
        $(this.parentElement).css({
            height: 'auto'
        });
    });
    
    var col1 = false, col2 = false, col3 = false, middle = 0;
    var padding = 0;
    var widthimg = 0;
    
    if($main.width() > 1000 && prev_width != $main.width()) {
        col3 = true;
        middle1 =  $main.width()/3;
        middle2 =  $main.width()*2/3;
        padding = (0.01 * $main.width())/4; 
        widthimg = ($main.width())/3 - 2 * padding; 
        console.log('image width: ' + widthimg);
        console.log('padding: ' + padding);
        console.log('main width: ' + $main.width());
        //lightbox.enable();
        prev_width = $main.width();
    }
    else if($main.width() > 768 &&  prev_width != $main.width()) {
        col2 = true;
        middle =  $main.width()/2;
        padding = (0.01 * $main.width())/3; 
        widthimg = ($main.width())/2 - 2 * padding;   
        console.log('image width: ' + widthimg);
        console.log('padding: ' + padding);
        console.log('main width: ' + $main.width());
        console.log('size_cache: ' + $main.width());

        //lightbox.enable();
        prev_width = $main.width();
    }
    else if ( prev_width != $main.width()) {
        col1 = true;
        padding = (0.01 * $main.width())/2;         
        widthimg = $main.width() - 2 * padding;
        console.log('image width: ' + widthimg);
        console.log('padding: ' + padding);
        console.log('main width: ' + $main.width());
        // stop lightbox 
        //lightbox.disable();
        prev_width = $main.width();
    }
    else 
        return;
    var nav_page = $('.navigation.pagination');
    var main_tp = 0; //$main.position().top
    
    var bottom_left= main_tp, bottom_right = main_tp, bottom_middle = main_tp;
            //$main.position().top, bottom_right = $main.position().top,bottom_middle = $main.position().top;
    if($($articles[0]))
    var _isleft = true;
    var _ismiddle = false;
    var _isright = false;
    // prendre la largeur
    $articles.each( function( idx ){
    
        var article = $($articles[idx]);
        
        
        if(col2)
            article.addClass('col-2');
        else
            article.removeClass('col-2');
        
                
        article.css( {
            width: widthimg
        });
        
        var heightimg = widthimg*article.attr('ratio');
        
        article.attr('width',widthimg);
        article.css('height',heightimg);
        article.show();
        
        // On doit remplir équitable les colonnes... 
        if(col3) {
            /*var del_left_right = bottom_left  - bottom_right;
            var del_right_middle = bottom_right  - bottom_middle;
            var del_middle_left = bottom_middle  - bottom_left;*/
            //_isleft = false, _isright = false, _ismiddle = false;
            if (bottom_left < bottom_right && bottom_left < bottom_middle){
                _isleft = true;
                _ismiddle = false;
                _isright = false;
            }
            else if (bottom_right < bottom_left && bottom_right < bottom_middle){
                _isright = true;
                _isleft = false;
                _ismiddle = false;                
            }
            else if (bottom_middle < bottom_left && bottom_middle < bottom_right){
                _ismiddle = true;
                _isleft = false;
                _isright = false;
            }
        }
        
        
        if(_isleft || col1 ) {
            article.css( {
                top: bottom_left, 
                left: padding
            });
            bottom_left = bottom_left + heightimg + padding;
            _isleft = false;
            _ismiddle = true;
            _isright = true;
            if(bottom_left > bottom_right && bottom_left > bottom_middle) {
                nav_page.css( {
                top: bottom_left
                });
                $main.height(bottom_left);
            }
        }else if( _ismiddle && !col2) { 
            article.css( {
                top: bottom_middle, 
                left: middle1 + padding
            });
            bottom_middle = bottom_middle + heightimg + padding;
            _ismiddle = false;
            _isright = true;
            if(bottom_middle > bottom_left && bottom_middle > bottom_right) {
                nav_page.css( {
                top: bottom_middle
                });
                $main.height(bottom_middle);
            }
        }
        else if ( _isright){
            if(col3) {
            article.css( { 
                top: bottom_right,
                left: middle2 + padding/2
            });
            } else if (col2) {
                article.css( { 
                top: bottom_right,
                left: middle + padding/2
            });
            }
            bottom_right = bottom_right + heightimg + padding;
            _isright = false;
            _ismiddle = false;
            _isleft = true;
            if(bottom_right > bottom_left && bottom_right > bottom_middle) {
                nav_page.css( {
                top: bottom_right
                });
                $main.height(bottom_right);
            }
        }                
    });
    };
    /*lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })*/
    
    //lightbox.build();    
    $(window).resize(onresize);
    onresize();
    
    // on aviche de l'overlay quand on passe la souris sur l'image
    /*$articles.each( function( idx ){
           var article = $($articles[idx]);
           article.mouseenter(function() {
               $(this).find('.overlay').show();
           }) ;
           article.mouseleave(function() {
               $(this).find('.overlay').hide();
           }) ;
    });*/
    
    var viewer = new Viewer(document.getElementById('am-container'), {toolbar:false, title:false});
    
    
//});

//$(document).ready(galerie);
//$( document ).ready();
//document.onreadystatechange = galerie;
    </script>   
<?php
echo '<div class="remerciement_section"><ul  class="remerciement_box">
        <li><b><u>' . __('Remerciements','atelierbourgeons') . ':</b></u></li>    
        <p></p>
        <li><b>' . __('Photographe','atelierbourgeons') . '/ </b>Florent </li>
        <li><b>' . __('Mannequin','atelierbourgeons') . ' / </b>Gaelle <a class="fa fa-facebook fa-lg" href="https://www.facebook.com/GGPhotographies"></a></li>        
        <li><b>GF Photographie / </b><a class="fa fa-facebook fa-lg" href="https://www.facebook.com/GFPhotographie1"></a></li>   
        <p></p>
        <a href="https://www.facebook.com/GFPhotographie1"><img  src="' . get_site_url() . '/wp-content/themes/atelierbourgeons/img/GF_Photo.jpg" /></a>
        </ul>
        
    </div>';
    


//wp_footer(); 
get_footer();
?>

   
    </body>
    </html>