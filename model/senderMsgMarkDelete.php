<?php
require_once 'connection.php'; 
require_once  __DIR__ . '/../view/header2.php';
require_once  __DIR__ . '/../controller/checkSessionContol.php'; 



checkNotSession();
?>

<?php

if(!isset($_GET['id'])){
  echo 'bad';
  exit();
}



$msg_id = $_GET['id'];

$user_id = $_SESSION['USER_ID'];

$sql="SELECT * FROM messages where msg_id = :msg_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['msg_id'=>$msg_id]);
$results=$stmt->fetch();

// var_dump($results);
// exit();

if(!$results){

  echo "<div class='container mt-3'>
          <div class='alert alert-info text-center'>
            Something went wrong try agin later!
          </div>
        </div>";
exit();
}

$catch_msg_id = $results->msg_id;
$sender_delete = 1;

$sql = "UPDATE `messages` SET sender_delete = $sender_delete WHERE msg_id = $catch_msg_id";

$stmt = $pdo->prepare($sql);

// $stmt->execute(['msg_mark_read'=>$msg_mark_read, 'catch_msg_id'=>$catch_msg_id]);
$stmt->execute();

echo "<script>location.href='/view/emailBoard.php'</script>";
//header('location: /view/emailBoard.php');
exit();
?>



