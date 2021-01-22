<?php 
    session_start();
?>
<?php

  require_once  __DIR__ . "/connection.php";
  require_once  __DIR__ . '/../others/alertFunction.php';
  


  if(!isset($_POST['submit'])){
    $msg="Please fill the right form. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);  
    exit(); 
  }

  if($_POST['message'] == "" || !isset($_POST['message'])){
    $msg="Please fill in your testimony. ";
    $msgColor="danger";
    msgAlert($msg, $msgColor);
    exit();  
  }

  $user_id = $_SESSION['USER_ID'];
  $user_name = $_SESSION['USER_UNAME'];
  $time_post = time();
  // echo $time_post;
  // exit();

  
  $testimony = $_POST['message'];


  $msg_message = $testimony;

  require_once __DIR__ . "/msgReformat.php";

  $testimony = $articleMessage;

 
  $sql="SELECT * FROM `testimanycount` WHERE user_id =:user_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['user_id'=>$user_id]);
  $result=$stmt->fetch();

  $zero = 0;

  if(!$result){
    $sql = "INSERT INTO testimanycount(user_id, total_num) VALUE(:user_id,:total_num)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id, 'total_num'=>$zero]);

	$msg="Your Testimony posted. ";
  $msgColor="success";
  
  echo "<script>location.href='/view/giveTestimony.php?msg=$msg&msgColor=$msgColor'</script>";
	//header('Location: /view/giveTestimony.php?msg='. $msg.'&msgColor='.$msgColor); 
	exit();
  }

require_once "getSettings.php";
if(!isset($resultSettings->testimony_max)){
	$msg="Something just went wrong contact the customer Care please. ";
  $msgColor="info";
  
  echo "<script>location.href='/view/giveTestimony.php?msg=$msg&msgColor=$msgColor'</script>";
	//header('Location: /view/giveTestimony.php?msg='. $msg.'&msgColor='.$msgColor); 
  
}  

  $total = "";

  if($result){
    
    if($result->total_num >= $resultSettings->testimony_max){
      $msg="You cant post more than five testimonies, please contact admin. ";
      $msgColor="danger";
      msgAlert($msg, $msgColor); 
      exit();
    }

  }

  $total = $result->total_num;

  $sql = "INSERT INTO testimony(user_id, 
                      user_name, 
                      testimony,
                      time_post)

          VALUE(:user_id, 
                :user_name,
                :testimony, 
                :time_post)";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(['user_id'=>$user_id,
                  'user_name'=>$user_name,
                  'testimony'=>$testimony,
                  'time_post'=>$time_post]);

// update testimony_count table
 $total = $total + 1;
//echo $total;

// echo $main_total;
// echo $user_id;


$sql = "UPDATE testimanycount SET total_num =:total_num WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['total_num'=>$total, 'user_id'=>$user_id]);

 

$msg="Your Testimony posted";
$msgColor="success";

echo "<script>location.href='/view/giveTestimony.php?msg=$msg&msgColor=$msgColor'</script>";
//header('Location: /view/giveTestimony.php?msg='. $msg.'&msgColor='.$msgColor); 

