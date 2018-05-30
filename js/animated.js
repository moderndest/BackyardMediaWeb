$(document).ready(function() {
    // Check if element is scrolled into view
    function isScrolledIntoView(elem) {
      var docViewTop = $(window).scrollTop();
      var docViewBottom = docViewTop + $(window).height();
  
      var elemTop = $(elem).offset().top;
      var elemBottom = elemTop + $(elem).height();
  
      return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }
    // If element is scrolled into view, fade it in
    $(window).scroll(function() {
      $('.description').each(function() {
        if (isScrolledIntoView(this) === true) {
          $(this).addClass('animated fadeInRight');
        }else {
            $('.description').removeClass('animated fadeInRight');
          }
      });
    });
  });


// $(window).scroll(function(){
//     if($(window).scrollTop() <= 1000){
//       $('.description').addClass('animated fadeInLeft');
//     } else {
//       $('.description').removeClass('animated fadeInLeft');
//     }
// });