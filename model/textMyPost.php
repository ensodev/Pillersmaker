<?php require_once '../model/connection.php';?> 
<?php
 

if(!isset($_GET['profilePosts'])){
    
  $user_id = $_SESSION['USER_ID'];

  $sql = "SELECT * FROM postworks WHERE user_id =:user_id  ORDER BY id desc LIMIT 50";
  $stmt=$pdo->prepare($sql);
  $stmt->execute(['user_id'=>$user_id]);
  $resultPost=$stmt->fetchAll();

  if(!$resultPost){
    ?>
      <div class="container mt-4 text-center">
      <div class='alert alert-info'>You have no post to view...!
        <a href="/view/profile.php">Back to profile</a></div>
      </div>
    <?php
    exit();

  }
  ?>
  <?php
}else{

  $User_id = $_GET['profilePosts'];

  // Note todo here later
  //search for user with the id profilePost

  //select post for the id
  $sql = "SELECT * FROM postworks WHERE user_id =:User_id  ORDER BY id desc LIMIT 50";
  $stmt=$pdo->prepare($sql);
  $stmt->execute(['User_id'=>$User_id]);
  $resultPost=$stmt->fetchAll();

  if(!$resultPost){
    ?>
      <div class="container mt-4 text-center">
      <div class='alert alert-info'>You have no post to view...!
        <a href="/view/profile.php">Back to profile</a></div>
      </div>
    <?php
    exit(); 
  }
  ?>
  <?php

}
 
    

 
  

