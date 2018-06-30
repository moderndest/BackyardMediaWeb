/**
 * 
 * Backyard Media 
 * Filename: validator.js
 * this file is for checking form validation
 * 
 *  @author Chatsuda Rattarasan
 * (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
 * Date: June 1 2018 
 * 
 * For the full copyright and license information, please view the LICENSE
 */


var form = document.querySelector('.contact-form');
form.addEventListener('submit', function(event) {
  if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
              
  }
  form.classList.add('was-validated');
}, false);

var pwd = document.querySelector('.pwd');
var confirm = document.querySelector('.confirm');
var match = document.getElementById('match');
var letter = document.getElementById('letter');
var capital = document.getElementById('capital');
var number = document.getElementById('number');
var length = document.getElementById('length');
var spaces = document.getElementById('space');


if(pwd){
    // When the user clicks on the password field, show the message box
    pwd.addEventListener('focus', function() {
    document.getElementById("message").style.display = "block";


    });

    // When the user clicks outside of the password field, hide the message box
    pwd.addEventListener('blur', function() {
    document.getElementById("message").style.display = "none";
    
    });
    pwd.addEventListener('keyup',function(){

        var lowerCaseLetters = /[a-z]/g;
        if(pwd.value.match(lowerCaseLetters)) {  
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }
        
        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(pwd.value.match(upperCaseLetters)) {  
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }
    
        // Validate numbers
        var numbers = /[0-9]/g;
        if(pwd.value.match(numbers)) {  
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }
    
        //validate space
        var sym =/[!@#$%\^&*\+]/;
        if ( pwd.value.match(sym)) {
            spaces.classList.remove("invalid");
            spaces.classList.add("valid");
        } else {
            spaces.classList.remove("valid");
            spaces.classList.add("invalid");
        }
        
        
        // Validate length
    
        if(pwd.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    });
}

if(confirm){
    // When the user clicks on the password confirm field, show the message box
    confirm.addEventListener('focus', function() {
    document.getElementById("messages").style.display = "block";
    });

    // When the user clicks outside of the password confirm field, hide the message box
    confirm.addEventListener('blur', function() {
    document.getElementById("messages").style.display = "none";
    });

    confirm.addEventListener('keyup', function() {
    if (pwd.value == confirm.value) {
        match.classList.remove("invalid");
        match.classList.add("valid");
    } else {
        match.classList.remove("valid");
        match.classList.add("invalid");
    }
    });
}

