<?php 
            echo "<div class='m-5'><h4 class='w3-text-white'>";
              if(!isset($_GET["page"])){
                  $notset = 1;
              }else if($_GET["page"] != 1){
                  echo "<li class='page-item' style='display:inline-block'>";
                  echo '<a href="groupPost.php?page='. ($_GET["page"] - 1) .'"> << </a> ';
                  echo '</li>';
              }else{
                  $notset = 0;
              }
  
              // display the links for each page
              ?>
              <ul class='paginatation' >
              <?php
              for ($page = 1; $page <= $number_of_pages; $page++){
                 // echo '<a href="testPaginationPost.php?page='. $pages .'">'.$pages.'</a> ';
                  echo "<li class='page-item' style='display:inline-block'>";
                  echo "<a class='page-link' href='groupPost.php?page= $page'>$page </a> ";
                  echo '</li>';
                  
              }
              
              ?>
              </ul>
              <?php
                            
              if(!isset($_GET["page"])){
                  $_GET["page"] = 0;
                  //echo 'pagination';
                  echo "<li class='page-item' style='display:inline-block'>";
                  echo '<a class="active" href="groupPost.php?page='. ($_GET["page"] + 2) .'"> >> </a> ';
                   echo '</li>';
                  //echo 'pagination';
              }else if($_GET["page"] != $number_of_pages){
                  echo '<a href="groupPost.php?page='. ($_GET["page"] + 1) .'"> >> </a> ';
              }else{
                  $notset = 0;
              }

              echo "</h4></div>";

              ?>
