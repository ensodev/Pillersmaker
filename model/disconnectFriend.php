<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php
  require_once 'connection.php';
  require_once __DIR__ . "/../view/header2.php";
  require_once __DIR__ . "/../controller/checkSessionContol.php";
  
  checkNotSession();
  if($_GET){
    if(!isset($_GET['id'])){

      echo "<script>location.href=' /view/noPage.html'</script>";
      //header('Location: ../view/noPage.html');
      exit();
    }

    if(!isset($_GET['friend_id'])){

      echo "<script>location.href=' /view/noPage.html'</script>";
      //header('Location: ../view/noPage.html');
      exit();
    }
  }else{
    echo "<script>location.href=' /view/noPage.html'</script>";
    //header('Location: ../view/noPage.html');
    exit();
  }
  

  $user_id = $_GET['id'];
  $friend_id = $_GET['friend_id'];

  if($user_id == $friend_id){

    echo "<script>location.href=' /view/ProfileSearch.php?id=$friend_id&connection=self'</script>";
    //header('Location: /view/ProfileSearch.php?id='.$friend_id.'&connection=self');
    exit();

  }

  //NOTE VERY IMPORTANT
  //If user id is not equal to get_id then that is a hack alert ban
  //BAN ALERT AND HACK ALERT
  if($user_id != $_SESSION['USER_ID']){
    exit();
  }

  $sql = "DELETE FROM connect_friend WHERE user_id =:friend_id AND friend_id =:user_id ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['friend_id'=>$friend_id, 'user_id'=>$user_id]);

  $sql = "DELETE FROM connect_friend WHERE user_id =:user_id AND friend_id =:friend_id ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['user_id'=>$user_id, 'friend_id'=>$friend_id]);

  //update daily reget connection or tarminate existing connection
  require_once __DIR__ . '/updateDailyStatictics.php';
  $table = 'dailyregetconnection';
  dailystatictic($table);
  
    

 if(isset($_GET['back'])){
  //echo "<script>location.href=' /view/unapprovedConnection.php?action='Rejected'</script>";
  //header("Location: /view/unapprovedConnection.php?action='Rejected'");

  require_once __DIR__ . '/../view/header3.php';
  echo "<div class='container mt-4 text-center'>
          <div class='alert alert-warning'>
              The connection request is rejected...
            <a href='/view/unapprovedConnection.php'>Back to Unapproved connection page</a>
          </div>
        </div>
  ";
  exit();

    exit();
 }else{
  echo "<script>location.href='/model/searchProfileProcess.php?id=$friend_id'</script>";
    //header('Location: /model/searchProfileProcess.php?id='.$friend_id);
    exit();
 }