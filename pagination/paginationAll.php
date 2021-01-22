<?php

require_once  __DIR__ . '/../model/connection.php';

// global $results_per_page ;
// global $number_of_results;
// global $number_of_pages;
// global $this_page_first_result;


function pagination($databaseNamee){

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

$results_per_page = 20;

// find out the number of result stored in database

$sql = "SELECT COUNT(*) FROM postworks";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchColumn();

$number_of_results = $result;


//Determine number of total page available
 $number_of_pages = ceil($number_of_results / $results_per_page);

 $_SESSION['PAGE_NUMBER'] = $number_of_pages;
// Determine which page number visitor is currently on;
if(!isset($_GET['page'])){
    $page = 1;
}else if($_GET['page'] <= 0){
    echo "<script>location.href='/../view/groupPost.php?page=1'</script>";
    //header('Location: ../view/groupPost.php?page=1');
    exit();
}else if($_GET['page'] > $number_of_pages){
    echo "<script>location.href='/../view/groupPost.php?page=1'</script>";
    //header("Location: ../view/groupPost.php?page=$number_of_pages");
    exit();
}else{
    $page = $_GET['page'];
}

//determine the sql LIMIT starting number for the results on the display page
$this_page_first_result =($page - 1) * $results_per_page;

//retrieve the folowing result from database and display them on page

$sql ="SELECT * FROM postworks WHERE category != 'Sales Adverts' AND category != 'Job Adverts' LIMIT $this_page_first_result , $results_per_page ";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$resultRow = $stmt->fetchAll();

return $resultRow;

}
  

function DisplayPagination(){
  for ($page = 1; $page <= $number_of_pages; $page++){
    echo '<a href="testPaginationPost.php?page='.$page .'">'.$page.'</a> ';   
}

if(!isset($_GET["page"])){
    $_GET["page"] = 0;
    echo '<a href="testPaginationPost.php?page='. ($_GET["page"] + 2) .'"> >> </a> ';
}else if($_GET["page"] != $number_of_pages){
    echo '<a href="testPaginationPost.php?page='. ($_GET["page"] + 1) .'"> >> </a> ';
}else{
    $notset = 0;
}

}