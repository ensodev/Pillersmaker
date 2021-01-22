<?php 

$resultPostLikes;
$resultPostVotes;
$resultPostDislikes;

$sql = "SELECT * FROM `total_like` WHERE post_id =:postid LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['postid'=>$post_id]);
$resultPostLikes = $stmt->fetch();

if(!isset($resultPostLikes)){
    global $resultPostLikes;
    $resultPostLikes = 0;
}

$sql = "SELECT * FROM `total_vote` WHERE post_id =:postid LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['postid'=>$post_id]);
$resultPostVotes = $stmt->fetch();

if(!isset($resultPostVotes)){
    global $resultPostVotes;
    $resultPostVotes = 0;
}

$sql = "SELECT * FROM `total_dislike` WHERE post_id =:postid LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['postid'=>$post_id]);
$resultPostDislikes = $stmt->fetch();

// var_dump($resultPostDislikes);
// exit();

if(!isset($resultPostDislikes)){
    global $resultPostDislikes;
    $resultPostDislikes = 0;
}



