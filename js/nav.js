/**
 * 
 * Backyard Media 
 * Filename: nav.js
 *  @author Chatsuda Rattarasan
 * Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
 *  Date: May 29 2018 
 * 
 * For the full copyright and license information, please view the LICENSE
 */


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
    $(this).html("<a href='login.html' class='mx-3' role='button'><i class='fas fa-user fa-2x blue'></i></a>"); 
  }, function () {
    $(this).html("<a href='login.html' class='d-inline btnstyle' role='button'>Log in</a>");   
  });
});

$(document).ready(function () {
  $('.Signupbtn').hover(function () {
    $(this).html("<a href='Signup.html' class='mx-3' role='button'><i class='fas fa-user-plus fa-2x blue'></a>"); 
  }, function () {
    $(this).html("<a href='Signup.html' class='d-inline btnstyle' role='button'>Sign Up</a>");   
  });
});