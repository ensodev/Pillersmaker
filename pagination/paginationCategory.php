<?php

require_once  __DIR__ . '/../model/connection.php';

global $results_per_page ;
global $number_of_results;
global $number_of_pages;
global $this_page_first_result;


function pagination($category, $databaseNamee){

$categoryy = $category;
$databaseName = $databaseNamee;

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'pillers';

  
    
    // set DSN
    $dsn = 'mysql:host='.$host .';dbname='.$dbname;

    $pdo = new PDO ($dsn, $user, $password);
    
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


// connect to the data base
// Define how many result you want per page

$results_per_page = 10;

// find out the number of result stored in database

$sql = "SELECT COUNT(*) FROM postworks WHERE category =:category";
$stmt = $pdo->prepare($sql);
$stmt->execute(['category'=>$category]);
$result = $stmt->fetchColumn();

$number_of_results = $result;


//Determine number of total page available
 $number_of_pages = ceil($number_of_results / $results_per_page);

 $_SESSION['PAGE_NUMBER'] = $number_of_pages;
 // Determine which page number visitor is currently on;
 if(!isset($_GET['page'])){ 
     $page = 1;
 }else if($_GET['page'] <= 0){
     if($categoryy == 'Entertainment'){

        echo "<script>location.href='/entertainment/entertainmentPost.php?page=1'</script>";
        //header('Location: ../entertainment/entertainmentPost.php?page=1');
        exit();
     }
     if($categoryy == 'Leadership'){
        echo "<script>location.href='/leadership/leadershipPost.php?page=1'</script>";
        //header('Location: ../leadership/leadershipPost.php?page=1');
        exit();
    }
    if($categoryy == 'Art and Graphics'){
        echo "<script>location.href='/art/artPost.php?page=1'</script>";
        //header('Location: ../art/artPost.php?page=1');
        exit();
    }
    if($categoryy == 'Fashion and Style'){
        echo "<script>location.href='/fashion/fashionPost.php?page=1'</script>";
        //header('Location: ../fashion/fashionPost.php?page=1');
        exit();
    }
     
 }else if($_GET['page'] > $number_of_pages){
     //header("Location: ../view/groupPost.php?page=$number_of_pages");

     if($categoryy == 'Entertainment'){
        echo "<script>location.href='/entertainment/entertainmentPost.php?page=$number_of_pages'</script>";
        //header("Location: ../entertainment/entertainmentPost.php?page=$number_of_pages");
        exit();
     }
     if($categoryy == 'Leadership'){
        echo "<script>location.href='/leadership/leadershipPost.php?page=$number_of_pages'</script>";
        //header("Location: ../leadership/leadershipPost.php?page=$number_of_pages");
        exit();
    }
    if($categoryy == 'Art and Graphics'){
        echo "<script>location.href='/art/artPost.php?page=$number_of_pages'</script>";
        header("Location: ../art/artPost.php?page=$number_of_pages");
        exit();
    }
    if($categoryy == 'Fashion and Style'){
        echo "<script>location.href='/fashion/fashionPost.php?page=$number_of_pages'</script>";
        //header("Location: ../fashion/fashionPost.php?page=$number_of_pages");
        exit();
    } 
     
 }else{ 
     $page = $_GET['page'];
 }
//determine the sql LIMIT starting number for the results on the display page
$this_page_first_result =($page - 1) * $results_per_page;

//retrieve the folowing result from database and display them on page

$sql ="SELECT * FROM postworks WHERE category =:category LIMIT $this_page_first_result , $results_per_page ";
$stmt=$pdo->prepare($sql);
$stmt->execute(['category'=>$category]);
$resultRow = $stmt->fetchAll();

return $resultRow;

}
