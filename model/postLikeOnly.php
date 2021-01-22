

<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php
require_once ('connection.php');

$post_id = $_GET['postid'];
$post_user_id = $_GET['user_id'];
$user_id = $_SESSION['USER_ID'];
$like = 1;
$dislike = 0;
 
$sql = "SELECT * FROM `userposttable` WHERE post_id =:post_id AND user_id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['post_id'=>$post_id, 'user_id'=>$user_id]);
$resultLikeOnly = $stmt->fetch();

if(!$resultLikeOnly){
  $sql="INSERT INTO `userposttable`(post_id, user_id, like_post) 
        VALUES(:post_id, :user_id, :like_post)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['post_id'=>$post_id,'user_id'=>$user_id, 'like_post'=>$like]);


  //update total like table

  $sql="SELECT * FROM total_like WHERE post_id = $post_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $resultTotalLike = $stmt->fetch();
  
  $total_post_like = $resultTotalLike->total_like + 1;


  $sql="UPDATE total_like
        SET total_like = $total_post_like
        WHERE post_id = $post_id";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();

  //redirect and exit code

  echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id&like=liked'</script>";
  //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id&like=liked");
  exit();

}else{
  if($resultLikeOnly->like_post == 1){
    
    //redirect and exit code
    echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id&like=before'</script>";
    //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id&like=before");
    exit();

  }else if($resultLikeOnly->like_post == 0){

    $sql ="UPDATE `userposttable`
           SET like_post = $like, dislike_post = $dislike
           WHERE post_id =:post_id AND user_id =:user_id";
     $stmt = $pdo->prepare($sql);
     $stmt->execute(['post_id'=>$post_id,'user_id'=>$user_id]);

     //update total like for the post
     
     $sql="SELECT * FROM total_like WHERE post_id = $post_id";
     $stmt = $pdo->prepare($sql);
     $stmt->execute();
     $resultTotalLike = $stmt->fetch();
     
    $total_post_like = $resultTotalLike->total_like + 1;

     $sql="UPDATE total_like
           SET total_like = $total_post_like
           WHERE post_id = $post_id";
     $stmt=$pdo->prepare($sql);
     $stmt->execute();
     
     echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id&like=liked'</script>";
     //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id&like=liked");
     exit();
  }else {

    //redirect and exit code
    //error should be reported
    echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id'</script>";
    //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id");
    exit();

  }
}