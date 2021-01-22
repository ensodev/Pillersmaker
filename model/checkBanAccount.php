<?php

require_once 'connection.php';
$user_email_check_ban = $_SESSION['USER_EMAIL'];
$sql ="SELECT * FROM register WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email'=>$user_email_check_ban]);

$resultBanUser = $stmt->fetch();

if($resultBanUser->ban == 1){
    
    session_unset();
    session_destroy();
    //sessionDie();

    echo "<script>location.href='/view/banaccount.php?email=$user_email_check_ban'</script>";
    // header("Location: /view/banaccount.php?email=$user_email_check_ban");
    exit();
}
