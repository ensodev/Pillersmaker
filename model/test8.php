<?php session_start();

require_once "connection.php";
require_once "../others/sessionProcess.php";
require_once "../controller/profileEditAlert.php";

$delete_pic="";
if(isset($_POST['submit'])){
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
          $fileDestination ='../upload/'.$fileNameNew;


          /*
            Code to delete present profile picture goes here
          */
          $sql="SELECT * FROM profile WHERE  id=:user";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(['user'=>$_SESSION['USER_ID']]);
          $resultPicDelete = $stmt->fetch();
         
          if(isset($resultPicDelete)){
            global $delete_pic;
            $delete_pic = $resultPicDelete->profile_pic;
            $delete_pic ="../upload/".$delete_pic;
            // echo $delete_pic;
            // exit(); 
            
            if(!unlink($delete_pic)){
             echo "";
            }
          }else{
            echo "";
          }
        
      

         

          //save picture into database
          $sql="UPDATE profile SET profile_pic =:profile_pic WHERE id =:id";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(['profile_pic'=>$fileNameNew, 'id'=>$user_id]);

          // moving the file
          move_uploaded_file($fileTmpName, $fileDestination);
          
          header('Location: ../view/profile.php');

          
          exit();

        }else{
         
          require_once "../view/headerNOSession.php ";
          $msg = "your file is too big, maximum of 1mb is allowed ";
          $msgColor = "warning";
          alertProfile($msg, $msgColor);
          
        }
          
      }else{

        require_once "../view/headerNOSession.php";
        $msg = "there was an error uploading your file! ";
        $msgColor = "warning";
        alertProfile($msg, $msgColor);
        
      }

  } else{

    require_once "../view/headerNOSession.php";
    $msg = "you can't upload file of this type! ";
    $msgColor = "warning";
    alertProfile($msg, $msgColor);
  }

}
