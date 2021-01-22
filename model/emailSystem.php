<?php

/**this file is used by the admin to send mail to members
 * the function is to sent email to alert members about activities on their 
 * pillersmaker account
 */

function emailSystem($Email, $Subject, $Message){
$to = $Email;
$subject = $Subject;
$message = $Message;

// $message ='<p>Recieved a message for password reset</p>';
// $message .='<p>Below is the link to your password reset</p>';
// $message .='<a href="'.$url. '">'.$url.'</a></p>';

$headers = "from: Pillersmaker <cantactus@pillersmaker.com>\r\n";
$headers .= "reply-To: cantactus@pillersmaker.com\r\n";
$headers .= "Content-type: text/html\r\n";

mail($to, $subject, $message, $headers);

}
