<?php require_once  __DIR__ . '/../model/connection.php';?> 
<?php
  
//if get is not set us session to set present user and search table
if(!isset($_GET['profilePosts'])){
  echo "erro 1"   ;
  exit();
}


    $user_id = $_GET['profilePosts'];

    $sql ="SELECT * FROM register WHERE id = $user_id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $resultUserId = $stmt->fetch();

if(!isset($resultUserId) || $resultUserId == false){
    echo 'error 2';
    exit();
}

$user_name = $resultUserId->user_name;  

  
//$user_name = $resultUserId->user_name;
// Note todo here later
  //search for user with the id profilePost
// connect to the data base
// Define how many result you want per page

$results_per_page = 10;

// find out the number of result stored in database

$sql = "SELECT COUNT(*) FROM postworks WHERE user_id =:user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$result = $stmt->fetchColumn();

$number_of_results = $result;


//Determine number of total page available
 $number_of_pages = ceil($number_of_results / $results_per_page);

 $_SESSION['PAGE_NUMBER'] = $number_of_pages;
// Determine which page number visitor is currently on;
if(!isset($_GET['page'])){
    $page = 1;
}else if($_GET['page'] <= 0){
    $page = 1;
    //header('Location: ../view/groupPost.php?page=1');

    //header('Location: ../view/postwork.php?page=1');

}else if($_GET['page'] > $number_of_pages){
    
    echo "<script>location.href='/view/profilePostwork.php?page=".$_GET['page']."&PostUserName=$user_name&profilePosts=$user_id'</script>";
    //header("Location: ../view/profilePostwork.php?page=".$_GET['page']."&PostUserName=$user_name&profilePosts=$user_id");
    exit();

    
}else{
    $page = $_GET['page'];
}

//determine the sql LIMIT starting number for the results on the display page
$this_page_first_result =($page - 1) * $results_per_page;

//retrieve the folowing result from database and display them on page

$sql ="SELECT * FROM postworks WHERE user_id =:user_id ORDER BY id DESC LIMIT $this_page_first_result , $results_per_page ";
$stmt=$pdo->prepare($sql);
$stmt->execute(['user_id'=>$user_id]);
$resultRow = $stmt->fetchAll();


 
    

 
  

