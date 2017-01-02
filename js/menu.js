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

$(document).ready(function(){

$(document).ready(function() {
  $("#cssmenu").menumaker({
    title: "Menu",
    format: "multitoggle"
  });
        if($("#button-signin")) {
           $("#button-signin").on('click', function () {
              if($("#customer_login:hidden").length)
                  $($("#customer_login")[0]).css("display", "block");
              else 
                  $($("#customer_login")[0]).css("display", "none");
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
        
        if($("#menu-langue")) {
            $("#menu-langue").on('click', function () {
              if($("#langue-widget:hidden").length){
                  $($("#langue-widget")[0]).css("display", "block");
                  $("#masthead").removeClass('header-top');
              }
              else 
                  $($("#langue-widget")[0]).css("display", "none");
               
           });
        }
        
        if($(".menu-shop")) {
           $(".menu-shop").on('click', function () {
               if($("#cart-widget:hidden").length)
                  $($("#cart-widget")[0]).css("display", "block");
              else 
                  $($("#cart-widget")[0]).css("display", "none");
                   $("#masthead").removeClass('header-top');
           });
       }
           
    
    
        if($("#menu-button-left"))
            $("#menu-button-left").on('click', function () {
                if(!$('#page').hasClass('left')) {
                    $('#page').addClass('left');
                    $('#menu-left').show();
                }
                else {
                    $('#page').removeClass('left');
                    $('#menu-left').hide();
                }
            });
        if($("#menu-button"))
            $("#menu-button").on('click', clkmenu);
        
        $("#sp_close").on('click', clkmenu);
        
        $('#menu-button-right').on('click', function () {
            if(!$('#page').hasClass('right')) {
                $('#page').addClass('right');
                $('#menu-right').show();
            }
            else {
                $('#page').removeClass('right');
                $('#menu-right').hide();
            }
        });
        
        $('#open-search').on('click', function(){
                var sbox = $($('#search-box')[0]);
                if ($('#search-box:hidden').length){
                    sbox.show();
                    $($('.menu-right')[0]).hide();
                }else {
                    sbox.hide();
                    $($('.menu-right')[0]).show();
                }
                
                
         });  
         
         $('.close-search').on('click', function(){
             if($(window).width()> 768) {
                 var sbox = $($('#search-box')[0]);
                 sbox.hide();
                 $($('.menu-right')[0]).show();                
             }
             
         });
         
         $(".menu-item.list").each(function(index) {
            $(this).on('click', function() {
                
                var div = $(this).next('li:hidden');
                if(div.length) {
                    $(div).show();
                }else {
                    div = $(this).next('li');
                    $(div).hide();
                }
                
            });
             
         });
        
    var is_top = false;
    var scroll_listerner = function(){
        if ( !is_top && $(window).scrollTop() == 0) {
              is_top = true; 
              $($('#masthead')[0]).removeClass('header-down');
              $($('#masthead')[0]).addClass('header-top');
        }else if ( is_top && $(window).scrollTop() > 0) {
            is_top=false;
            $($('#masthead')[0]).removeClass('header-top');
            $($('#masthead')[0]).addClass('header-down');
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

});


});
})(jQuery);
