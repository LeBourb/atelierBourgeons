/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function() {
    $('#galerie17w-txt').on('click', function() {
        var sliderEl = $('#slider')[0];
        $(sliderEl).show();
        $('body').css({"overflow-y":'hidden'});
        var slideMgr = new SlideManager(window.width, window.height, {   // width and height of the manager (not images)
        view: sliderEl,   // mandatory, your canvas element
        bkg_color: 0xF2EFE1,   // default 0x000000, the background color
        is_accelerated: true,   // default false, turn it on to enable the gradual change on sliding speed
        slide_percent_y: 0.5,   // default 0.5, vertical position of slide
        has_indicators: true,   // default true
        indicator_percent_y: 0.95,
        indicator_color: 0x000000, indicator_color_active: 0x000000,
        indicator_fillAlpha: 0.2, indicator_fillAlpha_active: 0.8,
      });
      var imgsleft = [
        '/wordpress/wp-content/themes/atelierbourgeons/pixi/example/assets/img/drip-871152_640.jpg',
        //'/wordpress/wp-content/themes/atelierbourgeons/pixi/example/assets/img/blur-21653_640.jpg',
        //'/wordpress/wp-content/themes/atelierbourgeons/pixi/example/assets/img/lotus-854919_640.jpg'
      ];
      var imgsright = [
        //'/wordpress/wp-content/themes/atelierbourgeons/pixi/example/assets/img/drip-871152_640.jpg',
        '/wordpress/wp-content/themes/atelierbourgeons/pixi/example/assets/img/blur-21653_640.jpg',
        //'/wordpress/wp-content/themes/atelierbourgeons/pixi/example/assets/img/lotus-854919_640.jpg'
      ];
      
      slideMgr.setSlidesAndStart(imgsleft, imgsright, {width: 640, height: 426});   // aspect ratio should be same as image file
     // slideMgr.startAutoSlide(2000);
      slideMgr.enableSwipe();
      slideMgr.enableZoom();
    })
});