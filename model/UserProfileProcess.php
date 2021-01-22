<?php 
  require_once('connection.php');
  $user_id = $_SESSION['USER_ID'];

$sql="SELECT * FROM profile WHERE id = :id limit 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=>$user_id]);
$result = $stmt->fetch();

if(!$result){
  $uids=$user_id; 
  $about_me="Not updated"; 
  $main_talent="Not updated"; 
  $second_talent="Not updated"; 
  $award1="Not updated";
  $award1_date="Not updated";
  $award2="Not updated";
  $award2_date="Not updated";
  $award3="Not updated";
  $award3_date="Not updated";
  $website="Not updated";
  $email="Not updated";
  $mobile="Not updated";
  $profile_pic="home.png";
  $like_no=0;
  $liked_no=0;
  $privacy=0;
  $last_msg_time="";

    $sql = "INSERT INTO `profile`(
      id, 
      about_me, 
      main_talent, 
      second_talent, 
      award1,
      award1_date,
      award2,
      award2_date,
      award3,
      award3_date,
      website,
      email,
      mobile,
      profile_pic,
      like_no,
      liked_no,
      privacy,
      last_msg_time
      ) 
    value(
      :uids, 
      :about_me, 
      :main_talent, 
      :second_talent, 
      :award1,
      :award1_date,
      :award2,
      :award2_date,
      :award3,
      :award3_date,
      :website,
      :email,
      :mobile,
      :profile_pic,
      :like_no,
      :liked_no,
      :privacy,
      :last_msg_time)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      'uids'=>$uids, 
      'about_me'=>$about_me, 
      'main_talent'=>$main_talent, 
      'second_talent'=>$second_talent, 
      'award1'=>$award1,
      'award1_date'=>$award1_date,
      'award2'=>$award2,
      'award2_date'=>$award2_date,
      'award3'=>$award3,
      'award3_date'=>$award3_date,
      'website'=>$website,
      'email'=>$email,
      'mobile'=>$mobile,
      'profile_pic'=>$profile_pic,
      'like_no'=>$like_no,
      'liked_no'=>$liked_no,
      'privacy'=>$privacy,
      'last_msg_time'=>$last_msg_time]);
}


$sql = "SELECT COUNT(*) FROM postworks WHERE user_id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$resultPostCounts = $stmt->fetchColumn();