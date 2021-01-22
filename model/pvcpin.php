<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php require_once 'connection.php';?>
<?php require_once  __DIR__ . '/../controller/checkSessionContol.php';?>
<?php checkNotSession(); ?>
<?php require_once __DIR__ . '/../controller/checkPaidMember.php'; ?>


<?php
if(!isset($_POST)){
  echo "<script>location.href='/view/pvcpin.php?done=spamerror'</script>";
  //header('Location: ../view/pvcpin.php?done=spamerror');
  exit();
}

if(!isset($_POST['firstPin']) || !isset($_POST['secondPin'])){

  echo "<script>location.href='/view/pvcpin.php?done=pinerror'</script>";
  //header('Location: ../view/pvcpin.php?done=pinerror');
  exit();
}


if(!isset($_POST['submit'])){
  echo "<script>location.href='/view/pvcpin.php?done=spamerror'</script>";
  //header('Location: ../view/pvcpin.php?done=spamerror');
  exit();
}


$firstPin  = $_POST['secondPin'];
$secondPin = $_POST['secondPin'];
$user_id = $_SESSION['USER_ID'];

//checking if they are of same value
if($firstPin != $secondPin){
  echo "<script>location.href='/view/pvcpin.php?done=pinerror'</script>";
  //header('Location: ../view/pvcpin.php?done=pinerror');
}


if(strlen($firstPin) != 6){
  echo "<script>location.href='/view/pvcpin.php?done=counterror'</script>";
  //header('Location: ../view/pvcpin.php?done=counterror');
  exit();
}

   
//checking if the password enterd is correct or not

 require_once __DIR__ . '/../model/passCheck.php'; 

//end password check


$firstPin = (int) $firstPin;

$sql = "SELECT * FROM `pvcpin` WHERE user_id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$resultUser = $stmt->fetch();

// var_dump($resultUser);
// exit();

if(!isset($resultUser)){
  echo "<script>location.href='/view/pvcpin.php?done=error'</script>";
  //header('Location: ../view/pvcpin.php?done=error');
  exit();
}

/*auth must be 1 before pin can be changed...this is some sort of
* scurity measure to first log user out and makesure the enter the right password
*
*/
if($resultUser->auth == 0){
  $sql = "UPDATE `pvcpin` 
  SET auth =:auth
  WHERE user_id =:user_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['user_id'=>$user_id, 'auth'=> 1]);
  require_once '../controller/logoutControl.php';
  exit();
}elseif ($resultUser->auth == 1) {
  $sql = "UPDATE `pvcpin` 
        SET pin =:password, auth =:auth
        WHERE user_id =:user_id";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(['password'=>$firstPin, 'auth'=> 0,'user_id'=>$user_id]);
  
  
   echo "<script>location.href='/view/pvcpin.php?done=yes'</script>";
  //header('Location: ../view/pvcpin.php?done=yes');
  exit();
}



