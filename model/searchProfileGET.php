<?php

require_once __DIR__ . '/../model/connection.php';

$user_A;
$getResult = array();


//NOTE NOTE 
//user_id needs to be filtered
if(isset($_GET['user_id'])){
    global $user_A;
    $user_A = $_GET['user_id'];
    trim($user_A);
    $user_A = htmlspecialchars($user_A);
    // exit();
    $sql = "SELECT * FROM register  WHERE id =:id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$user_A]);
    $result = $stmt->fetch();
    $getResult = $result;

    if($result){
        global $user_A;
        $user_A = $result->id;
    }else{
        require_once __DIR__ . '/../view/header3.php';
        echo "
            <div class='alert alert-info text-center'>
                User not found...! 
            </div>
        ";
        require_once __DIR__ . '/../view/footer.php';

        exit();
    }
   
   
}


//NOTE NOTE 
//user_name needs to be filtered
if(isset($_GET['user_name'])){
    global $user_A;
    $user_A = htmlspecialchars($_GET['user_name']);
    

    $sql = "SELECT * FROM register  WHERE user_name =:user_name LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_name'=>$user_A]);
    $result = $stmt->fetch();
    $getResult = $result;

    if($result){
        global $user_A;
        $user_A = $result->id;
    }else{
        require_once __DIR__ . '/../view/header3.php';
        echo "
            <div class='alert alert-info text-center'>
                User not found...! 
            </div>
        ";
        require_once __DIR__ . '/../view/footer.php';

        exit();
    }
   
}


if(!isset($result)){
    require_once __DIR__ . '/../view/headerBan.php';
    $msg = "User dont have profile set.. ";
    $msgColor = "info";
    
    exit();
}


//searc for  user profile details
$sql="SELECT * FROM profile WHERE id = :id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=>$user_A]);
$result = $stmt->fetch();


$my_id = $_SESSION['USER_ID'];
//like info
$sql="SELECT * FROM like_table WHERE profile_id =:id AND user_id =:my_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=>$user_A, 'my_id'=>$my_id]);
$resultLike = $stmt->fetch();

$Like;

if($resultLike){
 global $Like;
 $Like = true;
}else{
  global $Like;
  $Like = false;
}

  require_once __DIR__ . "/../model/formatTextRead.php";

    $about_me = formatTextRead($result->about_me);

    $award1 = formatTextRead($result->award1);

    $award2 = formatTextRead($result->award2);

   
    $award3 = formatTextRead($result->award3);



     
    // $profileID= $_GET['id'];
    // $userID = $_SESSION['USER_ID'];

    $sql = "SELECT * FROM connect_friend WHERE user_id =:user_id and friend_id =:profile_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$my_id,'profile_id'=>$user_A]);
    $resultFriend = $stmt->fetch();
   
    $sql = "SELECT COUNT(*) FROM connect_friend WHERE friend_id =:profile_id and approved = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['profile_id'=>$user_A]);
    $resultConnect = $stmt->fetchColumn();
   
    $SearchProfileId = $user_A;
   //  echo $SearchProfileId;
   //  exit();
   
    $sql = "SELECT COUNT(*) FROM postworks WHERE user_id =:SearchProfileId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['SearchProfileId'=>$SearchProfileId]);
    $resultPostCount = $stmt->fetchColumn();


    $sql = "SELECT COUNT(*) FROM like_table WHERE profile_id =:SearchProfileId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['SearchProfileId'=>$SearchProfileId]);
    $resultPrfileCount = $stmt->fetchColumn();

