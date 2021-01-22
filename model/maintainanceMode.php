<?php

//site maintainanace mode file
require_once('connection.php');
require_once('getSettings.php');

if($resultSettings->site_maintainace_mode == 1){
  echo "<script>location.href='/view/maintainanceMode.html'</script>";
  //header('Location: ../view/maintainanceMode.html');
  exit();
}
