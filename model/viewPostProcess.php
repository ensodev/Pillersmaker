<?php require_once  __DIR__ . '/../model/connection.php';?> 
<?php
//this file is incharge of all view logics
//check for Get
if(!isset($_GET)){
  ?>
  <div class="container mt-4 text-center">
  <div class='alert alert-info'>You have no post to view.!
    <a href="/view/profile.php">Back to profile</a></div>
  </div>
  <?php
  exit();
}


if(isset($_GET)){

    $post_id = $_GET['postid'] ?? "";

    //search for post existing
    $sql = "SELECT * FROM postworks WHERE id =:post_id LIMIT 1";
    $stmtt=$pdo->prepare($sql);
    $stmtt->execute(['post_id'=>$post_id]);
    $resultMyPost=$stmtt->fetch();

  
    
    //if post with the id is not found
    if(!$resultMyPost){
      ?>
        <div class="container mt-4 text-center">
        <div class='alert alert-info'>You have no post to view..!
          <a href="/view/profile.php">Back to profile</a></div>
        </div>
      <?php
      exit();
    }

    $user_id = "";
    
    if(isset($_GET['user_id'])){
       $user_id = $_GET['user_id'];
    }

    //get the profile and register info of poster
    $sql = "SELECT profile.id, profile.profile_pic, register.user_name 
            FROM profile 
            INNER JOIN register 
            ON profile.id = register.id
            WHERE profile.id=:user_id
            ORDER BY profile.id";
      
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id'=>$user_id]);
    $resultPostProfile=$stmt->fetch();
   

    //if user info cant be found then there is no post to view
    if(!$resultPostProfile){
      ?>
        <div class="container mt-4 text-center">
        <div class='alert alert-info'>You have no post to view...!
          <a href="/view/profile.php">Back to profile</a></div>
        </div>
      <?php
      exit();
    }

    //if the last person view is not the same then view increase
    if($resultMyPost->last_viewer_id !=$_SESSION['USER_ID']){

      //if the owner of post is not the viewer then view increase
      if($user_id != $_SESSION['USER_ID']){

        $new_post_view = $resultMyPost->post_view + 1;
        $last_viewer_id = $_SESSION['USER_ID'];    

        $sql="UPDATE postworks SET
              post_view =:new_post_view, last_viewer_id =:last_viewer_id
              WHERE id =:id AND user_id =:user_id";
                
        $stmt=$pdo->prepare($sql);
        $stmt->execute(['new_post_view'=>$new_post_view,'last_viewer_id'=>$last_viewer_id, 'id'=>$post_id,'user_id'=>$user_id]);

        $stmtt->execute();
        $resultMyPost=$stmtt->fetch();
      }
    }
   
}
  