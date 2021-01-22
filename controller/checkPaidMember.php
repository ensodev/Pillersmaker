<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/getPath.php');?>
<?php

 

//exit();
?>
<?php
  require_once ($modelPath .'/connection.php');

  $user_id = $_SESSION['USER_ID'];

  $sql = "SELECT * FROM membershippayment WHERE user_id =:user_id AND confirmed = 1";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['user_id'=>$user_id]);
  $result=$stmt->fetch();
 
  if(!$result){
    require_once ($viewPath . "/headerNOSession.php");
    require_once ($othersPath ."/alertFunction.php");

    // $msg = "Only Paid members can access page "."<a href='/../view/payment.php'>Payment </a>| "."<a href='/../view/layout.php'>Home </a> | ";
    // $msgColor="danger";
    // msgAlert($msg, $msgColor);  

    echo "
      <div class='alert alert-info text-center'>
        Only Paid members can access page 
        <a href='/view/payment.php'>Payment </a>| '.'<a href='/view/layout.php'>Home </a> |';
      </div>
    ";
    exit();
  }
  