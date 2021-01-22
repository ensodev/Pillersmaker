<?php
/**
 * This file handle all vote casted on post
 * this file is ladt modify on 2nd of nov 2019
 */
?>

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
$vote = 1;

// var_dump($_GET);
// exit();


//getting voters pvc information
$sql = "SELECT * FROM `vote_coin_table` WHERE user_id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
// var_dump($stmt);
// exit();
$resultFoundMe = $stmt->fetch();

if(!$resultFoundMe){
  require_once  __DIR__ . '/../view/header3.php';
  echo "
      <div class='container text-center'>
        <div class='container alert alert-info'>
        No record, vital error, try back in few minute or contact customers care
          
        </div>

      </div>
  
  ";
  exit();
}

$total_used = $resultFoundMe->total_used;
$total_bal = $resultFoundMe->total_bal;

require_once __DIR__ . "/getSettings.php";
// if there is still bal and the balance is greater than voting cost then you can vote

if(!isset($resultSettings->pvc_per_vote) || $resultSettings->pvc_per_vote == 0){
  require_once  __DIR__ . '/../view/header3.php';
  echo "
      <div class='container text-center'>
        <div class='container alert alert-info'>
          PVC transaction disabled try back in few minutes or contact <a href='../view/customerCare.php'>Customer Care..!</a>
          
        </div>

      </div>
  
  ";
  exit(); 
}
if($total_bal > $resultSettings->pvc_per_vote ){

  $total_bal -=  $resultSettings->pvc_per_vote; 
  $total_used +=   $resultSettings->pvc_per_vote;


  /*
  *  Code to input user used coin into used coin table is to be inputed here
  *  this logic is not created yet and such table is not yet existing in the batabase
  *  but it will be look into in the future.
  */
  
  //
  $sql = "SELECT * FROM `userposttable` WHERE post_id =:post_id AND user_id =:user_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['post_id'=>$post_id, 'user_id'=>$user_id]);
  $resultLikeOnly = $stmt->fetch();
  
  //if no existing record then create one and update vote
  /**the way vote, like and dislike is done is that any one action must have created record
   * for the voter, so checking existing record is important.
   */
  if(!$resultLikeOnly){
    $sql="INSERT INTO `userposttable`(post_id, user_id, vote_post) 
          VALUES(:post_id, :user_id, :vote_post)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['post_id'=>$post_id,'user_id'=>$user_id, 'vote_post'=>$vote]);
  

    //update voter coin by debiting for voting
    $sql ="UPDATE `vote_coin_table`
             SET total_bal =:total_bal, total_used =:total_used
             WHERE user_id =:user_id";
       $stmt = $pdo->prepare($sql);
       $stmt->execute(['total_bal'=>$total_bal,'total_used'=>$total_used, 'user_id'=>$user_id]);

      //update total_vote_table for the post
     
      $sql="SELECT * FROM total_vote WHERE post_id = $post_id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $resultTotalVote = $stmt->fetch();

      if(!isset($resultTotalVote)){
        require_once  __DIR__ . '/../view/header3.php';
        echo "
            <div class='container text-center'>
              <div class='container alert alert-info'>
                Something went wrong, payment made vote not updated, contact admin
              </div>
      
            </div>
        
        ";
        exit();
      }
      
     $total_post_vote = $resultTotalVote->total_vote + 1;
 
      $sql="UPDATE total_vote
            SET total_vote = $total_post_vote
            WHERE post_id = $post_id";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();

    $voting = true;

    /****
    * the following next line credit admin with all vote
    ****/ 
    require_once __DIR__ . '/creditAdmin.php';


    //send email to the ownner of the post
    // ...............................

    //getting voters pvc information
    //with error
    // $sql = "SELECT * FROM `register` WHERE id =:post_user_id";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['id'=>$post_user_id]);
    // $resultPosterInfo = $stmt->fetch();

    // $sql = "SELECT * FROM `postworks` WHERE id =:post_id";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['id'=>$post_id]);
    // $Post_info = $stmt->fetch();
    //end with error

    $sql = "SELECT * FROM `register` WHERE id =:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$post_user_id]);
    $resultPosterInfo = $stmt->fetch();

    $sql = "SELECT * FROM `postworks` WHERE id =:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$post_id]);
    $Post_info = $stmt->fetch();

    if(isset($Post_info->topic)){
      $post_topic = $Post_info->topic;
    }else{
      $post_topic = 'Unknown';
    }

    if(isset($resultPosterInfo)){
      $poster_email = $resultPosterInfo->email;
      $poster_user_name = $resultPosterInfo->user_name;
 
      //email credentials
      $voter_name = $_SESSION['USER_NAME'];
      $To = $poster_email;
      $Subject = "You recieve a vote for a post";
      $Message = "Hi $poster_user_name,";
      $Message .= "Your post titled $post_topic has recieved a vote from $voter_name";
      $Message .= "kindly visit to view the number of vote you have on your post"."<br>";
      $Message .= "if you post as recieved more than enough vote you redeem button
                 will be available for you to cash out your vote";

      require_once __DIR__ . '/emailSystem.php';
      emailSystem($To, $Subject, $Message);

      //update daily statistic
      require_once __DIR__ . '/updateDailyStatictics.php';
      $table = 'dailypostvote';
      dailystatictic($table);

      // to view the error log on this page
      //uncomment the following xit
      //exit();
    }

    //redirect and exit code
    echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id&voted=vote'</script>";
    //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id&voted=vote");
    exit();
   
  }else{
  
    //if record exist then check if user has voted on this post before
    if($resultLikeOnly->vote_post == 1){
      
      //redirect and exit code
      /**
       * the following line of code can change in future if we want to increase the number of times
       * a user can vote on a post
       */
      echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id&voted=voted'</script>";
      //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id&voted=voted");
      exit();
  
    //if existing record but user has not voted before then vote
    //update user coin

    /**
     * in future if we want to increse the number of vote per user for vote
     * we will not use == 0, we will not hard code this zero
     */
    }else if($resultLikeOnly->vote_post == 0){

      $sql ="UPDATE `vote_coin_table`
             SET total_bal =:total_bal, total_used =:total_used
             WHERE user_id =:user_id";
       $stmt = $pdo->prepare($sql);
       $stmt->execute(['total_bal'=>$total_bal,'total_used'=>$total_used, 'user_id'=>$user_id]);
  
      $sql ="UPDATE `userposttable`
             SET vote_post = $vote
             WHERE post_id =:post_id AND user_id =:user_id";
       $stmt = $pdo->prepare($sql);
       $stmt->execute(['post_id'=>$post_id,'user_id'=>$user_id]);

      


      //update total_vote_table for the post
      $sql="SELECT * FROM total_vote WHERE post_id = $post_id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $resultTotalVote = $stmt->fetch();
      
     $total_post_vote = $resultTotalVote->total_vote + 1;
 
      $sql="UPDATE total_vote
            SET total_vote = $total_post_vote
            WHERE post_id = $post_id";
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
    
      $voting = true;
      
      /****
       * the following next line credit admin with all vote
      ****/ 
      require_once 'creditAdmin.php';

      //send email
      //...............................................
      //getting voters pvc information
      $sql = "SELECT * FROM `register` WHERE id =:post_user_id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id'=>$post_user_id]);
      $resultPosterInfo = $stmt->fetch();

      $sql = "SELECT * FROM `postworks` WHERE id =:post_id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id'=>$post_id]);
      $Post_info = $stmt->fetch();

      if(isset($Post_info->topic)){
        $post_topic = $Post_info->topic;
      }else{
        $post_topic = 'Unknown';
      }

      if(isset($resultPosterInfo)){
        $poster_email = $resultPosterInfo->email;
        $poster_user_name = $resultPosterInfo->user_name;
  
        //email credentials
        $voter_name = $_SESSION['USER_NAME'];
        $To = $poster_email;
        $Subject = "You recieve a vote for a post";
        $Message = "Hi $poster_user_name,";
        $Message .= "Your post titled $post_topic has recieved a vote from $voter_name";
        $Message .= "kindly visit to view the number of vote you have on your post"."<br>";
        $Message .= "if you post as recieved more than enough vote you redeem button
                  will be available for you to cash out your vote";

        require_once __DIR__ . '/emailSystem.php';
        emailSystem($To, $Subject, $Message);

        //update daily vote statistic for record use
        require_once __DIR__ . '/updateDailyStatictics.php';
        $table = 'dailypostvote';
        dailystatictic($table);
        echo '2';
        //exit();

       
      }
          
          echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id'</script>";
          //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id");
          exit();
      
        }else {
          // if the above condition is not met then
          //redirect and exit code
          echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id'</script>";
          //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id");
          exit();
  
    }
  }


}else{

  echo "<script>location.href='/view/viewPost.php?postid=$post_id&user_id=$post_user_id&vcoin=pvout'</script>";
  //header("Location: /view/viewPost.php?postid=$post_id&user_id=$post_user_id&vcoin=pvout");
  exit();
}



