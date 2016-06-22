/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    
    
    var onresize = function () {
    $main = $('#main');
    $articles = $('#main').find('article');
    
    var col2 = false, middle = 0;
    var padding = 0;
    if(main.clientWidth > 768) {
        col2 = true;
        middle =  main.clientWidth/2;
        padding = (0.1 * main.clientWidth)/3; 
    }
    else {
        padding = (0.1 * main.clientWidth)/2; 
    }
    var nav_page = $('.navigation.pagination');
    var bottom_left=$main.position().top, bottom_right = $main.position().top;
    if($($articles[0]))
    var _isleft = true;
    $articles.each( function( idx ){
    
        var article = $($articles[idx]);
        
        article.show();
        if(col2)
            article.addClass('col-2');
        else
            article.removeClass('col-2');
        
        if(_isleft || !col2 ) {
            article.css( {
                top: bottom_left, 
                left: padding
            });
            bottom_left = bottom_left + article.height() + padding;
            _isleft = false;
            if(bottom_left > bottom_right) {
                nav_page.css( {
                top: bottom_left
                });
                $main.height(bottom_left);
            }
        }else {
            article.css( { 
                top: bottom_right,
                left: middle + padding/2
            });
            bottom_right = bottom_right + article.height() + padding;
            _isleft = true;
            if(bottom_right > bottom_left) {
                nav_page.css( {
                top: bottom_right
                });
                $main.height(bottom_right);
            }
        }        
    });
    };
    
    $(window).resize(onresize);
    onresize();
    
    var feed = new Instafeed({
        get: 'user',
        userId: '18808100',
        clientId: '3444230514',
        accessToken: '3444230514.3a81a9f.f3df0da0ac5949ee90e384ffc38ea58c'
    });
    feed.run();
    
});

