<?php
// connect to the data base
require_once  __DIR__ .'/../model/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <style>
         body,html{
            margin: auto 0;
            text-align:center;           
        } 

        img{
            width:250px;
            height:180px;
        }
    </style>
</head>
<body>

<?php

// connect to the data base



// Define how many result you want per page

$results_per_page = 10;

// find out the number of result stored in database

$sql = "SELECT COUNT(*) FROM postworks";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchColumn();

$number_of_results = $result;


//Determine number of total page available
 $number_of_pages = ceil($number_of_results / $results_per_page);


// Determine which page number visitor is currently on;
if(!isset($_GET['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}


//determine the sql LIMIT starting number for the results on the display page
$this_page_first_result =($page - 1) * $results_per_page;


//retrieve the folowing result from database and display them on page



$sql ="SELECT * FROM postworks LIMIT $this_page_first_result , $results_per_page";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$resultRow = $stmt->fetchAll();


$rows = $resultRow;

echo '<h1> Product Lists </h1>';

foreach ($rows as $row) {
  echo '<div class="container text-center">';
    echo '<div class="row">';

    echo '<div class="col-md-6">';
    echo $row->id .' '.$row->topic.'<br>';
    
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>


   

<?php
echo "<div class='m-5 bg-info'>";
if(!isset($_GET["page"])){
    $notset = 1;
}else if($_GET["page"] != 1){
    echo '<a href="pagination.php?page='. ($_GET["page"] - 1) .'">Previous</a> ';
}else{
    $notset = 0;
}


// display the links for each page
for ($page = 1; $page <= $number_of_pages; $page++){
    echo '<a href="pagination.php?page='. $page .'">'.$page.'</a> ';
    
    
}



if(!isset($_GET["page"])){
    $_GET["page"] = 0;
    echo '<a href="pagination.php?page='. ($_GET["page"] + 2) .'">Next</a> ';
}else if($_GET["page"] != $number_of_pages){
    echo '<a href="pagination.php?page='. ($_GET["page"] + 1) .'">Next</a> ';
}else{
    $notset = 0;
}

echo "</div>";
?>

</body>
</html>