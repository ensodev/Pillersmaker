<?php
  require_once 'connection.php';
  require_once  __DIR__ . '/../view/header2.php';
  require_once  __DIR__ . '/../controller/checkSessionContol.php';
   
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
    echo "<script>location.href='/view/profileSearch.php?id=$friend_id&connection=self'</script>";
    //header('Location: /view/ProfileSearch.php?id='.$friend_id.'&connection=self');
    exit();

  }
  
  //THIS COMMENTED CODE IS VERY IMPORTANT FOR THE FUTURE
  //.....................................................
  // $sql = "SELECT * FROM connect_friend WHERE user_id =:user_id AND friend_id =:friend_id OR user_id =:friend2_id AND friend_id =:user2_id ";
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['user_id'=>$user_id, 'friend_id'=>$friend_id, 'friend2_id'=>$user_id, 'user2_id'=>$friend_id]);
  // $result = $stmt->fetch();


  // check connection
  $sql = "SELECT * FROM connect_friend WHERE user_id =:user_id AND friend_id =:friend_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['user_id'=>$user_id, 'friend_id'=>$friend_id]);
  $result = $stmt->fetch();
  
  if(!$result){
    $sql = "INSERT INTO connect_friend(user_id, friend_id) VALUE(:user_id, :friend_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id, 'friend_id'=>$friend_id]);

    /**get information needed to send email to profile
     * ownner for connection purposes
     **/
    $sql = "SELECT * FROM register WHERE id =:friend_id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$friend_id]);
    $result_details = $stmt->fetch();

    $to = $result_details->email;
    $dater = date('D jS M Y');
    $sender = $_SESSION['USER_NAME'];//This the person that send the request
    $user_name = $result_details->user_name;;
    $subject = "You have a friend connection request.";
    $message = "<p>Hi $user_name,</p>";          
    $message .= "<p></p>";
    $message .= "<p>$sender sent you a connection request on $dater.</p>";
    $message .= "<p><a href='http://www.pillersmaker.com.ng/view/login.php'>Click this link to login</a></p>";
    $message .= "<p></p>";
    $message .= "<p>Thank You</p>";
    $message .= "<p>Pillersmaker Management</p>";

    //send email to alert friend of your email connection
    require_once __DIR__ . "/emailSystem.php";
    emailSystem($to, $subject, $message);
  
    echo "<script>location.href='/view/profileSearch.php?id=$friend_id&connection=connect'</script>";
    //header('Location: /view/ProfileSearch.php?id='.$friend_id.'&connection=connect');
    exit();

  }elseif ($result->approved == 1) {
    
    echo "<script>location.href='/view/profileSearch.php?id=$friend_id&connection=friends'</script>";
    //header('Location: /view/ProfileSearch.php?id='.$friend_id.'&connection=friends');
    exit();
 
  }elseif ($result) {
     
    echo "<script>location.href='/view/ProfileSearch.php?id=$friend_id&connection=before'</script>";
    //header('Location: /view/ProfileSearch.php?id='.$friend_id.'&connection=before');
    exit();
 
  }else{
    echo "<script>location.href='/view/profileSearch.php?id=$friend_id&connection=error'</script>";
    //header('Location: /view/ProfileSearch.php?id='.$friend_id.'&connection=error');
    exit();

  }
 
  
  
  