<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php 

  require_once('connection.php');
  
  require_once  __DIR__ . '/../controller/profileEditAlert.php';

  $user_id = $_SESSION['USER_ID'];

  if(!isset($_POST)){

    require_once  __DIR__ . '/../view/headerNOSession.php ';
    $msg = "something went wrong. ";
    $msgColor = "danger";
    alertProfile($msg, $msgColor);
    exit();

  }

  if(!isset($_POST['submit'])){
   
    require_once  __DIR__ . '/../view/headerNOSession.php ';
    $msg = "something went wrong.. ";
    $msgColor = "danger";
    alertProfile($msg, $msgColor);
    exit();
    
  }

  $award1 = $_POST['award1'];
  $award2 = $_POST['award2'];
  $award3 = $_POST['award3'];
  $award1_date = $_POST['date1'];
  $award2_date = $_POST['date2'];
  $award3_date = $_POST['date3'];

  
  if(!isset($award1) || !isset($award2) || !isset($award3)
     || $award1 == "" || $award2 == "" || $award3 == ""){

    require_once  __DIR__ . '/../view/headerNOSession.php ';
    $msg = "Fields can't be empty, something went wrong.. ";
    $msgColor = "danger";
    alertProfile($msg, $msgColor);
    exit();

  }


  //format awards/decriptions
  
   
  require_once __DIR__ . "/formatText.php";
  $award1 = formatText($award1);
  $award2 = formatText($award2);
  $award3 = formatText($award3);

    
  // echo $award1;
  // echo $award2;
  // echo $award3;



  if(!isset($award1_date) || !isset($award2_date) || !isset($award3_date)
     || $award1_date == "" || $award2_date == "" || $award3_date == ""){

    require_once  __DIR__ . '/../view/headerNOSession.php ';
    $msg = "Fields can't be empty, something went wrong.. ";
    $msgColor = "danger";
    alertProfile($msg, $msgColor);
    exit();

  }

  $sql = "UPDATE profile SET award1 =:award1,
                             award2 =:award2,
                             award3 =:award3,
                             award1_date =:award1_date,
                             award2_date =:award2_date,
                             award3_date =:award3_date
          WHERE id = $user_id";

  $stmt = $pdo->prepare($sql);
  $stmt->execute([            'award1'=>$award1,
                              'award2'=>$award2,
                              'award3'=>$award3,
                              'award1_date'=>$award1_date ,
                              'award2_date'=>$award2_date,
                              'award3_date'=>$award3_date]);

  
  echo "<script>location.href='/view/profile.php'</script>";
  header('Location: /view/profile.php');

  ?>

  <?php
 

