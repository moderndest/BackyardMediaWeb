/**
 * 
 * Backyard Media 
 * Filename: podcasters.js
 * This file is for showing the alert
 *  @author Chatsuda Rattarasan
 * (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
 * Date: June 15 2018 
 * 
 * For the full copyright and license information, please view the LICENSE
 */

/* show file value after file select */
$('.custom-file-input').on('change',function(){
    let fileName = $(this).val().split('\\').pop(); 
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  })
  

/** AJAX SUBMIT FORM *** */
  $(function () {

    // when the form is submitted
    $('.contact-form').on('submit', function (e) {

        // if the validator does not prevent form submit
        if (!e.isDefaultPrevented()) {
         // e.preventDefault();
           var url =  $(this).attr("action");

           var formData = new FormData(this);
          
            $.ajax({
                type: "POST",
                url: url,
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function (data)
                {
                  console.log(data); 
                    // data = JSON object that contact.php returns

                    // we recieve the type of the message: success x danger and apply it to the 

                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    // let's compose Bootstrap alert box HTML
                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    
                    // If we have messageAlert and messageText
                    if (messageAlert && messageText) {
                        // inject the alert to .messages div in our form
                        $('.contact-form').find('.messages').html(alertBox);
                        // empty the form
                        $('.contact-form')[0].reset();
                        // $('.contact-form').removeClass(was-validated );
                    }
                

                    
                }
            });
            return false;
        }
    })
});


