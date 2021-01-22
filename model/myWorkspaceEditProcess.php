<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php

require_once "connection.php";
require_once __DIR__ . '/../others/sessionProcess.php';

// var_dump($_POST);
// var_dump($_FILES);
// echo $_POST['user_id'];
// exit();

if(isset($_POST['submit'])){

  if($_POST['topic'] =="" || $_POST['category'] =="" || $_POST['category'] =="holder" || $_POST['article']=="" || $_POST['id']=="" || $_POST['oldPic'] ==""){
    require_once __DIR__ . "/../view/header3.php";
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
      require_once  __DIR__ . '/../view/header3.php';
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


  $delete_pic = "";
  $topic = $_POST['topic'];
  $category =  trim($_POST['category']);
  $article =  $_POST['article'];
  $post_id =$_POST['id'];
  $mainUserid = $_POST['user_id'];
  $oldPic = $_POST['oldPic'];

  if($mainUserid != $_SESSION['USER_ID']){

    require_once  __DIR__ . '/../view/header3.php';

    ?>
    <div class="container mt-4 text-center">
      <div class='alert alert-warning'>You dont have permission to delete this file
        <a href="/view/profile.php">Back to profile</a>
      </div>
    </div>
  <?php
    exit();
  }


  //remove tags from topic and replace it with PZtags codes
  $replaceContent = array(';','--','<','>','/','=','-','!', "\"", "..");
  $replaceMent ="";
  $topic = str_replace($replaceContent, $replaceMent, $topic);

  //start
  $msg_message = $article;
    require_once __DIR__ . "/msgReformat.php";

  $article = $articleMessage;
  //end


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

          //confirm the user
          $sql="SELECT * FROM profile WHERE  id=:user";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(['user'=>$mainUserid]);
          $resultPostWork = $stmt->fetch();
         
          if(isset($resultPostWork)){

            //update file
            $sql="UPDATE postworks SET user_id =:user_id, topic =:topic, article =:article, category =:category, postfile =:fileNameNew WHERE id =:post_id";

            $stmt = $pdo->prepare($sql);

            $stmt->execute(['user_id'=>$user_id, 'topic'=>$topic, 'article'=>$article, 'category'=>$category, 'fileNameNew'=>$fileNameNew, 'post_id'=>$post_id]);
  
            //delete old picture
            if(isset($oldPic)){
              global $delete_pic;
              $delete_pic = $oldPic;
              $delete_pic ="../PostMedia/".$delete_pic;
              
              //NOTE you have to check if file exist before unlinking
              if(!unlink($delete_pic)){
               echo "";
              }
            }else{
              echo "";
            }
 
            // moving the file
            move_uploaded_file($fileTmpName, $fileDestination);
            $msg = "Your article has been posted...<a href='/view/profile.php'>back to Profile</a> ";
            $msgColor = "success";
            

            //the following code wasnt woking for we went for alternative
            
            //echo "<script>location.href=' /view/myWorkspace.php?error=$msg&color=$msgColor'</script>";
            //header("Location: ../view/myWorkspace.php?error=$msg&color=$msgColor"); 
            
            require_once __DIR__ . '/../view/header3.php';
            echo "<div class='container mt-4 text-center'>
                    <div class='alert alert-warning'>
                        Post updated successfully!
                      <a href='/view/profile.php'>Back to profile</a>
                    </div>
                  </div>
            ";
            exit();

          }

        }else{
         
          //$msg = "your file is too big, maximum of 1mb is allowed...<a href='/view/profile.php'>back to Profile</a> ";
          //$msgColor = "warning";

          //echo "<script>location.href=' /view/myWorkspace.php?error=$msg&color=$msgColor'</script>";
          //header("Location: ../view/myWorkspace.php?error=$msg&color=$msgColor");
        
          require_once __DIR__ . '/../view/header3.php';
            echo "<div class='container mt-4 text-center'>
                    <div class='alert alert-warning'>
                    your image is too big, maximum of 1mb is allowed...
                      <a href='/view/profile.php'>Back to profile</a>
                    </div>
                  </div>
            ";
            exit();

        }
          
      }else{

        //$msg = "there was an error uploading your file!...<a href='/view/profile.php'>back to Profile</a> ";
        //$msgColor = "warning";
       // echo "<script>location.href=' /view/myWorkspace.php?error=$msg&color=$msgColor'</script>";
        //header("Location: ../view/myWorkspace.php?error=$msg&color=$msgColor");
        
        require_once __DIR__ . '/../view/header3.php';
            echo "<div class='container mt-4 text-center'>
                    <div class='alert alert-warning'>
                    there was an error uploading your file!...
                      <a href='/view/profile.php'>Back to profile</a>
                    </div>
                  </div>
            ";
            exit();
        
      }

  } else{

    //$msg = "you can't upload file of this type!...<a href='/view/profile.php'>back to Profile</a> ";
   // $msgColor = "warning";

    //echo "<script>location.href=' /view/myWorkspace.php?error=$msg&color=$msgColor'</script>";
    //header("Location: ../view/myWorkspace.php?error=$msg&color=$msgColor");
    
    require_once __DIR__ . '/../view/header3.php';
    echo "<div class='container mt-4 text-center'>
            <div class='alert alert-warning'>
                  you can't upload file of this type!...
              <a href='/view/profile.php'>Back to profile</a>
            </div>
          </div>
    ";
    exit();
    

    
  }

}else{

  //$msg = "there was an error accessing file!...<a href='/view/profile.php'>back to Profile</a> ";
  $msgColor = "Danger";

  echo "<script>location.href=' /view/myWorkspace.php?error=$msg&color=$msgColor'</script>";

  //header("Location: ../view/myWorkspace.php?error=$msg&color=$msgColor");
  
  require_once __DIR__ . '/../view/header3.php';
    echo "<div class='container mt-4 text-center'>
            <div class='alert alert-warning'>
                    there was an error accessing file!...
              <a href='/view/profile.php'>Back to profile</a>
            </div>
          </div>
    ";
    exit();


}
