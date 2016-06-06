$(document).ready(function() {
    
    bgimgs = $( '#bgimgs' ).children();
    position = 0;
    resize = function () {
        width = window.innerWidth;//$( window ).width() ;
        height = window.innerHeight;//$( window ).height() ;
        
        $('#home').css ({
            height : height
        });
        
        bgimgs.each( function () {
            
            var x_width = this.clientWidth;
            var x_height = this.clientHeight;
            var img_width = this.naturalWidth;
            var img_height = this.naturalHeight;
            
            var img_ratio = img_width / img_height;
            //var win_ration = width / height;
            var width_ratio = x_width / width;
            var height_ratio = x_height / height;
            //var x_width / x_height = img_width/img_height;
            if(width_ratio < 1 || height_ratio < 1) {
            while(width_ratio < 1 || height_ratio < 1) {
                if(width_ratio < 1) {
                    x_width = x_width * 1.1;
                    x_height = x_width / img_ratio;
                }else {
                    x_height = x_height * 1.1;
                    x_width = x_height * img_ratio;
                }                
                width_ratio = x_width / width;
                height_ratio = x_height / height;
            }
        }else {

            while( (width_ratio > 1.2 || height_ratio > 1.2) && (height_ratio > 1) ) {
                if(width_ratio > 1.2) {
                    x_width = x_width * 0.9;
                    x_height = x_width / img_ratio;
                }else if (height_ratio > 1.2) {
                    x_height = x_height * 0.9;
                    x_width = x_height * img_ratio;
                }
                width_ratio = x_width / width;
                height_ratio = x_height / height;
            }
        }
            
             

            
            $(this).css("width",x_height*img_ratio);
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
    
    /*$('#about-close').click(function () {
        $('#about-page').addClass('hide');
        $('#about-page').removeClass('show');
       
    })*/
    
    /*var $container 	= $('#am-container'),
        $imgs		= $container.find('img').hide(),
        totalImgs	= $imgs.length,
        cnt		= 0;
				
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

                            $('#overlay').fadeIn(500);
                    }
            }).attr('src',$img.attr('src'));
            
    });	*/
    
    
    
    $('.loader-icon.spinning-cog').removeClass("spinning-cog");
    $('.loader-icon.spinning-cog').toggle("shrinking-cog");
    setTimeout(function(){ 
    $('#loader').removeClass( "show" );
    $('#loader').toggle( "dontshow" );}
    ,2000);
    
});
