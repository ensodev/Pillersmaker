<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php 

  require_once('connection.php');
  require_once __DIR__ . '/../controller/profileEditAlert.php';

  $user_id = $_SESSION['USER_ID'];

if(!isset($_POST)){ 
   
    require_once __DIR__ . '/../view/headerNOSession.php ';
    $msg = "something went wrong ";
    $msgColor = "warning";
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
 
if(!isset($_POST['aboutme']) || $_POST['aboutme'] == ""){
   
  require_once  __DIR__ . '/../view/headerNOSession.php ';
  $msg = "Field can't be empty, something went wrong... ";
  $msgColor = "danger";
  alertProfile($msg, $msgColor);
  exit();
  
}

$about_me = $_POST['aboutme'];

$msg_message = $about_me;


//remove tags and unneccessary characters
 
$replaceContent = array("<script>", "</script>", "ipt>",';','--','<','>','/','=','-','!', "\"", "ript>", "/script>", "ipt>");
$replaceMent ="";
$msg_message = str_replace($replaceContent, $replaceMent, $msg_message);

//remove tags from subject and replace it with PZtags codes
require_once __DIR__ . "/msgReformat.php";

$about_me = $articleMessage;


$sql = "UPDATE profile SET about_me =:about_me WHERE id = $user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['about_me'=>$about_me]);


echo "<script>location.href='/view/profile.php'</script>";
//header('Location: /view/profile.php');

