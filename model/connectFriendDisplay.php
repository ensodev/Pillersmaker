<?php

    require_once 'connection.php';
//  require_once '../controller/checkSessionContol.php';
 
//  checkNotSession();

 $user_id= $_SESSION['USER_ID'];


 $sql = "SELECT COUNT(*) FROM connect_friend WHERE friend_id =:user_id and approved = 1";
 $stmt = $pdo->prepare($sql);
 $stmt->execute(['user_id'=>$user_id]);
 $resultConnect = $stmt->fetchColumn();
 


