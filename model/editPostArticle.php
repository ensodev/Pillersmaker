<?php require_once __DIR__ . '/../model/connection.php';?>
<?php
//echo $_SESSION['USER_ID'];
 
if(!isset($_GET)){
  require_once __DIR__ . '/../view/header3.php';
  ?> 
  <div class="container mt-4 text-center">
    <div class='alert alert-warning'>You are not authorized to view this page...!
      <a href="/view/profile.php">Back to profile</a>
    </div>
  </div>
<?php
exit();
}

// $oldPostFile = $_GET['postfile'];

if(!isset($_GET['postId']) || !isset($_GET['user_id']) || !isset($_GET['topic']) || !isset($_GET['article']) || !isset($_GET['category']) || !isset($_GET['postfile'])){
  require_once __DIR__ . '/../view/header3.php';
  ?>
  <div class="container mt-4 text-center">
    <div class='alert alert-warning'>You are not authorized to view this page...!!
      <a href="/view/profile.php">Back to profile</a>
    </div>
  </div>
<?php
exit();
}

$id = $_GET['postId'];
$user_id = $_GET['user_id'];
$topic = $_GET['topic'];
$article = $_GET['article'];
$category = $_GET['category'];
$oldPostFile = $_GET['postfile'];



