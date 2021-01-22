
<?php
require_once 'connection.php'; 
require_once  __DIR__ . '/../controller/checkSessionContol.php'; 

checkNotSession();
?>

<?php
//validating id
if(!isset($_GET['id']) || $_GET['id'] ==""){
  echo "<script>location.href='/view/noPage.html'</script>";
  //header('Location: ../view/noPage.html');
  exit();
}

//mark message read
$catch_msg_id = $_GET['id'];
$msg_mark_read = 1;
$sql = "UPDATE `messages` SET msg_mark_read = $msg_mark_read WHERE msg_id = $catch_msg_id";
$stmt = $pdo->prepare($sql);
$stmt->execute();


//get the it
$msg_id = $_GET['id'];

$sql ="SELECT * FROM messages WHERE msg_id= :msg_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['msg_id'=>$msg_id]);
$result = $stmt->fetch();

if(!$result){

  
  require_once  __DIR__ . '/../others/alertFunction.php';
  $msg='Message not found ';
  $msgColor = 'info';
  
  msgAlert($msg, $msgColor);
  exit();
}

$user = $_SESSION['USER_ID'];
$Sender_username = $result->user_name;

if( $user != $result->reciever_id && $user != $result->sender_id){
      
  require_once  __DIR__ . '/../others/alertFunction.php';
  $msg='Access Denied ';
  $msgColor = 'info';
  
  msgAlert($msg, $msgColor);
  exit();  
}


