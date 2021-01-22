<?php

session_start();


if(!isset($_POST['submit'])){
    require_once __DIR__ . '/../view/header3.php';
    
   echo "
    <div class='alert alert-success text-center'>
        Please click submit button
    </div>
    ";
    exit();
}

if(!isset($_POST['amount']) || $_POST['amount'] == '' || $_POST['submit'] == false){
    require_once __DIR__ . '/../view/header3.php';

    echo "
    <div class='alert alert-success text-center'>
        Please filled all the field
    </div>
    ";
    
    exit();
}

if(!isset($_POST['description']) || $_POST['description'] == '' || $_POST['description'] == false){
    require_once __DIR__ . '/../view/header3.php';

    echo "
    <div class='alert alert-success text-center'>
        Please filled all the Description field
    </div>
    ";
    
    exit();
}

$post = $_POST;
$searchValue = array(';', '.', '-', '*', '-');
$replaceValue = array('');
$post = str_replace($searchValue, $replaceValue, $post);

 
$user_id = (int) $_SESSION['USER_ID'];
$ranChar = array('ace', 'bdf', 'gik', 'hjl' , 'moq', 'npr', 'suw', 'tvx', 'yae', 'zbd');
$generateRand = rand(0,9);
$generateRand2 = rand(0,9);

$amount = (int) $post['amount'];
$ticket_id = "$user_id".date('U').".$user_id.".$ranChar[$generateRand2].$ranChar[$generateRand].".$amount";
$user_email = $_SESSION['USER_EMAIL'];
$description = $post['description'];
$timeGenerate = date('U');

require_once __DIR__ . '/getSettings.php';
$valid_days = $resultSettings->paymet_ticket_validity_days;
$valid_days = 86400 * $valid_days;
$time_expired = $timeGenerate + $valid_days;



require_once __DIR__  . '/connection.php';

/**
 * search if the user has a ticket tht has not been paid and still within valid period
 * if found then dont allow the user to generate another ticket
 * 
 */
$PresentTime = date('U');
$sql ="SELECT * FROM `paymentticket` WHERE  user_id =:user_id AND time_expired > $PresentTime AND status = 0";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$resultValidTicket = $stmt->fetch();

if(isset($resultValidTicket) AND $resultValidTicket != false){
    require_once __DIR__ . '/../view/header3.php';
    echo 'You have an active ticket please make payment or delete ticket from your board';
    exit();
}


 //insert new ticket for the user since there is no active ticket
$sql = 'INSERT INTO `paymentticket` (ticket_id, user_id, user_email, amount, message, time_generated, time_expired) 
              VALUE (:ticket_id,:user_id,:user_email,:amount,:message,:time_generated, :time_expired)';
$stmt=$pdo->prepare($sql);
$stmt->execute(['ticket_id'=>$ticket_id, 'user_id'=>$user_id, 'user_email'=>$user_email, 'amount'=>$amount,
    'message'=>$description, 'time_generated'=>$timeGenerate, 'time_expired'=>$time_expired]);


echo "<script>location.href='/view/Tickets.php?s=$user_id'</script>";








