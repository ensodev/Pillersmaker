<?php if(!isset($_SESSION))
{
session_start();
}
?>
  
<?php 

  
  require_once __DIR__ . '/connection.php';
 
  if(isset($_POST['message'])){
     
    $user_id = $_SESSION['USER_ID'];
    $user_name = $_SESSION['USER_NAME'];
    $message = $_POST['message'];
    $time_posted = date('U');

    //get the profile picture from the database
    $sql="SELECT profile_pic FROM `profile` WHERE id =:user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id]);
    $result=$stmt->fetch();

    $profile_pic = $result->profile_pic;
   
    //insert the form data and others to the database
    $sql = "INSERT INTO chatentertainment
          (user_id, user_name, message, time_posted, profile_pic) 
    VALUE(:user_id, :user_name, :message, :time_posted, :profile_pic)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id, 'user_name'=>$user_name, 'message'=>$message, 'time_posted'=>$time_posted, 'profile_pic'=>$profile_pic]);
 
  }else{
    echo "check your connection";
  }