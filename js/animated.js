// $(document).ready(function() {
//     // Check if element is scrolled into view
//     function isScrolledIntoView(elem) {
//       var docViewTop = $(window).scrollTop();
//       var docViewBottom = docViewTop + $(window).height();
  
//       var elemTop = $(elem).offset().top;
//       var elemBottom = elemTop + $(elem).height();
  
//       return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
//     }
//     // If element is scrolled into view, fade it in
//     $(window).scroll(function() {
//       $('.description').each(function() {
//         if (isScrolledIntoView(this) === true) {
//           $(this).addClass('animated fadeInRight');
//         }else {
//             $('.description').removeClass('animated fadeInRight');
//           }
//       });
//     });
//   });




$(function(){
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
                  offset: '90%'
          });
      });
  }
  onScrollInit( $('.os-animation') );
  onScrollInit( $('.staggered-animation'), $('.staggered-animation-container') );
});