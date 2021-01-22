<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php 

require_once "connection.php";
require_once "/../others/sessionProcess.php";

$delete_pic ="";

if(!isset($_GET)){
  errorMSG();
}

if(!isset($_GET['postId'])){
  errorMSG();

}

if(!isset($_GET['user_id'])){
  errorMSG();
}


$postId = $_GET['postId'];
$user_id = $_GET['user_id'];

// echo $user_id."<br>";
// echo $_SESSION['USER_ID']."<br>";
// exit();

if($user_id != $_SESSION['USER_ID']){
  errorMSG();
}

$sql="SELECT * FROM postworks WHERE id =:postId";
$stmt=$pdo->prepare($sql);
$stmt->execute(['postId'=>$postId]);
$resultDelete = $stmt->fetch();



if(!$resultDelete){
  errorMSG();
}

if($resultDelete){
  if($resultDelete->user_id == $user_id ){
    $sql="DELETE FROM postworks WHERE id =:id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['id'=>$postId]);

      if(isset($resultDelete->postfile)){
        global $delete_pic;
        $delete_pic = $resultDelete->postfile;
        $delete_pic ="../PostMedia/".$delete_pic;
        
          if(!unlink($delete_pic)){
          echo "";
          }
      }else{
        echo "";
      }

    //redirection to the post
    $user_name = $_SESSION['USER_NAME'];
    echo "<script>location.href='/view/postwork?deleted=yes&PostUserName=$user_name'</script>";
    //header ("Location: ../view/postwork?deleted=yes&PostUserName=$user_name");
    exit();
  }else{
    errorMSG();
  }
}


function errorMSG(){
  require_once __DIR__ . "/../view/header3.php";
  ?>
  <div class="container mt-4 text-center">
    <div class='alert alert-warning'>You are not authorized to view this page...!
      <a href="/view/profile.php">Back to profile</a>
    </div>
  </div>
<?php
exit();
}