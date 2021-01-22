<?php if(!isset($_SESSION))
{
session_start();
}
?>

<?php


require_once  __DIR__ . '/../controller/checkSessionContol.php'; 

checkNotSession();

if($_GET['id'] =="" || !isset($_GET['id'])){
  // redirection here
  echo 'out';
  exit();
}

//get the it
$id = $_GET['id'];


?>
<?php

if(isset($_GET['error'])){
  if($_GET['error'] != 1){
    // Hack dectection triger
    // Ban user
    // redirect to no page 404
    echo "error..";
    
  }
  echo "<script>location.href='/view/email.php?id=$id&error=1'</script>";
  //header('location: /view/email.php?id='.$id.'&error=1');
  exit();
}

echo "<script>location.href='/view/email.php?id=$id'</script>";
//header('location: /view/email.php?id='.$id);

