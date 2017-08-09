(function($) {
    
 var clkmenu = function(){
          //$(this).toggleClass('menu-opened');
            var mainmenu = $('#menu-large');
          var menuright = $('#menu-right');
          var menubutton = $('#menu-button');
          if (mainmenu.hasClass('open')) { 
            mainmenu.hide().removeClass('open');
            menuright.hide().removeClass('open');
            menubutton.show();
          }
          else {
            mainmenu.show().addClass('open');
            mainright.show().addClass('open');
            menubutton.hide();
            /*if (settings.format === "dropdown") {
              mainmenu.find('ul').show();
            }*/
          }
        }

  $.fn.menumaker = function(options) {
      
      var cssmenu = $(this), settings = $.extend({
        title: "Menu",
        format: "dropdown",
        sticky: false
      }, options);

      return this.each(function() {
        //cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
        $(this).find("#menu-button-left").on('click', clkmenu);
        $("#sp_close").on('click', clkmenu);

        cssmenu.find('li ul').parent().addClass('has-sub');

        multiTg = function() {
          cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
          cssmenu.find('.submenu-button').on('click', function() {
            $(this).toggleClass('submenu-opened');
            if ($(this).siblings('ul').hasClass('open')) {
              $(this).siblings('ul').removeClass('open').hide();
            }
            else {
              $(this).siblings('ul').addClass('open').show();
            }
          });
        };

        if (settings.format === 'multitoggle') multiTg();
        else cssmenu.addClass('dropdown');

        if (settings.sticky === true) cssmenu.css('position', 'fixed');

        resizeFix = function() {
          if ($( window ).width() > 768) {
            $('#menu-large').show();
            $($('#menu-left')[0]).hide();
            $($('#menu-right')[0]).hide();
          }

          if ($(window).width() <= 768) {
            $('#menu-large').hide().removeClass('open');            
            $($('#search-box')[0]).hide();
            $($('#menu-right')[0]).hide();
          }
        };
        resizeFix();
        return $(window).on('resize', resizeFix);

      });
  };



$(document).ready(function() {
  $("#cssmenu").menumaker({
    title: "Menu",
    format: "multitoggle"
  });
  
  close_sub_headers = function (){
   //   sub-header-menu
   $('.sub-header-menu').each(function (idx, elem) {
        $(elem).hide();
   });
   // remove focus on menu
   $('#cssmenu .focus').each(function (idx, elem){
       $(elem).removeClass('focus');
   });
   scroll_listerner(true);
  };
  
  
        if($("#button-signin")) {
           $("#button-signin").on('click', function () {
              
              if($("#customer_login:hidden").length) {              
                  close_sub_headers();
                  $($("#customer_login")[0]).css("display", "block");
              }
              else {
                  close_sub_headers();
                  $($("#customer_login")[0]).css("display", "none");
                  }
               if($("#signid").hasClass('open')) {
                  $("#signid").hide();                  
                  $("#signid").removeClass('open');
                  
              }else {                  
                  $("#signid").show();
                  $("#signid").addClass('open');
                  $("#masthead").removeClass('header-top');
              }
           });
        }
        
        if($("#button-collection")) {
           $("#button-collection").on('click', function () {
              
              if($("#sub-menu-collection:hidden").length) {
                  close_sub_headers();
                  $("#button-collection").addClass("focus");
                  $($("#sub-menu-collection")[0]).css("display", "block");
                  $("#masthead").removeClass('header-top');
              }
              else {
                  close_sub_headers();
                  $($("#sub-menu-collection")[0]).css("display", "none");
              } 
                  
          
            });
        }
        
        
        if($("#menu-langue")) {
            $("#menu-langue").on('click', function () {              
              if($("#menu-langue a span:hidden").length){                
                //$("#menu-langue").addClass('focus');
                
                $($("#menu-langue a span")[0]).css("display", "block");
                //$("#masthead").removeClass('header-top');
              }
              else  {
                //close_sub_headers(); 
                $($("#menu-langue a span")[0]).css("display", "none");
                
              }
                  
               
           });
           
           $("#menu-langue a span").on('click', function (evt) {              
               window.open(evt.currentTarget.getAttribute('href'),"_self");
           });
        }
        
        if($(".menu-parent-category")) {
            $(".menu-parent-category").on('click', function (evt) {
               if($('#sub-menu-' + evt.currentTarget.id + ':hidden').length ) {
                   close_sub_headers();
                   $(evt.currentTarget).addClass("focus");
                   $($('#sub-menu-' + evt.currentTarget.id)[0]).css('display','block');                   
                   $("#masthead").removeClass('header-top');
               }else {
                   close_sub_headers();
                    $($('#sub-menu-' + evt.currentTarget.id)[0]).css('display','none');
               }
            });
        }
        
        if($(".menu-shop")) {
           $(".menu-shop").on('click', function () {               
            if($("#cart-widget:hidden").length) {                   
                close_sub_headers();
                $($("#cart-widget")[0]).css("display", "block");
            }
            else{
                close_sub_headers();
                $($("#cart-widget")[0]).css("display", "none");
            }
            $("#masthead").removeClass('header-top');
           });
       }
           
    
    
        if($("#menu-button-left"))
            $("#menu-button-left").on('click', function () {
                if(!$('#page').hasClass('left')) {
                    $('#page').addClass('left');
                    $('html').css('overflow-y','hidden');
                    $('#menu-left').show();                     
                }
                else {
                    $('#page').removeClass('left');
                    $('html').css('overflow-y','auto');
                    setTimeout(function(){
                        $('#menu-left').hide();
                    },1000);
                    
                }
            });
        if($("#menu-button"))
            $("#menu-button").on('click', clkmenu);
        
        $("#sp_close").on('click', clkmenu);
        
        $('#menu-button-right').on('click', function () {
            if(!$('#page').hasClass('right')) {
                $('#page').addClass('right');
                $('#menu-right').show();
                $('html').css('overflow-y','hidden');
            }
            else {
                $('#page').removeClass('right');
                setTimeout(function(){
                    $('#menu-right').hide();
                },1000);
                $('html').css('overflow-y','auto');
            }
        });
        
        $('#open-search').on('click', function(){
                //var sbox = $($('#search-box')[0]);
                //if ($('#search-box:hidden').length){
                    //sbox.show();
                    $('.menu-right > ul > li').each(function(id,el){$(el).toggle();})
                //}else {
                    //sbox.hide();
                  //  $('.menu-right > ul > li').each(function(id,el){$(el).toggle();})
                //}
                
                
         });  
         
         $('.close-search').on('click', function(){
             if($(window).width()> 768) {
                 $('.menu-right > ul > li').each(function(id,el){$(el).toggle();})
             }
             
         });
         
         $(".menu-item.list").each(function(index) {
            $(this).on('click', function() {
                
                var div = $(this).next('div:hidden');
                if(div.length) {
                    $(div).show();
                }else {
                    div = $(this).next('div');
                    $(div).hide();
                }
                
            });
             
         });
         
         $(".sub-category-elem").each(function(){
             $(this).on('mouseover', function(elem) {
                 $('#eshop-categories-image').attr('src',$(this).attr('thumbnail-url'));
             });
             $(this).on('mouseout', function(elem) {
                 $('#eshop-categories-image').attr('src','');
             });
         });
        
    var is_top = false;
    var scroll_listerner = function(force){
        if ( ( !is_top || force )&& $(window).scrollTop() == 0 ) {
              is_top = true; 
              $($('#masthead')[0]).removeClass('header-down');
              $($('#masthead')[0]).addClass('header-top');
        }else if ( ( is_top || force ) && $(window).scrollTop() > 0) {
            is_top=false;
            $($('#masthead')[0]).removeClass('header-top');
            $($('#masthead')[0]).addClass('header-down');
        }
        if(!force){
            close_sub_headers();        
        }
        
            
    };
    $(window).scroll(scroll_listerner);
    
$(window).scroll();
scroll_listerner();
  /*$("#cssmenu").prepend("<div id='menu-line'></div>");*/

var foundActive = false, activeElement, linePosition = 0, /*menuLine = $("#cssmenu #menu-line"),*/ lineWidth, defaultPosition, defaultWidth;

$("#cssmenu > ul > li").each(function() {
  if ($(this).hasClass('active')) {
    activeElement = $(this);
    foundActive = true;
  }
  $(this).children('ul').each(function() {
      $(this).attr("active", false );
  });
  $(this).click(function() {
      /*if($(this).hasClass('active')) {
          $(this).removeClass('active')
      }else 
          $(this).addClass('active')*/      
      $(this).children('ul').each( function () {
          if($(this).attr("active") == "false") {
              $(this).slideDown( "slow", function() {
                  $(this).attr("active", true );
              });
          }else {
              $(this).slideUp( "slow", function() {
                  $(this).attr("active", false );
              });
          }
      });
      
        /*if($(this).attr('id') === 'menu-about') {
           if($('#about-page').hasClass('show')) {
             $('#about-page').addClass('hide');
             $('#about-page').removeClass('show')
           }
           else {
             $('#about-page').addClass('show');
             $('#about-page').removeClass('hide')
           }
        }*/
      $('#menu-17w').on('click', function() {
            $('html, body').animate({
                scrollTop: $("#galerie17w").offset().top
            }, 2000);
        })
        $('#menu-about').on('click', function() {
            $('html, body').animate({
                scrollTop: $("#about").offset().top
            }, 2000);
        });
        
        
        
    
        
    });


});

if (foundActive === false) {
  activeElement = $("#cssmenu > ul > li").first();
}


defaultWidth = lineWidth = activeElement.width();

//defaultPosition = linePosition = activeElement.position().left; // ? activeElement.position().left : null;

//menuLine.css("width", lineWidth);
//menuLine.css("left", linePosition);

$("#cssmenu > ul > li").hover(function() {
  activeElement = $(this);
  lineWidth = activeElement.width();
  linePosition = activeElement.position().left;
  //menuLine.css("width", lineWidth);
  //menuLine.css("left", linePosition);
}, 
function() {
  //menuLine.css("left", defaultPosition);
  //menuLine.css("width", defaultWidth);
});

if(window.navigator.language == 'ja' && window.location.href.indexOf('/fr/') > 0) {
    $('#langue-popup').show();
}

});



//alert('langue is:' + window.navigator.language);

})(jQuery);
