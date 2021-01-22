<?php
require_once 'connection.php';
require_once  __DIR__ . '/../view/header2.php';
require_once  __DIR__ . '/../controller/checkSessionContol.php';

checkNotSession();

if(!isset($_GET['id']) || $_GET['id'] == 0){
  echo "<script>location.href=' /view/noPage.html'</script>";
  //header (__DIR__ . '/../view/noPage.html');
  exit();
}


$user_id = $_SESSION['USER_ID'];
$profile_id = $_GET['id'];

//confirm if there is already a like
// $sql = "SELECT * FROM like_table WHERE profile_id =:profile_id AND user_id =:user_id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['profile_id'=>$profile_id, 'user_id'=>$user_id]);
// $result = $stmt->fetch();

// if($result){
//     header('Location: searchProfileProcess.php?id='.$profile_id);
//     exit();
// }




$sql = "SELECT * FROM profile WHERE id =:profile_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['profile_id'=>$profile_id]);
$result = $stmt->fetch();

if(!$result || $result == false){
  echo "<script>location.href=' /view/noPage.html'</script>";
  //header('Location: ../view/noPage.html');
  exit();
}

$like_no = $result->like_no;
$like_no_new = $like_no + 1;

//update profile like
$sql = "UPDATE profile SET like_no =:like_no WHERE id =:profile_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['like_no'=>$like_no_new, 'profile_id'=>$profile_id]);

//update user liked
$sql = "SELECT * FROM profile WHERE id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$result = $stmt->fetch();

$liked_no = $result->liked_no ?? 0; //if(isset) shortcut
$liked_no_new = $liked_no + 1;

$sql = "UPDATE profile SET liked_no =:liked_no WHERE id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['liked_no'=>$liked_no_new, 'user_id'=>$user_id]);

//Recoding into like table
$sql = "INSERT INTO like_table(profile_id, user_id) VALUE(:profile_id, :user_id)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['profile_id'=>$profile_id, 'user_id'=>$user_id]);

echo "<script>location.href='searchProfileProcess.php?id=$profile_id'</script>";
//header('Location: searchProfileProcess.php?id='.$profile_id);


