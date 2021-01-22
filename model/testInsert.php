<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php

require_once "connection.php";
require_once "../others/alertFunction.php";


  $id="3"; 
  $about_me="2"; 
  $main_talent="3"; 
  $second_talent="4"; 
  $award1="5";
  $award1_date="6";
  $award2="7";
  $award2_date="8";
  $award3="9";
  $award3_date="10";
  $website="11";
  $email="12";
  $mobile="13";
  $profile_pic="14";

  
    $sql = "INSERT INTO profile(
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
      profile_pic)
      
    VALUE(
      :id, 
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
      :profile_pic      
      )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      'id'=>$id, 
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
      'profile_pic'=>$profile_pic
      ]);

    