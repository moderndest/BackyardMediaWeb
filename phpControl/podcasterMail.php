
<?php
/**
 * 
 * Backyard Media 
 * Filename: podcasterMail.php
 * @author Chatsuda Rattarasan
 * Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
 * Date: June 16 2018 
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


$currentDir = getcwd();


// Check if it have information or not;
if(count($_POST) == 0) {
    throw new \Exception('Form is empty');
}
else{
    $fromEmail = htmlentities($_POST['email']) ;
    $fromName = htmlentities($_POST['contactname']);
    $podname = htmlentities($_POST['podname']);
    $link = htmlentities($_POST['link']);
    $description = htmlentities($_POST['description']);
    $firstrelease = htmlentities($_POST['firstrelease']);
    $release = htmlentities($_POST['release']);
    $download = htmlentities($_POST['download']);
    $audienceMetrix = htmlentities($_POST['audiencemetrix']);
    $message = htmlentities($_POST['comment']);

         // check file upload
         if(array_key_exists('uploadfile', $_FILES)){
            $file = $_FILES['uploadfile'];
            $fileName = $_FILES['uploadfile']['name'];
            $fileSize = $_FILES['uploadfile']['size'];
            $fileError = $_FILES['uploadfile']['error'];
            $fileTmpName  = $_FILES['uploadfile']['tmp_name'];
            $fileType = $_FILES['uploadfile']['type'];
            $fileExtension = explode('.',$fileName);
            $fileAutualExtention = end($fileExtension);
            $allowed = array('jpg', 'jpeg', 'png');
            
    
             // Checks to ensure that only jpeg and png files can be uploaded.
            if (in_array($fileAutualExtention,$allowed)) {
    
                if($fileError === 0)
                {
                     // Checks to ensure the file is not more than 2MB
                    if($fileSize < 2000000)
                    {
                        //$uploadfile = tempnam(sys_get_temp_dir(), $fileName);
                        //$fileNameNew = uniqid('', true).".".$fileAutualExtention;
                        $filepath = __DIR__.'/uploads/'.$fileAutualExtention;
                        move_uploaded_file($fileTmpName, $filepath);
                        
                        
    
    
                    }else{
                        throw new \Exception('This file is more than 2MB. Sorry, it has to be less than or equal to 2MB');
                    }
    
                } else{
                    throw new \Exception('There was an error uploading your file!');
                }
                
            }
            else
            {
               // $responseArray = array('type' => 'danger', 'message' => $errorMessage);
                throw new \Exception('This file extension is not allowed. Please upload a JPEG or PNG file');
            }
    
        }
}


// message that will be displayed when everything is OK :)
$okMessage = 'Pocaster form successfully submitted. Thank you, I will get back to you soon!';
// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. Please try again later';

//smtp credentials and server
$smtpHost = htmlentities('smtp.mailtrap.io');
$smtpUsername = htmlentities( '6c7f550429c56b');
$smtpPassword = htmlentities('a91307364d02a3');
//smtp credentials and server
// $smtpHost = 'smtp.gmail.com';
// $smtpUsername = 'urmail@gmail.com';
// $smtpPassword = 'password';



// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('contactname' => $fromName, 'email' => $fromEmail, 
                'podname' =>$podname, 'link' => $link,
                'description' =>$description, 'firstrelease' => $firstrelease,
                'release' =>$release, 'download' => $download,
                'audiencemetrix' =>$audienceMetrix, 'comment' => $message); 



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

    //Custom connection options
    //Note that these settings are INSECURE
    $mail->SMTPOptions = array(

    );
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


    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    // Attach the uploaded file
    $mail->addAttachment($filepath, 'Podcaster_LoGo');
    //Set the subject line
    $mail->Subject = 'New message from contact form';


  

    $emailTextHtml = "<div style='width:640px;'>";
    $emailTextHtml .= "<br><h2>You have a new Podcaster Interested</h2><hr>";

    $emailTextHtml .= "<br><table>";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email
        if (isset($fields[$key])) {
            if($key === "contactname")
            {
                $emailTextHtml .= "<tr><th>Contact Name : </th><td> $value</td></tr>";
            }
            else if ($key === "email")
            {
                $emailTextHtml .= "<tr><th>Email : </th><td> $value</td></tr>";
            }
            else if ($key === "podname")
            {
                $emailTextHtml .= "<tr><th>Name of Podcast : </th><td> $value</td></tr>";
            }
            else if ($key === "link")
            {
                $emailTextHtml .= "<tr><th>Link to Podcast</th><td> $value</td></tr>";
            }
            else if ($key === "description")
            {
                $emailTextHtml .= "<tr><th>Podcast Description</th><td> $value</td></tr>";
            }
            else if ($key ==="firstrelease")
            {
                $emailTextHtml .= "<tr><th>Date of First Release</th><td> $value</td></tr>";
            }
            else if ($key === "release")
            {
                $emailTextHtml .= "<tr><th>Release Schedule: </th><td> $value</td></tr>";
            }
            else if ($key === "download")
            {
                $emailTextHtml .= "<tr><th>Download Per Episode : </th><td> $value</td></tr>";
            }
            else if ($key === "audiencemetrix")
            {
                $emailTextHtml .= "<tr><th>Audience Metrix  : </th><td> $value</td></tr>";
            }
            else{
                $emailTextHtml .= "<tr><th>Comment : </th><td> $value</td></tr>";
            }
        }
    }
    $emailTextHtml .= "</table border='1'><br><hr>";
    $emailTextHtml .="</div>";
    $emailTextHtml .= "<p><br><br>";
    $emailTextHtml .= "<p><br>Bests,<br>Backyerd Media supporting team</p>";



    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML($emailTextHtml, __DIR__);



    //Send the message, check for errors
    if (!$mail->send()) {
        
        throw new \Exception('Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
    } else {
        $responseArray = array('type' => 'success', 'message' => $okMessage);
        //unlink($fileTmpName);
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



