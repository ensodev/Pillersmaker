<?php
session_start();



  require_once __DIR__ . '/connection.php';
  require_once __DIR__ . '/../controller/profileEditAlert.php';
  
  $user_id = $_SESSION['USER_ID'];

  if(!isset($_POST)){
   
    require_once __DIR__ . '/../view/headerNOSession.php ';
    $msg = "something went wrong. ";
    $msgColor = "danger";
    alertProfile($msg, $msgColor);
    exit();

  }

  if(!isset($_POST['submit'])){
   
    require_once __DIR__ . '/../view/headerNOSession.php ';
    $msg = "something went wrong.. ";
    $msgColor = "danger";
    alertProfile($msg, $msgColor);
    exit();

  }

  $main_talent = $_POST['main_talent'];
  $second_talent = $_POST['second_talent'];

  if(!isset($main_talent) || !isset($second_talent)
      || $main_talent == "" || $second_talent == ""){

        require_once __DIR__ . '/../view/headerNOSession.php ';
        $msg = "Fields can't be empty, something went wrong.. ";
        $msgColor = "danger";
        alertProfile($msg, $msgColor);
        exit(); 

  }

  $sql = "UPDATE profile SET main_talent =:main_talent,
                             second_talent=:second_talent 
          WHERE 
                             id = $user_id";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(['main_talent'=>$main_talent, 'second_talent'=>$second_talent, ]);

  echo "<script>location.href='/view/profile.php'</script>";
  //header('Location: /view/profile.php');

