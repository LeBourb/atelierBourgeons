/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
   $('.woocommerce-main-image.zoom').mousemove(function(e){
        var x = (e.pageX - $(this).offset().left) / this.clientWidth;//e.pageX;// - this.offsetLeft;
        var y = (e.pageY - $(this).offset().top) / this.clientHeight; //e.pageY;// - this.offsetTop;
        console.log("x: " + x + " y: " + y );
        var img = $($(this).children(['img'])[0]);
var left = x * (- img.width() + this.clientWidth);
var top = y * (- img.height() + this.clientHeight);
        img.css({
            transform: 'translate3d(' + left + 'px, ' + top + 'px, ' + 0 + 'px)'
           //top: - y * img.height()
        });
    });   
    $('.woocommerce-main-image.zoom').mouseleave(function(){
        var img = $($(this).children(['img'])[0]);
        img.css({
            transform: 'translate3d(' + 0 + 'px, ' + 0 + 'px, ' + 0 + 'px)'
           //top: - y * img.height()
        });
    });
    
    $("[data-rel='prettyPhoto[product-gallery]']").click(function(event){
         
         var srcZoom = $(".woocommerce-main-image.zoom>img").attr("src");
         var src = $(event.target).attr("srcset");
         $(".woocommerce-main-image.zoom>img").attr("srcset",src);       
         
    });
    
    
    
});
