


//navbar dropdown mouse hover
  $('body').on('mouseenter mouseleave','.dropdown',function(e){
    var _d=$(e.target).closest('.dropdown');_d.addClass('show');
    setTimeout(function(){
      _d[_d.is(':hover')?'addClass':'removeClass']('show');
      $('[data-toggle="dropdown"]', _d).attr('aria-expanded',_d.is(':hover'));
    },300);
  });



  
$(document).ready(function () {
  $('.loginbtn').hover(function () {
    $(this).html("<a href='#' class='mx-3 fas fa-user fa-2x blue' role='button'></a>"); 
  }, function () {
    $(this).html("<a href='#' class='d-inline btnstyle' role='button'>Log in</a>");   
  });
});

$(document).ready(function () {
  $('.Signupbtn').hover(function () {
    $(this).html("<a href='#' class='mx-3 fas fa-user-plus fa-2x blue' role='button'></a>"); 
  }, function () {
    $(this).html("<a href='#' class='d-inline btnstyle' role='button'>Sign Up</a>");   
  });
});

//   $(".fa-user").on("hover", function(e) {
//     if (e.type == "mouseenter") {
//         console.log("one");  
//         $(this).html("<i class='fas fa-user-plus fa-2x blue'></i>"); 
//     }
//     else { // mouseleave
//         console.log("two");
//         $(this).html("<button type='button' class='loginbtn d-inline btn btn-outline-primary'>Log in</button>");   
//     }
// });

  // $( "i.fa-user" )
  // .mouseover(function() {
  //   $(this).html("<i class='fas fa-user-plus fa-2x blue'></i>");
  // })
  // .mouseout(function() {
  //   $(this).html("<button type='button' class='loginbtn d-inline btn btn-outline-primary'>Log in</button>");
  // })


// $( selector ).mouseenter( handlerIn ).mouseleave( handlerOut );
// $(".loginbtn").hover(function(){
//     $(this).html("<i class='fas fa-user'></i>");
// });