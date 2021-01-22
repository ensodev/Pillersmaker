<?php
require_once  __DIR__ . '/../model/connection.php';
require_once  __DIR__ . '/../others/alertFunction.php';

//check if submit button is submitted
if(!isset($_POST['submit'])){

    echo "<script>location.href='/view/resetPassword.php'</script>";
    // header('Location: ../view/resetPassword.php');
    exit();
}

$email = $_POST['email'];

// validating the emil
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

    $msg = "Invalid email";
    $msgColor ="danger";
    msgAlertToken($msg, $msgColor);
}

//checking if the email exist in the members database
$sql ="SELECT * FROM register WHERE email = :email";
$stmt =$pdo->prepare($sql);
$stmt->execute(['email'=>$email]);

$result = $stmt->fetch();

if(empty($result)){

    $msg="Email not found, please make sure the email is correct";
    $msgColor="danger";
    msgAlertToken($msg, $msgColor);    
}

//checking if the mail exist in the password reset table
$sql ="SELECT * FROM passwordreset WHERE resetemail = :email";
$stmt =$pdo->prepare($sql);
$stmt->execute(['email'=>$email]);

$result = $stmt->fetch();

if(!empty($result)){

    $sql = "DELETE FROM passwordreset WHERE resetemail =:email";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(['email'=>$email]);
    
}


$selector = bin2hex(random_bytes(8));
$token = random_bytes(32);

//$url = "https://www.pillersmaker/model/createNewPassword.php?selector=". $selector . "&validator=" . bin2hex($token);
$url = "pillersmaker.com.ng/model/createNewPassword.php?selector=". $selector . "&validator=" . bin2hex($token);


//21600 = 6hrs 
require_once  __DIR__ . '/getSettings.php';

if(!isset($resultSettings->password_toke_valid_hours) || $resultSettings->password_toke_valid_hours == 0){
    $expires = date('U') + 21600;
}else{
    $expires = date('U') + $resultSettings->password_toke_valid_hours;    
}


$hashedToken = password_hash($token, PASSWORD_DEFAULT);

$sql = "INSERT INTO passwordreset(resetemail, resetselector, resettoken, resetexpire) 
        VALUE (:email, :selector, :token, :expires)";

$stmt =$pdo->prepare($sql);
$stmt->execute(['email'=>$email, 'selector'=>$selector, 'token'=>$hashedToken, 'expires'=>$expires]);

//sending email
$to = $email;

$subject = "Password reset for Pillersmaker";

$message ='<p>Recieved a message for password reset</p>';
$message .='<p>Below is the link to your password reset</p>';
$message .='<a href="'.$url. '">'.$url.'</a></p>';

$headers = "from: pillersmaker <cantactus@pillersmaker.com>\r\n";
$headers .= "reply-To: cantactus@pillersmaker.com\r\n";
$headers .= "Content-type: text/html\r\n";

mail($to, $subject, $message, $headers);

$sql = "INSERT INTO textpasswordreset(msg_link) 
        VALUE (:message)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['message'=>$message]);



$msg = "An email has been sent to you to complete your password reset request";

echo "<script>location.href='/controller/alertControlToken.php?msg=$msg&msgColor=success'</script>";
//header('Location: ../controller/alertControlToken.php?msg='.$msg.'&msgColor=success');
