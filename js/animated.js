// Backyard Media 
// Filename: animated.js

// Author: Chatsuda Rattarasan   
// Date: May 29 2018

 /*waypoints ScrollInit*/




 $(window).on('load', function(){

    function onScrollInit( items, trigger ) {
      items.each( function() {
        var osElement = $(this),
            osAnimationClass = osElement.attr('data-os-animation'),
            osAnimationDelay = osElement.attr('data-os-animation-delay');
          
            osElement.css({
              '-webkit-animation-delay':  osAnimationDelay,
              '-moz-animation-delay':     osAnimationDelay,
              'animation-delay':          osAnimationDelay
            });
    
            var osTrigger = ( trigger ) ? trigger : osElement;
            
            osTrigger.waypoint(function() {
              osElement.addClass('animated').addClass(osAnimationClass);
              },{
                  triggerOnce: true,
                  offset: '70%'
            });
      });
    }
    
     onScrollInit( $('.os-animation') );
     onScrollInit( $('.staggered-animation'), $('.staggered-animation-container') );
    });