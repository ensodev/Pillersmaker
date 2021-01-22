 <!-- testimony -->
 <?php
 require_once __DIR__ . '/../model/dailyPageView.php';
 require_once __DIR__ . '/../model/connection.php';
 
 
 $sql = "SELECT * FROM testimony WHERE approved = 1 ORDER BY user_id LIMIT 4";
 $stmt=$pdo->prepare($sql);
 $stmt->execute();
 $resultTestimony = $stmt->fetchAll();
 if($resultTestimony){
    
      $testimony1 = $resultTestimony[0] ?? '';
      $testimony2 = $resultTestimony[1] ?? '';
      $testimony3 = $resultTestimony[2] ?? '';
      $testimony4 = $resultTestimony[3] ?? '';
        
     // var_dump($resultTestimony);

     $sql = "SELECT * FROM profile WHERE id = $testimony1->user_id OR id=$testimony2->user_id OR id= $testimony3->user_id OR id= $testimony4->user_id ORDER BY id";

    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $resultPics = $stmt->fetchAll();

    $resultPics1 = $resultPics[0] ?? '';
    $resultPics2 = $resultPics[1] ?? '';
    $resultPics3 = $resultPics[2] ?? '';
    $resultPics4 = $resultPics[3] ?? '';

    
      
 ?>


 




 <div class="text-center  mb-4">
        <h3 class="w3-text-white">TESTIMONY</h3>
        <h5 class="w3-text-green">
            <span class="dot">o
            </span>

            <span class="dot">O
            </span>

            <span class="dot">O
            </span>

            <span class="dot">o
            </span>
        </h5>
    </div>
    <p></p>

    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <div class="card mb-5">
                    <div class="card-header w3-green">
                      
                    </div>

                    <div class="card-body text-center">
                    <a href='/model/searchProfileProcess.php?id=<?php echo $testimony1->user_id; ?>'>
                        <h6><?php echo $test1 = $testimony1->user_name ?? 'Pillersmaker' ;?></h6>
                        
                    </a>
                    <a href="/view/picturepage.php?pic=
                        <?php echo trim($resultPics1->profile_pic) ; ?>&id=
                           <?php echo trim($resultPics1->id) ;?>">
                        <img src="../upload/<?php echo   $resultPics1->profile_pic ;?>" style="width:90px; height:100px" alt="">
                        <p></p>
                    </a>
                        
                       I rock so many social network, pillersmaker hit its purpose than most have seen .
                        <a href="/view/testimonyMore.php?id=<?php echo $test2 = $testimony1->user_id ?? 'pillers' ; ?>" id="read"> Read</a>
                    </div>

                    <div class="card-footer w3-green w3-text-amber text-center">
                        <h4>OOOOO</h4>
                    </div>
                </div>


            </div>
            <br>
           

            
            <br>
            <div class="col-md-3 ">
                <div class="card mb-5">
                    <div class="card-header w3-green w3-text-brown text-right">
                       
                    </div>

                    
                    <div class="card-body text-center">
                    <a href='/model/searchProfileProcess.php?id=<?php echo $testimony2->user_id; ?>'>
                        <h6><?php echo $test3 = $testimony2->user_name ??  'Pillersmaker' ;?></h6>
                    </a>
                    <a href="/view/picturepage.php?pic=
                        <?php echo trim($resultPics2->profile_pic) ; ?>&id=
                           <?php echo trim($resultPics2->id) ;?>">
                        <img src="../upload/<?php echo   $resultPics2->profile_pic ;?>"  style="width:90px; height:100px" alt="">
                    </a>
                        <p></p>

                        
                        Spending sometimes here following instruction my dreams comes to reality.
                        <a href="/view/testimonyMore.php?id=<?php echo $test4 =$testimony2->user_id ?? 'pillers'; ?>" id="read"> Read</a>
                    </div>

                   <div class="card-footer w3-green w3-text-amber text-center">
                        <h4>OOOOO</h4>
                    </div>

                </div>

            </div>



<div class="col-md-3">
                <div class="card mb-5">
                    <div class="card-header w3-green">
                       
                    </div>

                    <div class="card-body text-center">
                    <a href='/model/searchProfileProcess.php?id=<?php echo $testimony3->user_id; ?>'>
                        <h6><?php echo $test5 =$testimony3->user_name ?? 'Pillersmaker' ;?></h6>
                    </a>
                    <a href="/view/picturepage.php?pic=
                        <?php echo trim($resultPics3->profile_pic) ; ?>&id=
                           <?php echo trim($resultPics3->id) ;?>">
                        <img src="../upload/<?php echo                  $resultPics3->profile_pic ;?>"  style="width:90px; height:100px" alt="">
                    </a>
                        <p></p>
                       
                        Pillersmaker is a life changing invention i and my friends have added to knowledge.
                        <a href="/view/testimonyMore.php?id=<?php echo $test6 = $testimony3->user_id ?? 'pillers' ; ?>" id="read"> Read</a>
                    </div>

                   <div class="card-footer w3-green w3-text-amber text-center">
                        <h4>OOOOO</h4>
                    </div>
                </div>


            </div>
            <br>
            
            <br>
            <div class="col-md-3 ">
                <div class="card mb-5">
                    <div class="card-header w3-green w3-text-brown text-center">
                         
                    </div>

                    
                    <div class="card-body text-center">
                    <a href='/model/searchProfileProcess.php?id=<?php echo $testimony4->user_id; ?>'>
                        <h6><?php echo $test7 = $testimony4->user_name ?? 'Pillersmaker' ;?></h6>
                    </a>
                    <a href="/view/picturepage.php?pic=
                        <?php echo trim($resultPics4->profile_pic) ; ?>&id=
                           <?php echo trim($resultPics4->id) ;?>">
                        <img src="../upload/<?php echo   $resultPics4->profile_pic ;?>"  style="width:90px; height:100px" alt="">
                    </a>
                        <p></p>

                        
                        I never thought anything like this can be real until i joined pillersmaker.
                        <a href="/view/testimonyMore.php?id=<?php echo $test8 =$testimony4->user_id ?? 'pillers'; ?>" id="read"> Read</a>
                    </div>

                    <div class="card-footer w3-green w3-text-amber text-center">
                        <h4>OOOOO</h4>
                    </div>
 
                </div>

            </div>



        </div>
    </div>

    <p></p>
   <?php
 }
 ?>