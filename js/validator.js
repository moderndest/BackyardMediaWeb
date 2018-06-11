/**
 * 
 * Backyard Media 
 * Filename: validator.js
 *  @author Chatsuda Rattarasan
 * (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
 * Date: June 1 2018 
 * 
 * For the full copyright and license information, please view the LICENSE
 */


var form = document.querySelector('.contact-form ');
form.addEventListener('submit', function(event) {
  if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
  }
  form.classList.add('was-validated');
})

