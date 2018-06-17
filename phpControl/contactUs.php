
<?php
/**
 * 
 * Backyard Media 
 * Filename: contact.php
 * @author Chatsuda Rattarasan
 * Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
 * Date: June 1 2018 
 * 
 * For the full copyright and license information, please view the LICENSE
 */



//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require '../vendor/autoload.php';



if(count($_POST) == 0) {
    throw new \Exception('Form is empty');
}
else{
    $fromEmail = htmlentities($_POST['email']) ;
    $fromName = htmlentities($_POST['name']);
    $organizaiton = htmlentities($_POST['organizaiton']);
    $areu = htmlentities($_POST['gridRadios']);
    $message = htmlentities($_POST['notes']);

    if(isset($_POST['website']))
    {
        $website = htmlentities($_POST['website']);
    }


}

// message that will be displayed when everything is OK :)
$okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';
// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. Please try again later';

//smtp credentials and server
$smtpHost = htmlentities('smtp.mailtrap.io');
$smtpUsername = htmlentities( '6c7f550429c56b');
$smtpPassword = htmlentities('a91307364d02a3');


// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('name' => $fromName, 'email' => $fromEmail,
                'organizaiton' => $organizaiton,'gridRadios' => $areu,
                'website' => $website); 



/*
*  LET'S DO THE SENDING
*/

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

try
{
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();


    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;

    //Set the hostname of the mail server
    $mail->Host = $smtpHost;

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 2525;

    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';
  
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = $smtpUsername;
    //Password to use for SMTP authentication
    $mail->Password = $smtpPassword;

    //Set who the message is to be sent from
    $mail->setFrom($fromEmail, $fromName);

    //Set who the message is to be sent to
    $mail->addAddress('whoto@example.com', 'Backyard Media');

    //Set the subject line
    $mail->Subject = 'New message from contact form';


    $emailTextHtml = "<div style='width:640px;'>";
    $emailTextHtml .= "<br><h2>You have a new message from your contact form</h2><hr>";

    $emailTextHtml .= "<br><table>";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email
        if (isset($fields[$key])) {
            if($key === "name")
            {
                $emailTextHtml .= "<tr><th>Contact Name : </th><td> $value</td></tr>";
            }
            else if ($key === "email")
            {
                $emailTextHtml .= "<tr><th>Email : </th><td> $value</td></tr>";
            }
            else if ($key === "organizaiton")
            {
                $emailTextHtml .= "<tr><th>Organizaiton : </th><td> $value</td></tr>";
            }
            else if ($key === "gridRadios")
            {
                $emailTextHtml .= "<tr><th>Are You? : </th><td> $value</td></tr>";
            }
            else
            {
                $emailTextHtml .= "<tr><th>Website : </th><td> $value</td></tr>";
            }
        }
    }
    $emailTextHtml .= "</table><br><hr>";
    $emailTextHtml .="<p><strong>message : </strong></p>";
    $emailTextHtml .=" <p>$message </p><hr></div>";
    $emailTextHtml .= "<p><br>Bests,<br>Backyerd Media supporting team</p>";



    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    // $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
    $mail->msgHTML($emailTextHtml, __DIR__);



    //Send the message, check for errors
    if (!$mail->send()) {
        throw new \Exception('Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
    } else {
        $responseArray = array('type' => 'success', 'message' => $okMessage);
        
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
        //echo "success";
    }
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);

}

// Section 2: IMAP
// IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
// Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
// You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
// be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);
    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);
    return $result;
}   


//if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
//else just display the message
else {
    echo $responseArray['message'];
}










