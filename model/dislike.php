<?php
require_once 'connection.php';
require_once  __DIR__ . "/../view/header2.php";
require_once  __DIR__ . "/../controller/checkSessionContol.php";

checkNotSession();

if(!isset($_GET['id'])){
  echo "<script>location.href='/view/noPage.html'</script>";
  //header('Location: ../view/noPage.html');
  exit();
}

$user_id = $_SESSION['USER_ID'];
$profile_id = $_GET['id'];

$sql = "SELECT * FROM like_table WHERE profile_id =:profile_id AND user_id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['profile_id'=>$profile_id, 'user_id'=>$user_id]);
$result = $stmt->fetch();

if(!$result){
    echo "<script>location.href='searchProfileProcess.php?id=$profile_id'</script>";
    //header('Location: searchProfileProcess.php?id='.$profile_id);
    exit();
}


$sql = "DELETE FROM like_table WHERE user_id =:user_id AND profile_id =:profile_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id, 'profile_id'=>$profile_id]);
//updates total in profile

    $sql = "SELECT * FROM profile WHERE id =:user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id]);
    $result = $stmt->fetch();
    
    $liked_no = $result->liked_no ?? 0; //if(isset) shortcut
    $liked_no_new = $liked_no - 1;
    
    $sql = "UPDATE profile SET liked_no =:liked_no WHERE id =:user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['liked_no'=>$liked_no_new, 'user_id'=>$user_id]);


    $sql = "SELECT * FROM profile WHERE id =:profile_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['profile_id'=>$profile_id]);
    $result = $stmt->fetch();
    
    $liked_no = $result->like_no ?? 0; //if(isset) shortcut
    $like_no_new = $liked_no - 1;
    
    $sql = "UPDATE profile SET like_no =:like_no WHERE id =:profile_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['like_no'=>$like_no_new, 'profile_id'=>$profile_id]);

    echo "<script>location.href='searchProfileProcess.php?id=$profile_id'</script>";
    //header('Location: searchProfileProcess.php?id='.$profile_id);


