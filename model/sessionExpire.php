<?php

if(isset($_SESSION)){
  $time_now = date('U');
  if($_SESSION['EXP_TIME'] < $time_now){
    session_unset();
    //session_destroy();

    echo "<script>location.href='/../index1.php'</script>";
    //header("Location: $basePath/index1.php");
    exit();
  }
} 