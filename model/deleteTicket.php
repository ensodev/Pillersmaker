<?php

require_once __DIR__ . '/connection.php';

if(!isset($_GET['d'])){
        echo "<script>location.href='/../controller/logoutControl.php'</script>";
        exit();

}


if(!isset($_GET['ticket'])){
    echo "<script>location.href='/../controller/logoutControl.php'</script>";
    exit();
}


$user_id = $_GET['d'];
$ticket_id = $_GET['ticket'];

// var_dump($ticket_id);
// exit();

//validate $_GET

$searchVaraible = array(',', '-','--', '?', '"', '<', '>', '=', '!');
$replaceVaraible = '';

$user_id = str_replace($searchVaraible, $replaceVaraible, $user_id);
$ticket_id = str_replace($searchVaraible, $replaceVaraible, $ticket_id);

//check if the user have made payment or submit payment detail
$sql = 'SELECT * FROM `payments` WHERE ticket_id =:ticket_id AND user_id =:user_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id, 'ticket_id'=>$ticket_id]);
$resultPaid = $stmt->fetch();

if(isset($resultPaid) AND $resultPaid != false){
    require_once __DIR__ . '/../view/header3.php';
    echo "
    <div class='alert alert-success text-center'>
        Try again later
    </div>
";

exit();
}

$sql = 'SELECT * FROM `paymentticket` WHERE ticket_id =:ticket_id AND user_id =:user_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id, 'ticket_id'=>$ticket_id]);
$resultDelTicket = $stmt->fetch();

if( $resultDelTicket == false || !isset($resultDelTicket)){
    echo "<script>location.href='/../controller/logoutControl.php'</script>";
    exit();
}

$sql = 'DELETE FROM `paymentticket` WHERE ticket_id =:ticket_id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['ticket_id'=>$ticket_id]);

require_once __DIR__ . '/../view/header.php';
echo "
    <div class='alert alert-success text-center'>
        Your ticket has been deleted
    </div>
";

exit();







