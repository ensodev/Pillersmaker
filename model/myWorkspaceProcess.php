<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php 

require_once "connection.php";
require_once  __DIR__ . '/../others/sessionProcess.php';



if(isset($_POST['submit'])){

  if($_POST['topic'] =="" || $_POST['category'] =="" || $_POST['category'] =="holder" || $_POST['article']==""){
    require_once  __DIR__ . '/../view/header3.php';
    ?>
    <div class="container mt-4 text-center">
      <div class='alert alert-warning'>All field must be filled...!
        <a href="/view/profile.php">Back to profile</a>
      </div>
    </div>
  <?php
    exit();

  }

  if(isset($_FILES)){

    if($_FILES['file'] ==""){
      require_once __DIR__ . '/../view/header3.php';
      ?>
      <div class="container mt-4 text-center">
        <div class='alert alert-warning'>This post require a picture...!
          <a href="/view/profile.php">Back to profile</a>
        </div>
      </div>
    <?php
      exit();
    }
  }



  $topic = $_POST['topic'];
  $category =  $_POST['category'];
  $article =  $_POST['article'];

  //reformat article
  

  //remove tags from topic and replace it with PZtags codes
  $replaceContent = array(';','--','<','>','/','=','-','!', "\"");
  $replaceMent ="";
  $topic = str_replace($replaceContent, $replaceMent, $topic);

   
  $msg_message = $article;
  
  require_once __DIR__ . "/msgReformat.php";

  $article = $articleMessage;

  
  $file = $_FILES['file'];


  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];


  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)){

      if ($fileError === 0){

        if ($fileSize < 1000000){
          $user_id = $_SESSION['USER_ID'];
          $fileNameNew = $user_id.uniqid('', true).".".$fileActualExt;
          $fileDestination ='../PostMedia/'.$fileNameNew;


          /*
            Code to delete present profile picture goes here
          */
          // $user_id = $_SESSION['USER_ID'];
          // echo $user_id;
          // exit();

          $sql="SELECT * FROM profile WHERE  id=:user";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(['user'=>$_SESSION['USER_ID']]);
          $resultPostWork = $stmt->fetch();
         
          if(isset($resultPostWork)){
            
            // charge user
            $sql = "SELECT * FROM `vote_coin_table` WHERE user_id =:user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['user_id'=>$_SESSION['USER_ID']]);
            // var_dump($stmt);
            // exit();
            $resultFoundMe = $stmt->fetch();

            if(!$resultFoundMe){
              echo "No record, vital error, try back in few minute or contact customers care";
              exit();
            }

            $total_used = $resultFoundMe->total_used;
            $total_bal = $resultFoundMe->total_bal;

            require_once __DIR__ . "/getSettings.php";
                // if there is still bal and the balance is greater than voting cost then you can vote

                if(!isset($resultSettings->post_cost_pvc) || $resultSettings->post_cost_pvc == 0){
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
            if($total_bal == $resultSettings->post_cost_pvc || $total_bal > $resultSettings->post_cost_pvc ){
              $total_bal -= $resultSettings->post_cost_pvc; 
              $total_used += $resultSettings->post_cost_pvc;

              $sql ="UPDATE `vote_coin_table`
              SET total_bal =:total_bal, total_used =:total_used
              WHERE user_id =:user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['total_bal'=>$total_bal,'total_used'=>$total_used, 'user_id'=>$user_id]);

            //with voting varable we can maniputale the amount that will be credited to admin
            $voting = false;
            require_once 'creditAdmin.php';


            }else{


              require_once  __DIR__ . '/../view/header3.php';
              ?>
              <div class="container mt-4 text-center">
                <div class='alert alert-warning'>You dont have enough PVC to make a posting, Post Attract 2 PVC, contact <a href='/view/customerCare.php'>customer care</a> to learn more...!
                  <a href="/view/profile.php">Back to profile</a>
                </div>
              </div>
            <?php
             
              exit();
            }

 
            // end charge

            //save picture into database using insert
            $sql="INSERT INTO postworks(user_id, topic, article, category, postfile, post_view, last_viewer_id) VALUE (:user_id, :topic, :article, :category, :fileNameNew, 0, 0)";
            
            $stmt=$pdo->prepare($sql);
            $stmt->execute(['user_id'=>$user_id, 'topic'=>$topic, 'article'=>$article, 'category'=>$category, 'fileNameNew'=>$fileNameNew]);


            // moving the file
            move_uploaded_file($fileTmpName, $fileDestination);
            $msg = "Your article has been posted..";
            $msgColor = "success";
            // header("Location: ../view/myWorkspace.php?error=$msg&color=$msgColor"); 

            //search for the new post to get the id or topic
            $sql="SELECT MAX(id) AS largest_id FROM postworks";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $resultID = $stmt->fetch();

            $ids  =$resultID->largest_id;
            //exit();

            
            $sql="SELECT * FROM postworks WHERE id = $ids";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $resultTopic = $stmt->fetch();

              //INSERT RECORD INTO THE TABLE
              if(isset($resultTopic)){
                $sql="INSERT INTO redeem_user_table(user_id, post_id, last_amount_redeem, total_amount_redeem, redeem_total_time) VALUE (:user_id, :post_id, 0, 0, 0)";
                
                $stmt=$pdo->prepare($sql);
                $stmt->execute(['user_id'=>$resultTopic->user_id, 'post_id'=>$resultTopic->id]);
              }

              //insert into the like table
                $sql="INSERT INTO total_like(post_id, total_like) VALUE (:post_id, 0)";
                $stmt=$pdo->prepare($sql);
                $stmt->execute(['post_id'=>$resultTopic->id]);

                $sql="INSERT INTO total_vote(post_id, total_vote) VALUE (:post_id, 0)";
                $stmt=$pdo->prepare($sql);
                $stmt->execute(['post_id'=>$resultTopic->id]);

                $sql="INSERT INTO total_dislike(post_id, total_dislike) VALUE (:post_id, 0)";
                $stmt=$pdo->prepare($sql);
                $stmt->execute(['post_id'=>$resultTopic->id]);
                
           echo "<script>location.href='/view/myWorkspace.php?error=$msg&color=$msgColor'</script>";   
           //header("Location: ../view/myWorkspace.php?error=$msg&color=$msgColor"); 
            exit(); 
          }

        }else{
         
          $msg = "your file is too big, maximum of 1mb is allowed..";
          $msgColor = "warning";

          echo "<script>location.href='/view/myWorkspace.php?error=$msg&color=$msgColor'</script>";
          //header("Location: ../view/myWorkspace.php?error=$msg&color=$msgColor");
          exit();
        }
          
      }else{

        $msg = "there was an error uploading your file!...";
        $msgColor = "warning";

        echo "<script>location.href='/view/myWorkspace.php?error=$msg&color=$msgColor'</script>";
        //header("Location: ../view/myWorkspace.php?error=$msg&color=$msgColor");
        exit();
        
      }

  } else{

    $msg = "you can't upload file of this type!...</a> ";
    $msgColor = "warning";

    echo "<script>location.href='/view/myWorkspace.php?error=$msg&color=$msgColor'</script>";
    //header("Location: ../view/myWorkspace.php?error=$msg&color=$msgColor");
    exit();
 
  }

}else{

  $msg = "there was an error accessing file!...";
  $msgColor = "Danger";

  echo "<script>location.href='/view/myWorkspace.php?error=$msg&color=$msgColor'</script>";
  //header("Location: ../view/myWorkspace.php?error=$msg&color=$msgColor");
  exit();
}
