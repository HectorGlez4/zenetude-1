<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */

require './PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('dydynaruto@hotmail.fr', 'First Last');
//Set an alternative reply-to address
/*$mail->addReplyTo('replyto@example.com', 'First Last');*/
//Set who the message is to be sent to
$mail->addAddress('@gmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer mail() test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->isHTML(true);
//Replace the plain text body with one created manually
$mail->Body = file_get_contents('examples/contents.html');
//Attach an image file
$mail->addAttachment('examples/images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
