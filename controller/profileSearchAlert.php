<?php

function SearchError($msg, $msgColor){

  echo "<div class='m-5'>";
  echo "<div class='alert alert-{$msgColor} text-center'>".$msg. "<a href='../view/profileSearch.php' class='w3-text-green'>Back</a>"."</div>";
  echo "</div>";

  require_once __DIR__ . "/../view/footer.php ";

};