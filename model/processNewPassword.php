<?php

if(!isset($_POST['reset'])){
    echo "<script>location.href='/index1.php'</script>";
    //header("Location: ../index1.php");
    exit();

}

if(empty($_POST['password']) || empty($_POST['re-password'])){
   
    $msg = "Please Make sure both password are filled";

    echo "<script>location.href='/model/createNewPassword.php?msg={$msg}'</script>";
    //header("Location: ../model/createNewPassword.php?msg={$msg}");
    exit();
    
}

if($_POST['password'] !== $_POST['re-password']){

    $msg = "Please Make sure both password match";

    echo "<script>location.href='/model/createNewPassword.php?msg={$msg}'</script>";
    //header("Location: ../model/createNewPassword.php?msg={$msg}");
    exit();
   
}

$selector = $_POST['selector'];
$validator = $_POST['validator'];
$password = $_POST['password'];
$rePassword= $_POST['re-password'];

// echo $password."</br>";

$currentDate = date("U");
require_once __DIR__ . '/../model/connection.php';

$sql = "SELECT * FROM passwordreset WHERE resetselector=:resetselector AND resetexpire >= :currentDate";
$stmt = $pdo->prepare($sql);
$stmt->execute(['resetselector'=>$selector, 'currentDate'=>$currentDate]);
$result = $stmt->fetch();

if(!$result){

    require_once  __DIR__ . '/../others/alertFunction.php';
    $msg = "Please resend a reset password.";   
    $msgColor ="danger";
    msgAlertToken($msg, $msgColor);
}
// echo $password."</br>";

$tokenBin = hex2bin($validator);
$tokenCheck = password_verify($tokenBin, $result->resettoken);

if(!$tokenCheck){
    require_once  __DIR__ . '/../others/alertFunction.php';
    $msg = "Please resend a reset password..";   
    $msgColor ="danger";
    msgAlertToken($msg, $msgColor);
}

// echo $password."</br>";

if($tokenCheck === true){

$resultEmail = $result->resetemail;



$sql = "SELECT * FROM `passwordreset` WHERE resetemail=:resultEmail";
$stmt = $pdo->prepare($sql);
$stmt->execute(['resultEmail'=>$resultEmail]);
$result = $stmt->fetchAll();

}

// echo $password."</br>";

if(!$result){

        require_once  __DIR__ . '/../others/alertFunction.php';
        $msg = "There was an error reseting you password, please resubmit a password reset";   
        $msgColor ="danger";
        msgAlertToken($msg, $msgColor);
        exit();
}

$passW = $_POST['password'];



$newHashedPassword = password_hash($passW, PASSWORD_DEFAULT);

// echo $newHashedPassword;

$sql = "UPDATE register SET pass_word =:pass_word WHERE email=:resultEmail";

$stmt = $pdo->prepare($sql);
$stmt->execute(['pass_word'=>$newHashedPassword, 'resultEmail'=>$resultEmail]);


// delete the old token record
$sql = "DELETE FROM passwordreset WHERE resetemail=:resetemail";
$stmt = $pdo->prepare($sql);
$stmt->execute(['resetemail'=>$resultEmail]);

require_once  __DIR__ . '/../others/alertFunction.php';
$msg = "Your Password is successfully updated";   
$msgColor ="success";
msgAlertToken($msg, $msgColor);

