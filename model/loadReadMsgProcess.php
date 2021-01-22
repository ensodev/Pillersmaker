<?php
  // session_start();
  // require_once 'connection.php'; 

$user_id = $_SESSION['USER_ID'];

$sql="SELECT * FROM messages where reciever_id = :user_id AND msg_mark_read = 1 ORDER BY msg_id DESC LIMIT 20";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$results=$stmt->fetchAll();

// var_dump($results);
// exit(); 

if(!$results){

  echo "<div class='container mt-3'>
          <div class='alert alert-info text-center'>
            Your read message box is empty!..
            <a href='/view/emailBoard.php'>Back to Inbox</a>
          </div>
        </div>";
}

$userID = $_SESSION['USER_ID'];
$sql ="SELECT COUNT(*) FROM messages WHERE reciever_id =:R_id AND msg_mark_read = 1";
$stmt = $pdo->prepare($sql);
$stmt -> execute(['R_id'=>$user_id]);
$resultMSGred = $stmt->fetchColumn();

?>