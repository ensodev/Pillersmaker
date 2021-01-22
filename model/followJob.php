<?php
session_start();

require_once ("connection.php");

// var_dump($_GET);
// exit();

if(!isset($_GET['postid']) || !isset($_GET['poster']) || !isset($_GET['topic'])){
    echo 'not set ot not int';
    exit();
}

$postid = $_GET['postid'];
$posterid = $_GET['poster'];
$postTopic = $_GET['topic'];

$userId = $_SESSION['USER_ID'];


$sql = "SELECT * FROM `profile` WHERE id =:posterid" ;
$stmt = $pdo->prepare($sql);
$stmt->execute(['posterid'=>$posterid]);
$result = $stmt->fetch();

// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// exit();

if($result == false || !isset($result)){
    echo 'not set2';
}

// var_dump($result);
// exit();

if($result->profile_pic == 'home.png' || 
    $result->mobile == 'Not updated' ||
    $result->email == 'Not updated'){
        echo 'profile not set';
        exit();
    }
  
$sql = "SELECT * FROM `register` WHERE id =:poster" ;
$stmt = $pdo->prepare($sql);
$stmt->execute(['poster'=>$posterid]);
$resultPost = $stmt->fetch();

if($resultPost =='false' || !isset($resultPost)){
    echo 'not set 3';
    exit();
}


    $posterName = $resultPost->user_name;
    $posterId = $resultPost->id;
    $postId = $postid;
    $postTitle = $postTopic;
    $userId = $userId;
    $userNumber = $result->mobile;
    $userName = $_SESSION['USER_NAME'];
    $messsage= "$postTopic ";
    $userEmail = $resultPost->email;
    //$messsage= "Contact you base on your Job empoyment post with topic <a href='/../view/viewPost.php?postid=$postId&user_id=$posterId>$postTitle</a>";
    $service='job';


// var_dump($details);
//   exit();
require_once __DIR__ ."/sendMessageFunction2.php";

messageAuto(
    $posterName,
    $posterId,
    $postId,
    $postTitle,
    $userId,
    $userNumber,
    $userName,
    $messsage,
    $userEmail,
    $service
);




