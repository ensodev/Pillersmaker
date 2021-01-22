<?php
require_once "connection.php";

$user_id = $_SESSION['USER_ID'];

$sql="SELECT register.id, register.user_name, connect_friend.user_id, profile.profile_pic  FROM `register`  
    INNER JOIN connect_friend ON register.id = connect_friend.friend_id INNER JOIN profile ON register.id = profile.id
    WHERE friend_id =:friend_id AND approved = 0 LIMIT 10";
$stmt=$pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$resultConnection = $stmt->fetchAll();

// var_dump($resultConnection);
// exit();
?>
