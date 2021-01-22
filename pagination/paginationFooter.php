<?php 
            echo "<div class='m-5'><h4 class='w3-text-white'>";
              if(!isset($_GET["page"])){
                  $notset = 1;
              }else if($_GET["page"] != 1){
                  echo '<a href="testPaginationPost.php?page='. ($_GET["page"] - 1) .'"> << </a> ';
              }else{
                  $notset = 0;
              }
  
              // display the links for each page
              for ($page = 1; $page <= $number_of_pages; $page++){
                 // echo '<a href="testPaginationPost.php?page='. $pages .'">'.$pages.'</a> ';
                  
                  echo "<a href='testPaginationPost.php?page= $page'>$page </a> ";
                  
                  
              }

              if(!isset($_GET["page"])){
                  $_GET["page"] = 0;
                  echo '<a href="testPaginationPost.php?page='. ($_GET["page"] + 2) .'"> >> </a> ';
              }else if($_GET["page"] != $number_of_pages){
                  echo '<a href="testPaginationPost.php?page='. ($_GET["page"] + 1) .'"> >> </a> ';
              }else{
                  $notset = 0;
              }

              echo "</h4></div>";

              ?>
