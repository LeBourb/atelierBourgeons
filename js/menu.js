(function($) {
    
 var clkmenu = function(){
          //$(this).toggleClass('menu-opened');
          var mainmenu = $('#menu-large');
          var menubutton = $('#menu-button');
          if (mainmenu.hasClass('open')) { 
            mainmenu.hide().removeClass('open');
            menubutton.show();
          }
          else {
            mainmenu.show().addClass('open');
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
        $(this).find("#menu-button").on('click', clkmenu);
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
          }

          if ($(window).width() <= 768) {
            $('#menu-large').hide().removeClass('open');
          }
        };
        resizeFix();
        return $(window).on('resize', resizeFix);

      });
  };
})(jQuery);

(function($){
$(document).ready(function(){

$(document).ready(function() {
  $("#cssmenu").menumaker({
    title: "Menu",
    format: "multitoggle"
  });

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
        })
    
        
    });

  
});

if (foundActive === false) {
  activeElement = $("#cssmenu > ul > li").first();
}

defaultWidth = lineWidth = activeElement.width();

defaultPosition = linePosition = activeElement.position().left;

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
