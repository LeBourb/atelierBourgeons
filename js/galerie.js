/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$(document).ready(function() {
$(window).on("load", function() {
    
    
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
    if($main.width() > 1000) {
        col3 = true;
        middle1 =  $main.width()/3;
        middle2 =  $main.width()*2/3;
        padding = (0.01 * $main.width())/4; 
        widthimg = ($main.width())/3 - 2 * padding;  
        lightbox.enable();
    }
    else if($main.width() > 768) {
        col2 = true;
        middle =  $main.width()/2;
        padding = (0.01 * $main.width())/3; 
        widthimg = ($main.width())/2 - 2 * padding;        
        lightbox.enable();
    }
    else {
        col1 = true;
        padding = (0.01 * $main.width())/2;         
        widthimg = $main.width() - 2 * padding;
        // stop lightbox 
        lightbox.disable();
    }
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
        
        article.show();
        if(col2)
            article.addClass('col-2');
        else
            article.removeClass('col-2');
        
                
        article.css( {
            width: widthimg
        });
        
        // On doit remplir équitable les colonnes... 
        if(col3) {
            var del_left_right = bottom_left  - bottom_right;
            var del_right_middle = bottom_right  - bottom_middle;
            var del_middle_left = bottom_middle  - bottom_left;
            if( Math.abs( del_left_right ) > article.height())  {
                if(del_left_right > 0) {
                    _isleft = false;
                    _isright = true;
                    _ismiddle = false;
                }else {
                    _isleft = true;
                    _isright = false;
                    _ismiddle = false;
                }
            }
            else if( Math.abs( del_right_middle ) > article.height() && col3)  {
                if(del_right_middle > 0) {
                    _isleft = false;
                    _isright = false;
                    _ismiddle = true;
                }else {
                    _isleft = false;
                    _isright = true;
                    _ismiddle = false;
                }
            }
            else if( Math.abs( del_middle_left ) > article.height() && col3)  {
                if(del_middle_left > 0) {
                    _isleft = true;
                    _isright = false;
                    _ismiddle = false;
                }else {
                    _isleft = false;
                    _isright = false;
                    _ismiddle = true;
                }
            }
        }
        
        
        if(_isleft || col1 ) {
            article.css( {
                top: bottom_left, 
                left: padding
            });
            bottom_left = bottom_left + article.height() + padding;
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
            bottom_middle = bottom_middle + article.height() + padding;
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
            bottom_right = bottom_right + article.height() + padding;
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
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
    
    //lightbox.build();    
    $(window).resize(onresize);
    onresize();
    
    // on aviche de l'overlay quand on passe la souris sur l'image
    $articles.each( function( idx ){
           var article = $($articles[idx]);
           article.mouseenter(function() {
               $(this).find('.overlay').show();
           }) ;
           article.mouseleave(function() {
               $(this).find('.overlay').hide();
           }) ;
    });
    
    
});
