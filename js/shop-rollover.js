/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
    var number_imgs = $("a.thumb_img").length;
    var index_rollover = 0;
    var enable_zoom = false;
    function swap_image () {
        var srcZoom = $(".woocommerce-main-image.zoom>div>img").attr("src");
        var src = $("a.thumb_img > img")[index_rollover].getAttribute("srcset");
        $(".woocommerce-main-image.zoom>div>img").attr("srcset",src);       
        $(".woocommerce-main-image.zoom>div>img").attr("src",$("a.thumb_img > img")[index_rollover].getAttribute("src"));       
    };
    
    $('.woocommerce-main-image.zoom').mouseover(function(e){
        if(!enable_zoom && !e.originalEvent.sourceCapabilities.firesTouchEvents) {
            enable_zoom = true;
            $(e.currentTarger).addClass('inzoom');
        }
    });
    
    /*$('.woocommerce-main-image.zoom').touchstart(function(e){
        console.log("touch start");
    });*/
    
   $('.woocommerce-main-image.zoom').mousemove(function(e){
        if(enable_zoom) {
            var x = (e.pageX - $(this).offset().left) / this.clientWidth;//e.pageX;// - this.offsetLeft;
            var y = (e.pageY - $(this).offset().top) / this.clientHeight; //e.pageY;// - this.offsetTop;
            console.log("x: " + x + " y: " + y );
            var img = $($($(this).children(['img'])[0]).children(['img'])[0]);
            var left = x * (- img.width() + this.clientWidth);
            var top = y * (- img.height() + this.clientHeight);
            img.css({
                transform: 'translate3d(' + left + 'px, ' + top + 'px, ' + 0 + 'px)'
               //top: - y * img.height()
            });
        }
    });   
    $('.woocommerce-main-image.zoom').mouseleave(function(e){
        if(enable_zoom) {
            enable_zoom = false;
            $(e.currentTarget).removeClass('inzoom');
            var img = $($($(this).children(['img'])[0]).children(['img'])[0]);
            img.css({
                transform: 'translate3d(' + 0 + 'px, ' + 0 + 'px, ' + 0 + 'px)'
           //top: - y * img.height()
            });
        }
        
    });
    
    $('.woocommerce-main-image.zoom .lb-nav .lb-prev ').click(function(){
        if(--index_rollover < 0) {
            index_rollover = number_imgs - 1;
        }
        swap_image();
    });
    
    $('.woocommerce-main-image.zoom .lb-nav .lb-next ').click(function(){
        if(++index_rollover >= number_imgs) {
            index_rollover = 0;
        }
        swap_image();
    });
    
    
    
    $("a.thumb_img").click(function(event){
        index_rollover = index_rollover;
        $("a.thumb_img").each(function(index, target){
            if(target.firstChild == event.target) {
                index_rollover = index;
                swap_image();
            }
        })
       
         
    });
    $( "#accordion" ).accordion({
        collapsible: true,
        active: false
    });
    /*
    $('.easyzoom').easyZoom();
    
    
    */
    

    // Instantiate EasyZoom instances
    //var $easyzoom = $('.easyzoom').easyZoom();

    // Get an instance API
    //var api = $easyzoom.data('easyZoom');


    
    
});
