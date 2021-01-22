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
    echo "something went wrong";
    exit();
  }

  if(!isset($_POST['submit'])){
   
    require_once  __DIR__ . '/../view/headerNOSession.php ';
    $msg = "something went wrong.. ";
    $msgColor = "danger";
    alertProfile($msg, $msgColor);
    exit();
    
  }
  
  if(!isset($_POST['email']) || $_POST['email'] == ""
      || !isset($_POST['website']) || $_POST['website'] == ""
      || !isset($_POST['mobile']) || $_POST['mobile'] == ""){
   
    require_once  __DIR__ . '/../view/headerNOSession.php ';
    $msg = "Field can't be empty, something went wrong.. ";
    $msgColor = "danger";
    alertProfile($msg, $msgColor);
    exit();
    
  }
  
  $email = $_POST['email'];
  $website = $_POST['website'];
  $mobile = $_POST['mobile'];
  
  $sql = "UPDATE profile SET website =:website,
                             email =:email,
                             mobile =:mobile
                            
          WHERE id = $user_id";

  $stmt = $pdo->prepare($sql);
  $stmt->execute([            'website'=>$website,
                              'email'=>$email,
                              'mobile'=>$mobile]);

  echo "<script>location.href='/view/profile.php'</script>";
  //header('Location: /view/profile.php');

