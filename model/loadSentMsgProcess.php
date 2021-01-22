<?php
  // session_start();
  // require_once 'connection.php'; 

$user_id = $_SESSION['USER_ID'];
$read = 1;
$sql="SELECT * FROM messages where sender_id = :user_id AND sender_delete = 0 ORDER BY msg_id DESC LIMIT 20";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$results=$stmt->fetchAll();

// var_dump($results);
// exit();

if(!$results){

  echo "<div class='container mt-3'>
          <div class='alert alert-info text-center'>
            Your sent message box is empty
          </div>
        </div>";
}
 
$userID = $_SESSION['USER_ID'];
$sql ="SELECT COUNT(*) FROM messages WHERE sender_id = :sender_id AND sender_delete = 0";
$stmt = $pdo->prepare($sql);
$stmt -> execute(['sender_id'=>$user_id]);
$resultMSGsnt = $stmt->fetchColumn();


?>