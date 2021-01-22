<?php

if(isset($_GET['deleted'])){
  if($_GET['deleted'] == 1){
    echo "
    <div class='container mt-3 text-center'>
      <div class='alert alert-danger'>
        Message deleted!.<a href='../view/layout.php'>Back Home</a>
      </div>
    </div>
    ";
  }
}


if(isset($_GET['noMsgToDelete'])){
  if($_GET['noMsgToDelete'] == 1){
    echo "
    <div class='container mt-3 text-center'>
      <div class='alert alert-danger'>
        You dont have message to be deleted!..<a href='../view/layout.php'>Back Home</a>
      </div>
    </div>
    ";
  }
}

$user_id = $_SESSION['USER_ID'];
$sql="SELECT * FROM messages WHERE reciever_id = :user_id AND msg_mark_read = 0 AND reciever_delete = 0 ORDER BY msg_id DESC LIMIT 20";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$results=$stmt->fetchAll();

// var_dump($results);
// exit();

if(!$results){

  echo "<div class='container mt-3'>
          <div class='alert alert-info text-center'>
            Your inbox is empty..<a href='../view/layout.php'>Back Home</a>
          </div>
        </div>";
}

?>