/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    
    //bgimgs = $( '#bgimgs' ).children();
    position = 0;
    window.previous_width = null;
    function swapNodes(a, b) {
        var aparent = a.parentNode;
        var asibling = a.nextSibling === b ? a : a.nextSibling;
        b.parentNode.insertBefore(a, b);
        aparent.insertBefore(b, asibling);
    }
    var resize = function () {
        
        if( $(window).width() <= 768 )         {
            
            $('.about-left.container > img').each(function () {
                var el = $(this)[0];
                if(el.nextElementSibling) {
                    swapNodes(el,el.nextElementSibling);           
                }
            });           
        }else if( $(window).width() >= 768){           
            $('.about-left.container > img').each(function () {                
                var el = $(this)[0];
                if(el.previousElementSibling) {
                    swapNodes(el.previousElementSibling,el);
                }
            });
        }
        window.previous_width = $(window).width();
            
    };
    $( window ).resize(resize);    
    resize();
    
});
