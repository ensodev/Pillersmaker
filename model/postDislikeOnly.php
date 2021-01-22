<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php

require_once ('connection.php');

// echo "welcome";
// exit();

$post_id = $_GET['postid'];
$post_user_id = $_GET['user_id'];
$user_id = $_SESSION['USER_ID'];
$like = 0;
$dislike = 1;
 
//select post
$sql = "SELECT * FROM `userposttable` WHERE post_id =:post_id AND user_id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['post_id'=>$post_id, 'user_id'=>$user_id]);
$resultLikeOnly = $stmt->fetch();

if(!$resultLikeOnly){
  $sql="INSERT INTO `userposttable`(post_id, user_id, dislike_post) 
        VALUES(:post_id, :user_id, :dislike_post)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['post_id'=>$post_id,'user_id'=>$user_id, 'dislike_post'=>$dislike]);

  //update total like for the post
     
  $sql="SELECT * FROM total_dislike WHERE post_id = $post_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $resultTotalDisLike = $stmt->fetch();
  
  $total_post_dislike = $resultTotalDisLike->total_dislike + 1;
 

  $sql="UPDATE total_dislike
  SET total_dislike = $total_post_dislike
  WHERE post_id = $post_id";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();

  //reduce total_post_like if not = 0
  $sql="SELECT * FROM total_like WHERE post_id = $post_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $resultTotalLike = $stmt->fetch();
  
  $total_post_like = $resultTotalLike->total_like - 1;

  if($resultTotalLike->total_like > 0){
    $sql="UPDATE total_like
          SET total_like = $total_post_like
          WHERE post_id = $post_id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
  }
  
  //update statistic table in dailydisliketable
  require_once __DIR__ . '/updateDailyStatictics.php';
  $table = 'dailydisliketable';
  dailystatictic($table);

  //redirect and exit code
  echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id&dislike=disliked'</script>";
  //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id&dislike=disliked");
  exit();

}else{
  if($resultLikeOnly->dislike_post == 1){
    
    //redirect and exit code

    echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id&dislike=before'</script>";
    //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id&dislike=before");
    exit();

  }else if($resultLikeOnly->dislike_post == 0){

    $sql ="UPDATE `userposttable`
           SET like_post = $like, dislike_post = $dislike
           WHERE post_id =:post_id AND user_id =:user_id";
     $stmt = $pdo->prepare($sql);
     $stmt->execute(['post_id'=>$post_id,'user_id'=>$user_id]);
     
     //
     $sql="SELECT * FROM total_dislike WHERE post_id = $post_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $resultTotalDisLike = $stmt->fetch();
  
  $total_post_dislike = $resultTotalDisLike->total_dislike + 1;
 

  $sql="UPDATE total_dislike
  SET total_dislike = $total_post_dislike
  WHERE post_id = $post_id";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();

  //reduce total_post_like if not = 0
  $sql="SELECT * FROM total_like WHERE post_id = $post_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $resultTotalLike = $stmt->fetch();
  
  $total_post_like = $resultTotalLike->total_like - 1;

  if($resultTotalLike->total_like > 0){
    $sql="UPDATE total_like
          SET total_like = $total_post_like
          WHERE post_id = $post_id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
  }

   
  //update statistic table in dailydisliketable
  require_once __DIR__ . '/updateDailyStatictics.php';
  $table = 'dailydisliketable';
  dailystatictic($table);

  echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id&dislike=disliked'</script>";
  //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id&dislike=disliked");
  exit();
    
  }else {

    //redirect and exit code
    //error report 

    echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id'</script>";
    //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id");
    exit();

  }
}