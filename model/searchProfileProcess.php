<?php 
if(!isset($_SESSION))
{
session_start();
}
?>

<?php 

  require_once('connection.php');
  require_once __DIR__ . '/../controller/checkSessionContol.php';
  require_once __DIR__ . '/../controller/profileSearchAlert.php';
  
  checkNotSession(); 
 

if($_GET){
 
  if($_GET['id'] == ""){

    require_once __DIR__ . '/../view/headerBan.php';
    $msg = "Please enter a username, you can't submit empty information.. ";
    $msgColor = "info";
    SearchError($msg, $msgColor);
  }
  
  $user_id = $_GET['id'];
  $my_id = $_SESSION['USER_ID'];

  if($user_id == $my_id){
    echo "<script>location.href='/view/profile.php?user=$user_id&connection=self'</script>";
    //header('Location: /view/profile.php?user='.$user_id.'&connection=self');
    exit();

  }

  trim($user_id);
  echo "<script>location.href='/view/searchResult.php?user_id=$user_id'</script>";
  //header('Location: ../view/searchResult.php?id='.$result->id.'&about_me='.$result->about_me.'&main_talent='.$result->main_talent.'&second_talent='.$result->second_talent.'&award1='.$result->award1.'&award1_date='.$result->award1_date.'&award2='.$result->award2.'&award2_date='.$result->award2_date.'&award3='.$result->award3.'&award3_date='.$result->award3_date.'&website='.$result->website.'&email='.$result->email.'&mobile='.$result->mobile.'&profile_pic='.$result->profile_pic.'&user_name='.$resultT->user_name.'&full_name='.$resultT->full_name.'&like='.$result->like_no.'&liked='.$result->liked_no.'&hiLike='.$Like);
}


 
  
if($_POST){
  
  if(!$_POST['submit']){
    require_once __DIR__ . '/../view/headerBan.php';
    $msg = "Please use the search menu .. ";
    $msgColor = "info";
    SearchError($msg, $msgColor);
    exit();
  }
  
  if(!isset($_POST['name'])){
    require_once __DIR__ . '/../view/headerBan.php';
    $msg = "Please enter Username .. ";
    $msgColor = "info";
    SearchError($msg, $msgColor);
    exit();
  }

  $user_name = $_POST['name'];
  trim($user_name);


 
  echo "<script>location.href='/view/searchResult.php?user_name=$user_name'</script>";
  //header ('Location: ../view/searchResult.php?id='.$result->id.'&about_me='.$result->about_me.'&main_talent='.$result->main_talent.'&second_talent='.$result->second_talent.'&award1='.$result->award1.'&award1_date='.$result->award1_date.'&award2='.$result->award2.'&award2_date='.$result->award2_date.'&award3='.$result->award3.'&award3_date='.$result->award3_date.'&website='.$result->website.'&email='.$result->email.'&mobile='.$result->mobile.'&profile_pic='.$result->profile_pic.'&user_name='.$resultT->user_name.'&full_name='.$resultT->full_name.'&like='.$result->like_no.'&liked='.$result->liked_no.'&hiLike='.$Like);
exit();
}



?>
