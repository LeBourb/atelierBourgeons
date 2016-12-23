$(document).ready(function() {
    
    //bgimgs = $( '#bgimgs' ).children();
    position = 0;
    resize = function () {
        //console.log('resize');
        var width = window.innerWidth;//$( window ).width() ;
        var height = window.innerHeight;//$( window ).height() ;
        console.log($('.bgimgs.portrait'));
        $('.bgimgs.portrait').each(function () {
            console.log('resize');
        });
      
      /*var width = window.innerWidth;//$( window ).width() ;
      var height = window.innerHeight;//$( window ).height() ;
      
      if(width >= height) {
          document.body.style.backgroundImage = "url(" + window.location.origin + "/wordpress/wp-content/themes/atelierbourgeons/img/coming-soon.jpg)"; 
      }else {
          document.body.style.backgroundImage = "url(" + window.location.origin + "/wordpress/wp-content/themes/atelierbourgeons/img/coming-soon-portrait.jpg)"; 
      }*/
      
     
  
    };
    $( window ).resize(resize);    
    resize();
    /*resize = function () {
        
        width = window.innerWidth;//$( window ).width() ;
        height = window.innerHeight;//$( window ).height() ;

        $('#home').css ({
            height : height
        });
        var that= $('.bgimgs');    
        that.each( function (eg) {
         
            
            //setTimeout(function(){  
           
            var x_width = $(eg).width();
                
            var x_height = $(eg).height();
            var img_width = eg.naturalWidth;
            var img_height = eg.naturalHeight;
            
            var img_ratio = img_width / img_height;
            //var win_ration = width / height;
            var width_ratio = x_width / width;
            var height_ratio = x_height / height;
            //var x_width / x_height = img_width/img_height;
            if(width_ratio < 1 || height_ratio < 1) {                
            while(width_ratio < 1 || height_ratio < 1) {                
                if(width_ratio < 1) {
                    x_width = x_width * 1.01;
                    x_height = x_width / img_ratio;
                }else {
                    x_height = x_height * 1.01;
                    x_width = x_height * img_ratio;
                }                
                width_ratio = x_width / width;
                height_ratio = x_height / height;
            }
        }else {

            while( (width_ratio > 1.2 || height_ratio > 1.2) && (height_ratio > 1)  && (width_ratio > 1) ) {
                if(width_ratio > 1.2) {
                    x_width = x_width * 0.09;
                    x_height = x_width / img_ratio;
                }else if (height_ratio > 1.2) {
                    x_height = x_height * 0.09;
                    x_width = x_height * img_ratio;
                }
                width_ratio = x_width / width;
                height_ratio = x_height / height;
            }
        }
            
             

           if(width_ratio > 1 && height_ratio>1) {
           $(eg).css("width",x_height*img_ratio);
           $(eg).css("height",x_height);
       }
            
           // },1000);
        
            
       }); 
    };
    $( window ).resize(resize);    
    resize();
     */
    /*setInterval(function(){
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
        $('body').css( 'overflow-y', 'scroll' );
        
        $('#loader').removeClass( "show" );
        $('#loader').toggle( "dontshow" );
         $('#Logo_Top').each( function () {
                $(this).hide();
        });
        $('#Logo_Bottom').each( function () {
                $(this).hide();
        });
    },2000);
    
    var Logo_Top= $('#Logo_Top');    
            Logo_Top.each( function () {
                $(this).addClass('final-logo');
        });
        var Logo_Bottom= $('#Logo_Bottom');    
            Logo_Bottom.each( function () {
                $(this).addClass('final-logo');
        });
    
});
