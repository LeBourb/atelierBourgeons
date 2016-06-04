$(document).ready(function() {
    
    bgimgs = $( '#bgimgs' ).children();
    position = 0;
    resize = function () {
        width = $( window ).width() ;
        height = $( window ).height() ;
        
        bgimgs.each( function () {
            
            var x_width = img_width = this.width;
            var x_height = img_height = this.height;
            
            var img_ratio = img_width / img_height;
            //var win_ration = width / height;
            var width_ratio = x_width / width;
            var height_ratio = x_height / height;
            //var x_width / x_height = img_width/img_height;
            
            while(width_ratio < 1 || height_ratio < 1) {
                if(width_ratio < 1) {
                    x_width = width + 0.01 * width;
                    x_height = x_width / img_ratio;
                }else {
                    x_height = height + 0.01 * height;
                    x_width = x_height * img_ratio;
                }                
                width_ratio = x_width / width;
                height_ratio = x_height / height;
            }

            while(width_ratio > 1.2 || height_ratio > 1.2) {
                if(width_ratio > 1.2) {
                    x_width = width + 0.1 * width;
                    x_height = x_width / img_ratio;
                }else if (height_ratio > 1.2) {
                    x_height = height + 0.1 * height;
                    x_width = x_height * img_ratio;
                    x_width = x_height * img_ratio;
                }
                width_ratio = x_width / width;
                height_ratio = x_height / height;
            }
            
             while(width_ratio < 1 || height_ratio < 1) {
                if(width_ratio < 1) {
                    x_width = width + 0.01 * width;
                    x_height = x_width / img_ratio;
                }else {
                    x_height = height + 0.01 * height;
                    x_width = x_height * img_ratio;
                }                
                width_ratio = x_width / width;
                height_ratio = x_height / height;
            }

            
            $(this).css("width",x_width);
            $(this).css("height",x_height);
            
        })
    };
    $( window ).resize(resize);
    
    resize();
    setInterval(function(){
        $(bgimgs[position]).removeClass( 'show' );
        $(bgimgs[position]).addClass(  'hide' );
        if(position == bgimgs.length - 1)
            position = -1;
        ++position;
        $(bgimgs[position]).removeClass( 'hide' );
        $(bgimgs[position]).addClass( 'show' );
        //position = 0;
        
    }, 10000);
    
    $('#about-close').click(function () {
        $('#about-page').addClass('hide');
        $('#about-page').removeClass('show');
       
    })
    
    var $container 	= $('#am-container'),
					$imgs		= $container.find('img').hide(),
					totalImgs	= $imgs.length,
					cnt			= 0;
				
				$imgs.each(function(i) {
					var $img	= $(this);
					$('<img/>').load(function() {
						++cnt;
						if( cnt === totalImgs ) {
							$imgs.show();
							$container.montage({
								fillLastRow	: false,
alternateHeight	: false,
margin : 5
							});
							
							/* 
							 * just for this demo:
							 */
							$('#overlay').fadeIn(500);
						}
					}).attr('src',$img.attr('src'));
				});	
    
});
